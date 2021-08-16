<?php

namespace App\Http\Controllers\Modules\Chill;

class ShowController extends BaseController
{
    public function __invoke($slug)
    {
        $chill = $this->service->getCard($slug);

        //TODO временная замена Page model
        $page = new \stdClass();
        $page->slug = $chill->slug;
        $page->title = $chill->title;

        return view('adfm.public.chills.page', [
            'page' => $page,
            'chill' => $chill
        ]);

    }
}
