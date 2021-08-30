<?php

namespace App\Http\Controllers\Admin\Modules\Comment;

use App\Packages\ConfirmCancel\Controller\ControllerConfirmCancel;
use App\Packages\ConfirmCancel\Service\IConfirmCancel;

class ConfirmController extends BaseController
{
    use ControllerConfirmCancel;

    protected function getServiceInstance(): IConfirmCancel
    {
        return $this->service;
    }
}
