<?php

namespace App\Http\Controllers\Modules\Cafe;

use App\Models\Adfm\Page;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $page = Page::where('slug', 'cafe')->firstOrFail();

        $cafe = $this->service->getRecordsForPublicCafe();

        return view('adfm::public.page', compact(['page', 'cafe']));
    }
}
