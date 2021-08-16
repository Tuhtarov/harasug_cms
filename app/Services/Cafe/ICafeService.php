<?php

namespace App\Services\Cafe;

use App\Contracts\Cafe\ICafe;
use App\Models\CafeCategory;
use App\Models\CafeRecord;
use App\Models\CafeType;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\True_;
use stdClass;
use function React\Promise\all;

/**
 * Class Cafe реализующий интерфейс CafeInterface.
 * Класс предназначен для удобной обработки данных сущности Кафе.
 * @package App\Services\Cafe
 */
class ICafeService implements ICafe
{
    private \Illuminate\Support\Collection $categories;
    private \Illuminate\Support\Collection $records;
    private \Illuminate\Support\Collection $cafeTypes;

    /**
     * Возвращает все категории с их продуктами, которые принадлежат идентификатору кухни.
     * @param int $id
     * @return array|array[]
     */
    private function getCategoriesByTypeId(int $id): array
    {
        $categoryWithProducts = [];
        $categories = $this->categories->where('cafe_type_id', '=', $id);

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
     */
    private function initCollections() {
        $this->records = CafeRecord::all()->collect();

        //берутся все виды кухни, у которых есть категории
        $this->cafeTypes = CafeType::with(['cafe_category', 'image'])->get()->filter(function ($cafeType){
            return $cafeType->cafe_category->count() > 0;
        });

        //берём категории у которых есть продукты
        $this->categories = CafeCategory::with(['cafe_record', 'image'])->get()->filter(function ($category){
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
}
