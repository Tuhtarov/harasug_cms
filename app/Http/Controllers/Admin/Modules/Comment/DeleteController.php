<?php

namespace App\Http\Controllers\Admin\Modules\Comment;

use App\Models\Comment;

class DeleteController extends BaseController {
    public function __invoke(int $id)
    {
        $comment = Comment::withTrashed()->where('id', $id);
        $comment->delete();
        return back();
    }
}
