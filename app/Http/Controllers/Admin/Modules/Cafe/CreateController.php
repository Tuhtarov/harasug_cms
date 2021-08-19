<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Http\Controllers\Admin\Screens\Cafe\CreateScreen;

class CreateController extends BaseController {
    public function __invoke()
    {
        $cafe_types = $this->service->getCafeTypes()->toArray();
        $categories = $this->service->getCategories()->toArray();

        CreateScreen::index($categories, $cafe_types);
    }
}
