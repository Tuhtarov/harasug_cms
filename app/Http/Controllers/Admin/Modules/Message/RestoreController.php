<?php

namespace App\Http\Controllers\Admin\Modules\Message;

use App\Models\Message;

class RestoreController extends BaseController
{
    public function __invoke(int $id)
    {
        $message = Message::withTrashed()->where('id', $id);
        $message->restore();
        return back();
    }
}
