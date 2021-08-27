<?php

namespace App\Http\Controllers\Admin\Modules\Chill;

use App\Models\Chill;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Request $request)
    {
        $data = $request->chill;
        Chill::firstOrCreate($data);
        return redirect()->route('admin.chill.index');
    }
}
