<?php

namespace App\Http\Controllers\Modules;

use App\Contracts\Feedback\CommentsInterface;
use App\Http\Controllers\Controller;
use App\Models\Adfm\Page;
use App\Services\Feedback\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Collection\Collection;

class CommentController extends Controller
{
    private Page $page;
    private CommentsInterface $commentsService;

    public function __construct(CommentsInterface $commentsService)
    {
        $this->page = Page::where('slug', '=', 'comments')->firstOrFail();
        $this->commentsService = $commentsService;
    }

    /**
     * Для обработки гостевой страницы с отзывами
     */
    public function index()
    {
        $comments = $this->commentsService->getComments();
        return view('adfm::public.page', [
            'page' => $this->page,
            'comments' => $comments ?? null
        ]);
    }

    /**
     * Сохраняет новый отзыв в базу.
     */
    public function create(Request $request) {
        if($this->commentsService->saveComments($request->comment)) return back('201');
        return back('409');
    }
}
