<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Http\Controllers\Admin\Screens\Cafe\IndexScreen;
use App\Models\CafeType;

class IndexController extends BaseController
{
    public function __invoke(string $cafeType)
    {
        $type = CafeType::where('slug',  $cafeType)->firstOrFail();

        $paginatedCollection = $this->service->getRecordsByTypeId($type->id, false, 3);

        IndexScreen::index($type->name, $paginatedCollection);
    }
}
