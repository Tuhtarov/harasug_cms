<?php

namespace App\Http\Controllers\Admin\Modules\Qa;

use App\Http\Controllers\Admin\Screens\Qa\QaScreen;
use App\Models\QuestionAnswer;

class EditController extends BaseController {
    public function __invoke(int $id)
    {
        $qa = QuestionAnswer::findOrFail($id);
        QaScreen::edit($qa);
    }
}
