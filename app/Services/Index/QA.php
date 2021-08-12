<?php
namespace App\Services\Index;

use App\Contracts\Index\QuestionsAnswerInterface;
use App\Models\QuestionAnswer;

class QA implements QuestionsAnswerInterface {

    public function getQA()
    {
        $qaItems = QuestionAnswer::all();
        return $qaItems->collect();
    }
}
