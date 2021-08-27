<?php

namespace App\Http\Controllers\Admin\Modules\Comment;

use App\Http\Controllers\Admin\Screens\Comment\CommentScreen;

class IndexController extends BaseController {
    public function withoutTrashed()
    {
        $comments = $this->service->getComments('admin', 15);
        CommentScreen::index($comments);
    }

    public function onlyTrashed() {
        $comments = $this->service->getComments('admin', 15, true);
        CommentScreen::index($comments, true);
    }
}
