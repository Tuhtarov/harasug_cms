<?php

namespace App\Http\Controllers\Admin\Modules\Home;


use App\Models\Home;

class DeleteController extends BaseController
{
    public function __invoke(int $id)
    {
        Home::findOrFail($id)->delete();
        return redirect()->route('admin.home.index');
    }
}
