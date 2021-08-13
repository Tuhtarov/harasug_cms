<?php
namespace App\Services\Index;

use App\Contracts\Index\QaInterface;
use App\Models\QuestionAnswer;

class QaService implements QaInterface {

    public function getQA()
    {
        $qaItems = QuestionAnswer::all();
        return $qaItems->collect();
    }
}
