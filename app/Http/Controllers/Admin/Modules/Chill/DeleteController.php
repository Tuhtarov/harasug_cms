<?php

namespace App\Http\Controllers\Admin\Modules\Chill;

use App\Models\Chill;

class DeleteController extends BaseController {
    public function __invoke(int $id)
    {
        Chill::withTrashed()->findOrFail($id)->delete();
        return redirect()->route('admin.chill.index');
    }
}
