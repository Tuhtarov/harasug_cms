<?php

namespace App\Http\Controllers\Admin\Modules\Qa;
use App\Http\Controllers\Admin\Screens\Qa\QaScreen;
use App\Models\QuestionAnswer;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $about = QuestionAnswer::withTrashed()->paginate(15);
        QaScreen::index($about);
    }
}
