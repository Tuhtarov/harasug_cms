<?php

namespace App\Http\Controllers\Admin\Modules\Gallery;

use App\Http\Controllers\Admin\Screens\Gallery\GalleryScreen;
use App\Models\Gallery;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $galleries = Gallery::withTrashed()->paginate(15);
        GalleryScreen::index($galleries);
    }
}
