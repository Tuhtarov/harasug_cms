<?php

namespace App\Http\Controllers\Admin\Modules\Comment;

use App\Models\Comment;

class RestoreController extends BaseController {
    public function __invoke(int $id)
    {
        Comment::withTrashed()->where('id', $id)->restore();
        return back();
    }
}
