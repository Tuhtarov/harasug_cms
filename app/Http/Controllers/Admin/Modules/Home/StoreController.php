<?php

namespace App\Http\Controllers\Admin\Modules\Home;

use App\Models\Home;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Request $request)
    {
        $data = $request->home;
        unset($data['image']);

        $newHome = Home::firstOrCreate($data);


        if ($newHome->exists) {
            return redirect()->route('admin.home.index');
        }

        return back();
    }
}
