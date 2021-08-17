<?php
namespace App\Services\Index;

use App\Contracts\Index\IQuestionAnswer;
use App\Models\QuestionAnswer;

class QaService implements IQuestionAnswer {
    public function getQA(int $qtyRecords = null, string $sortMode = 'desc')
    {
        if($sortMode == 'desc' || $sortMode == 'asc') {
            $qaItems = QuestionAnswer::orderBy('created_at', $sortMode)->get();
        } else {
            $qaItems = QuestionAnswer::all();
        }

        if($qaItems->count() > 0) {
            if($qtyRecords == null) {
                $qaItems = $qaItems->collect();
            } else {
                $qaItems = $qaItems->take($qtyRecords)->collect();
            }
            return $qaItems;
        } else {
            return null;
        }
    }
}
