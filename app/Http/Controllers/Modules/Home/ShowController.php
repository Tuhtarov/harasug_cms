<?php

namespace App\Http\Controllers\Modules\Home;

class ShowController extends BaseController
{
    public function __invoke(string $slug)
    {
        $home = $this->service->getHomeBySlug($slug);

        $page = new \stdClass();
        $page->slug = $home->slug;
        $page->meta = null;
        $page->title = $home->title_full ?? 'О юрте';

        return view('adfm.public.homes.show', compact(['home', 'page']));
    }
}
