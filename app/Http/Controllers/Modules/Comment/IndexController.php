<?php

namespace App\Http\Controllers\Modules\Comment;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $comments = $this->service->getComments();

        $page = $this->getPage('comments');

        return view('adfm::public.page', [
            'page' => $page,
            'comments' => $comments ?? null
        ]);
    }
}
