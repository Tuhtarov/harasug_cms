<?php

namespace App\Http\Controllers\Admin\Modules\Chill;

use App\Contracts\Chill\IChill;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected IChill $service;

    /**
     * BaseController constructor.
     * @param IChill $service
     */
    public function __construct(IChill $service)
    {
        $this->service = $service;
    }

}
