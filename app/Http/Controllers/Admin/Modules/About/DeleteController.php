<?php

namespace App\Http\Controllers\Admin\Modules\About;

use App\Models\AboutCard;

class DeleteController extends BaseController
{
    public function __invoke(int $id)
    {
        AboutCard::findorFail($id)->delete();
        return redirect()->route('admin.about.index');
    }
}
