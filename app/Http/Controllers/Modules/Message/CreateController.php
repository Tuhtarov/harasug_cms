<?php

namespace App\Http\Controllers\Modules\Message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(Request $request)
    {
        $result = $this->service->createMessage($request->message);
        if ($result) {
            return back(201);
        }
        return back();
    }
}
