<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Http\Controllers\Admin\Screens\Cafe\CategoryScreen;
use App\Http\Controllers\Admin\Screens\Cafe\RecordScreen;
use App\Http\Controllers\Admin\Screens\Cafe\CafeTypeScreen;
use App\Models\CafeCategory;
use App\Models\CafeType;

class EditController extends BaseController
{
    public function editRecord(int $id)
    {
        $record = $this->service->getRecordForEdit($id);

        //массивы для полей с всплывающим списоком
        $cafe_types = $this->service->getCafeTypes()->toArray();
        $categories = $this->service->getCategories()->toArray();

        RecordScreen::edit($record, $categories, $cafe_types);
    }

    public function editCategory(int $id)
    {
        $category = CafeCategory::findOrFail($id);

        $cafe_types = $this->service->getCafeTypes()->toArray();

        CategoryScreen::edit($category, $cafe_types);
    }

    public function editCafe(int $id)
    {
        $cafe = CafeType::findOrFail($id);
        CafeTypeScreen::edit($cafe);
    }
}
