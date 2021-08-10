<?php

namespace App\Services\Cafe;

use App\Contracts\Cafe\CafeInterface;
use App\Models\CafeCategory;
use App\Models\CafeRecord;
use App\Models\CafeType;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\True_;
use stdClass;
use function React\Promise\all;

class Cafe implements CafeInterface
{
    private \Illuminate\Support\Collection $categories;
    private \Illuminate\Support\Collection $records;

    private function getRecordsByTypeId(int $id): array
    {
        $result = [];
        $categories = $this->categories->where('cafe_type_id', '=', $id);

        foreach ($categories as $category) {
            $result += [
              $category->name => [
                  'image' => $category->image,
                  'records' => $this->records->filter(function ($record) use ($category) {
                      return $record->cafe_category_id == $category->id;
                  })
              ]
            ];
        }
        return $result;
    }

    function getRecords() : object
    {
        $this->categories = CafeCategory::all()->collect();
        $this->records = CafeRecord::all()->collect();

        //берутся все виды кухни
        $cafeTypes = CafeType::all();

        //создаём класс для удобного хранения и обработки во view полученных записей
        $cafeData = new stdClass();
        $cafeData->cafeType = collect();

        //наполянем класс данными для удобного отображения в представлении
        foreach ($cafeTypes as $type) {
            $cafeData->cafeType->put($type->name, collect([
                'image' => $type->image,
                'message' => $type->message,
                'categories' => $this->getRecordsBytypeId($type->id)
            ]));
        }

        return $cafeData->cafeType;
    }
}
