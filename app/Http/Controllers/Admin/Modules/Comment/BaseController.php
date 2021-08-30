<?php

namespace App\Http\Controllers\Admin\Modules\Comment;

use App\Contracts\Comment\IComment;
use App\Http\Controllers\Controller;
use App\Services\Comment\CommentService;

class BaseController extends Controller {

    protected IComment $service;

    /**
     * BaseController constructor.
     * @param CommentService $service
     */
    public function __construct(IComment $service)
    {
        $this->service = $service;
    }
}
