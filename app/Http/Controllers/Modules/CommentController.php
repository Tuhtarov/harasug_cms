<?php

namespace App\Http\Controllers\Modules;

use App\Contracts\Feedback\CommentInterface;
use App\Http\Controllers\Controller;
use App\Models\Adfm\Page;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private Page $page;
    private CommentInterface $commentsService;

    public function __construct(CommentInterface $commentsService)
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
     * Создаёт новый отзыв.
     */
    public function create(Request $request)
    {
        $isCreated = $this->commentsService->createComment($request->comment);

        if ($isCreated) {
            return back(201);
        }

        return back();
    }
}
