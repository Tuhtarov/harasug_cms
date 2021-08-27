<?php

namespace App\Http\Controllers\Admin\Modules\Gallery;

use App\Http\Controllers\Admin\Screens\Gallery\GalleryScreen;

class CreateController extends BaseController
{
    public function __invoke()
    {
        GalleryScreen::create();
    }
}
