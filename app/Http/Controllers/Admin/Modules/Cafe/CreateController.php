<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Http\Controllers\Admin\Screens\Cafe\CategoryScreen;
use App\Http\Controllers\Admin\Screens\Cafe\RecordScreen;

class CreateController extends BaseController {
    public function createRecord()
    {
        //массивы для полей с всплывающим списком
        $cafe_types = $this->service->getCafeTypes()->toArray();
        $categories = $this->service->getCategories()->toArray();
        RecordScreen::create($categories, $cafe_types);
    }

    public function createCategory()
    {
        $cafe_types = $this->service->getCafeTypes()->toArray();
        CategoryScreen::create($cafe_types);
    }
}
