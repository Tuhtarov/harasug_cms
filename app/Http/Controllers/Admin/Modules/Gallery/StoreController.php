<?php

namespace App\Http\Controllers\Admin\Modules\Gallery;

use App\Models\Gallery;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Request $request)
    {
        $data = $request->gallery;
        unset($data['image']);
        $newGallery = Gallery::firstOrCreate($data);


        if ($newGallery->exists) {
            return redirect()->route('admin.gallery.index');
        }

        return back();
    }
}
