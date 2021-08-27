<?php

namespace App\Http\Controllers\Admin\Modules\Qa;

use App\Models\QuestionAnswer;
use Illuminate\Http\Request;

class UpdateController extends BaseController {
    public function __invoke(int $id, Request $request)
    {
        $qa = QuestionAnswer::withTrashed()->findOrFail($id);
        $qa->update($request->question_answer);
        return redirect()->route('admin.qa.index');
    }
}
