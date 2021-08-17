<?php

namespace App\Http\Controllers\Modules\About;

class ShowController extends BaseController
{
    public function __invoke(string $slug)
    {
        $about = $this->service->getAboutBySlug($slug);

        $page = new \stdClass();
        $page->title = $about->title;
        $page->slug = $about->slug;

        return view('adfm.public.abouts.show', compact(['about', 'page']));
    }
}
