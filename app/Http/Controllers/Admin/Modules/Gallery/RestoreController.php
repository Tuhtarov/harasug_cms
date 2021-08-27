<?php

namespace App\Http\Controllers\Admin\Modules\Gallery;

use App\Models\Gallery;

class RestoreController extends BaseController
{
    public function __invoke(int $id)
    {
        Gallery::withTrashed()->findOrFail($id)->restore();
        return back();
    }
}
