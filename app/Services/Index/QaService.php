<?php
namespace App\Services\Index;

use App\Contracts\Index\IQuestionAnswer;
use App\Models\QuestionAnswer;

class QaService implements IQuestionAnswer {

    public function getQA()
    {
        $qaItems = QuestionAnswer::all();
        return $qaItems->collect();
    }
}
