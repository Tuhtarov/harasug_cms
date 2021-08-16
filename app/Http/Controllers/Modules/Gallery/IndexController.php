<?php

namespace App\Http\Controllers\Modules\Gallery;

use App\Models\Adfm\Page;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $cards = $this->service->getGalleries();

        $page = Page::where('slug', 'gallery')->firstOrFail();

        return view('adfm.public.galleries.list', [
            'page' => $page,
            'cards' => $cards
        ]);
    }
}
