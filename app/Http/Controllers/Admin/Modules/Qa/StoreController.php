<?php

namespace App\Http\Controllers\Admin\Modules\Qa;

use App\Models\QuestionAnswer;
use Illuminate\Http\Request;

class StoreController extends BaseController {
    public function __invoke(Request $request)
    {
        $data = $request->question_answer;

        $aboutCard = QuestionAnswer::firstOrCreate($data);

        if($aboutCard->exists) {
            return redirect()->route('admin.qa.index');
        }

        return back();
    }
}
