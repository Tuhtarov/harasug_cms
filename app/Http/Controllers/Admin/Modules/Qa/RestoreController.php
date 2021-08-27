<?php

namespace App\Http\Controllers\Admin\Modules\Qa;

use App\Models\QuestionAnswer;

class RestoreController extends BaseController {
    public function __invoke(int $id)
    {
        QuestionAnswer::withTrashed()->findOrFail($id)->restore();
        return back();
    }
}
