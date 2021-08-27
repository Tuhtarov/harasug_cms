<?php

namespace App\Http\Controllers\Admin\Modules\Message;

use App\Contracts\Message\IMessage;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected IMessage $service;

    /**
     * BaseController constructor.
     * @param IMessage $service
     */
    public function __construct(IMessage $service)
    {
        $this->service = $service;
    }
}
