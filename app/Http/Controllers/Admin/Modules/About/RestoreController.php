<?php

namespace App\Http\Controllers\Admin\Modules\About;

use App\Models\AboutCard;

class RestoreController extends BaseController {
    public function __invoke(int $id)
    {
        AboutCard::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.about.index');
    }
}
