<?php

namespace App\Http\Controllers\Admin\Modules\Home;

use App\Models\Home;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(int $id, Request $request)
    {
        $home = Home::withTrashed()->findOrFail($id);
        $data = $request->home;
        unset($data['image']);
        $home->update($data);
        return redirect()->route('admin.home.index');
    }
}
