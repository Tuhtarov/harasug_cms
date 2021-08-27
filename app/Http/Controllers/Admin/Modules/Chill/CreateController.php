<?php

namespace App\Http\Controllers\Admin\Modules\Chill;

use App\Http\Controllers\Admin\Screens\Chill\ChillScreen;

class CreateController extends BaseController
{
    public function __invoke()
    {
        ChillScreen::create();
    }
}
