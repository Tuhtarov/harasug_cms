<?php

namespace App\Http\Controllers\Modules\Reservation;

use App\Models\Adfm\Page;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $page = Page::where('slug', 'reservation')->firstOrFail();

        $cards = $this->homeService->getHomes();

        return view('adfm::public.page', compact(['page', 'cards']));
    }
}
