<?php

namespace App\Http\Controllers\Admin\Modules\Qa;

use App\Http\Controllers\Admin\Screens\Qa\QaScreen;

class CreateController extends BaseController
{
    public function __invoke()
    {
        QaScreen::create();
    }
}
