<?php

namespace App\Http\Controllers\Modules\Comment;

use App\Contracts\Comment\IComment;
use App\Http\Controllers\Controller;
use App\Models\Adfm\Page;

class BaseController extends Controller
{
    protected IComment $service;

    /**
     * Внедрение зависимости с сервисом для работы с комментариями.
     * Через наследование класса BaseController можно получить доступ к сервису.
     */
    public function __construct(IComment $service)
    {
        $this->service = $service;
    }

    /**
     * Метод принимает slug страницы и ищет её в базе.
     * Если страница найдена - возвращается экземпляр класса Page.
     * @param string $slug
     * @return Page
     */
    protected function getPage(string $slug) : Page {
        return Page::where('slug', '=', $slug)->firstOrFail();
    }
}
