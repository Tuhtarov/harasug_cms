<?php

namespace App\Http\Controllers\Admin\Modules\Gallery;

use App\Http\Controllers\Admin\Screens\Gallery\GalleryScreen;
use App\Models\Gallery;

class EditController extends BaseController
{
    public function __invoke(int $id)
    {
        $gallery = Gallery::findOrFail($id);
        GalleryScreen::edit($gallery);
    }
}
