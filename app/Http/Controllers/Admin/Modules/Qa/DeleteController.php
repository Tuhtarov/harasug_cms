<?php

namespace App\Http\Controllers\Admin\Modules\Qa;

use App\Models\QuestionAnswer;

class DeleteController extends BaseController
{
    public function __invoke(int $id)
    {
        QuestionAnswer::findorFail($id)->delete();
        return redirect()->route('admin.qa.index');
    }
}
