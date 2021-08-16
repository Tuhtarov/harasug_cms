<?php

namespace App\Http\Controllers\Modules\Chill;

use App\Contracts\Chill\IChill;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected IChill $service;

    //внедрение сервиса IChill
    public function __construct(IChill $chill)
    {
        $this->service = $chill;
    }
}
