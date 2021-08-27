<?php

namespace App\Http\Controllers\Admin\Modules\Chill;

use App\Models\Chill;

class RestoreController extends BaseController
{
    public function __invoke(int $id)
    {
        Chill::withTrashed()->findOrFail($id)->restore();
        return back();
    }
}
