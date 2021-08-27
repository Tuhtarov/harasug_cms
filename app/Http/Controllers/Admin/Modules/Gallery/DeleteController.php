<?php

namespace App\Http\Controllers\Admin\Modules\Gallery;

use App\Models\Gallery;

class DeleteController extends BaseController
{
    public function __invoke(int $id)
    {
        Gallery::findOrFail($id)->delete();
        return redirect()->route('admin.gallery.index');
    }
}
