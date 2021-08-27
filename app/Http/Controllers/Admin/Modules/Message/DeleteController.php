<?php

namespace App\Http\Controllers\Admin\Modules\Message;

use App\Models\Message;

class DeleteController extends BaseController
{
    public function __invoke(int $id)
    {
        $message = Message::withTrashed()->where('id', $id);
        $message->delete();
        return back();
    }
}
