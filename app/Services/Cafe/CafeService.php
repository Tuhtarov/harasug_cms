<?php

namespace App\Services\Cafe;

use App\Contracts\Cafe\ICafe;
use App\Models\CafeCategory;
use App\Models\CafeRecord;
use App\Models\CafeType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * Class Cafe реализующий интерфейс CafeInterface.
 * Класс предназначен для удобной обработки данных сущности Кафе.
 * @package App\Services\Cafe
 */
class CafeService implements ICafe
{
    private \Illuminate\Support\Collection $categories;
    private \Illuminate\Support\Collection $records;
    private \Illuminate\Support\Collection $cafeTypes;

    /**
     * Возвращает все категории с их продуктами, которые принадлежат идентификатору кухни.
     * @param int $cafeTypeId
     * @return array|array[]
     */
    private function getCategoriesByTypeId(int $cafeTypeId): array
    {
        $categoryWithProducts = [];
        $categories = $this->categories->where('cafe_type_id', '=', $cafeTypeId);

        foreach ($categories as $category) {
            $categoryWithProducts += [
                $category->name => [
                    'image' => $category->image,
                    'records' => $this->records->filter(function ($record) use ($category) {
                        return $record->cafe_category_id == $category->id;
                    })
                ]
            ];
        }

        return $categoryWithProducts;
    }

    /**
     * Функция, инициализирующая свойства класса, при этом фильтруя данные, которые идут в свойства из базы.
     * @param bool $withDeleted - включить в коллекцию records удалённые товары
     */
    private function initCollections(bool $withDeleted = false)
    {
        if ($withDeleted) {
            $this->records = CafeRecord::withTrashed()->get()->collect();
        } else {
            $this->records = CafeRecord::all()->collect();
        }

        //берутся все виды кухни, у которых есть категории
        $this->cafeTypes = CafeType::with(['cafe_category', 'image'])->get()->filter(function ($cafeType) {
            return $cafeType->cafe_category->count() > 0;
        });

        //берём категории у которых есть продукты
        $this->categories = CafeCategory::with(['cafe_record', 'image'])->get()->filter(function ($category) {
            return $category->cafe_record->count() > 0;
        });
    }

    /**
     * Возвращает ассоциативный массив, в котором собраны необходимые для отображения данные.
     * @return object
     */
    function getRecordsForPublicCafe(): object
    {
        //инициализируем свойства класса, которые хранят коллекции необходимых моделей.
        $this->initCollections();

        $cafeData = collect();

        //наполянем коллекцию данными для отправки в клиентский код
        foreach ($this->cafeTypes as $type) {
            $cafeData->put($type->name, collect([
                'image' => $type->image,
                'message' => $type->message,
                'categories' => $this->getCategoriesByTypeId($type->id)
            ]));
        }

        return $cafeData;
    }

    /*=========================================ФУНКЦИОНАЛ АДМИНКИ==========================================*/

    function getRecordsByTypeId(int $cafeTypeId, bool $withTrashed = false, int $perPage = null)
    {
        $result = CafeRecord::withTrashed($withTrashed)
            ->join('cafe_categories', 'cafe_records.cafe_category_id', "cafe_categories.id")
            ->where('cafe_categories.cafe_type_id', $cafeTypeId)
            ->select(['cafe_records.*', 'cafe_categories.name as cafe_category_name']);

        if ($perPage != null) {
            return $result->paginate($perPage);
        }

        return $result->get();
    }

    /**
     * Возвращает все имеющиеся виды кафе
     * @return CafeType[]|Collection|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function getCafeTypes(int $perPage = null)
    {
        if ($perPage != null) {
            return CafeType::withTrashed()->paginate($perPage);
        }

        return CafeType::all();
    }

    // Возвращает все категории (опционально)
    function getCategories(bool $withTrashed = false, int $byCafeId = null)
    {
        $categories = CafeCategory::withTrashed($withTrashed);
//        ->join('cafe_types', 'cafe_categories.cafe_type_id', '=', 'cafe_types.id')
//        ->addSelect([
//            'cafe_categories.*',
//            DB::raw('cafe_types.name as cafe_name')
//        ]);

        if ($byCafeId) {
            $categories->where('cafe_type_id', $byCafeId);
        }

        return $categories->get()->unique('name');
    }

    public function updateCafeRecord(int $recordId, array $recordData)
    {
        $this->storeCafeRecord($recordData, $recordId);
    }

    //сохранение товара (блюда) в базу
    public function storeCafeRecord(array $recordData, int $recordUpdateId = null)
    {
        //если пришедшее значение ключа cafe_category - числовое, но в строке, то кастим его в integer
        if (is_numeric($recordData['cafe_category'])) {
            $recordData['cafe_category'] = (int)$recordData['cafe_category'];
        }

        $recordData['cafe_type_id'] = (int)$recordData['cafe_type_id'];

        try {
            Db::beginTransaction();
            //создаём или находим категорию и записываем её ID в массив
            $recordData['cafe_category_id'] = $this->getCategoryId(
                $recordData['cafe_category'],
                $recordData['cafe_type_id']
            );
            //убираем лишнее
            unset($recordData['cafe_type_id'], $recordData['cafe_category']);

            if($recordUpdateId == null) {
                $result = CafeRecord::create($recordData)->save();
            } else {
                $result = CafeRecord::findOrFail($recordUpdateId)->update($recordData);
            }

            Db::commit();

            return $result;
        } catch (\Exception $e) {
            Db::rollBack();
            return $e->getMessage();
        }
    }

    /**
     * Возвращает ID найденной категории в базе, или же только созданной.
     * @param $categoryData
     * @param int|null $cafeTypeId
     * @return mixed
     */
    private function getCategoryId($categoryData, int $cafeTypeId): int
    {
        //если categoryData - содержит строку, то тогда создаём запись
        if (!is_int($categoryData)) {
            $category = CafeCategory::firstOrCreate([
                'name' => $categoryData,
                'cafe_type_id' => $cafeTypeId
            ]);
        } else {
            //если categoryData - числовое, то находим запись по id
            $category = CafeCategory::find($categoryData);

            //если у найденной категории отличается id кухни, то тогда создаём категорию с такими же данными
            //и переопределяем у неё id кухни
            if ($category->cafe_type_id != $cafeTypeId) {
                $newCategory = $category->toArray();
                $newCategory['cafe_type_id'] = $cafeTypeId;

                unset($newCategory['id']);

                $category = CafeCategory::firstOrCreate($newCategory);
            }
        }

        return $category->id;
    }

    public function storeCafeCategory(array $categoryData)
    {
        $category = CafeCategory::firstOrCreate($categoryData);
        return $category->exists();
    }

    public function getRecordForEdit(int $recordId): Model
    {
        return CafeRecord::withTrashed()
            ->join('cafe_categories', 'cafe_records.cafe_category_id', '=', "cafe_categories.id")
            ->where('cafe_records.id', $recordId)
            ->addSelect([
                'cafe_records.*',
                'cafe_categories.cafe_type_id',
                'cafe_records.cafe_category_id as cafe_category'
            ])->firstOrFail();
    }

    public function getCategoriesForIndex(int $perPage = 20): LengthAwarePaginator
    {
        return CafeCategory::withTrashed()
            ->join('cafe_types', 'cafe_categories.cafe_type_id', '=', 'cafe_types.id')
            ->select([
                'cafe_categories.*',
                'cafe_types.name as cafe_name'
            ])->paginate($perPage);
    }

    public function updateCafeType(int $cafeTypeId, array $cafeTypeData)
    {
        return CafeType::findOrFail($cafeTypeId)->update($cafeTypeData);
    }

    public function updateCafeCategory(int $categoryId, array $cafeCategoryData)
    {
        return CafeCategory::findOrFail($categoryId)->update($cafeCategoryData);
    }
}
