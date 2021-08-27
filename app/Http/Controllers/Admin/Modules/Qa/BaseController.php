<?php

namespace App\Http\Controllers\Admin\Modules\Qa;

use App\Contracts\Index\IQuestionAnswer;
use App\Http\Controllers\Controller;

class BaseController extends Controller {
    protected IQuestionAnswer $service;

    /**
     * BaseController constructor.
     * @param IQuestionAnswer $service
     */
    public function __construct(IQuestionAnswer $service)
    {
        $this->service = $service;
    }

}
