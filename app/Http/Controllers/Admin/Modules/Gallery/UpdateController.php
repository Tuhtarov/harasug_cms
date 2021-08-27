<?php

namespace App\Http\Controllers\Admin\Modules\Gallery;

use App\Models\Gallery;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(int $id, Request $request)
    {
        $gallery = Gallery::withTrashed()->findOrFail($id);
        $data = $request->gallery;
        unset($data['image']);
        $gallery->update($data);
        return redirect()->route('admin.gallery.index');
    }
}
