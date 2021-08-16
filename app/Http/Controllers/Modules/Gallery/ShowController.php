<?php

namespace App\Http\Controllers\Modules\Gallery;

class ShowController extends BaseController
{
    public function __invoke($slug)
    {
        $gallery = $this->service->getGallery($slug);

        //TODO временная замена Page model
        $page = new \stdClass();
        $page->slug = $gallery->slug;
        $page->title = $gallery->title;

        return view('adfm.public.galleries.page', [
            'page' => $page,
            'gallery' => $gallery
        ]);
    }
}
