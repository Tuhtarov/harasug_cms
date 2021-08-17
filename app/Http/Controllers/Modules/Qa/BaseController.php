<?php

namespace App\Http\Controllers\Modules\Qa;

use App\Contracts\Index\IQuestionAnswer;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected IQuestionAnswer $service;

    /**
     * IndexController constructor.
     * @param IQuestionAnswer $service
     */
    public function __construct(IQuestionAnswer $service)
    {
        $this->service = $service;
    }
}
