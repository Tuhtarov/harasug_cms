<?php

namespace App\Http\Controllers\Admin\Modules\Home;

use App\Http\Controllers\Admin\Screens\Home\HomeScreen;
use App\Models\Home;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $homes = Home::withTrashed()->paginate(15);
        HomeScreen::index($homes);
    }
}
