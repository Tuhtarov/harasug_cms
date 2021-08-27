<?php

namespace App\Http\Controllers\Admin\Modules\Home;

use App\Http\Controllers\Admin\Screens\Home\HomeScreen;

class CreateController extends BaseController
{
    public function __invoke()
    {
        HomeScreen::create();
    }
}
