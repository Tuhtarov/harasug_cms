<?php

namespace App\Http\Controllers\Admin\Modules\Home;

use App\Models\Home;

class RestoreController extends BaseController
{
    public function __invoke(int $id)
    {
        Home::withTrashed()->findOrFail($id)->restore();
        return back();
    }
}
