<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Http\Controllers\Admin\Screens\Cafe\CategoryScreen;
use App\Http\Controllers\Admin\Screens\Cafe\RecordScreen;
use App\Http\Controllers\Admin\Screens\Cafe\CafeTypeScreen;
use App\Models\CafeType;

class IndexController extends BaseController
{
    public function indexRecord(string $cafeType)
    {
        $type = CafeType::where('slug',  $cafeType)->firstOrFail();

        $paginatedCollection = $this->service->getRecordsByTypeId($type->id, true, 20);

        RecordScreen::index($type->name, $paginatedCollection);
    }

    public function indexCafe()
    {
        $paginatedCollection = $this->service->getCafeTypes(4);

        CafeTypeScreen::index($paginatedCollection);
    }

    public function indexCategory()
    {
        $paginatedCollection = $this->service->getCategoriesForIndex(20);

        CategoryScreen::index($paginatedCollection);
    }
}
