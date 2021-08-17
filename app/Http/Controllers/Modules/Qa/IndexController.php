<?php

namespace App\Http\Controllers\Modules\Qa;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $qaItems = $this->service->getQA();

        $page = new \stdClass();
        $page->title = 'Нас часто спрашивают';
        $page->slug = $_SERVER['REQUEST_URI'] != '' ? $_SERVER['REQUEST_URI'] : 'qa';
        $page->meta = null;

        return view('adfm.public.qa.index', compact(['qaItems', 'page']));
    }
}
