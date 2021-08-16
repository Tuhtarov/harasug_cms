<?php

namespace App\Http\Controllers\Modules\Chill;

use App\Models\Adfm\Page;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $cards = $this->service->getCards();

        $page = Page::where('slug', 'chill')->firstOrFail();

        return view('adfm.public.chills.list', [
            'page' => $page,
            'cards' => $cards
        ]);
    }
}
