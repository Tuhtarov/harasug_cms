<?php

namespace App\Http\Controllers\Admin\Modules\About;

use App\Http\Controllers\Admin\Screens\About\AboutScreen;

class CreateController extends BaseController
{
    public function __invoke()
    {
        AboutScreen::create();
    }
}
