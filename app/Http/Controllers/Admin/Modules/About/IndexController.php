<?php

namespace App\Http\Controllers\Admin\Modules\About;

use App\Http\Controllers\Admin\Screens\About\AboutScreen;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $about = $this->service->getAboutItems(true);
        AboutScreen::index($about);
    }
}
