<?php

namespace App\Http\Controllers\Admin\Modules\Chill;

use App\Http\Controllers\Controller;
use App\Models\Chill;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(int $id, Request $request)
    {
        $chill = Chill::withTrashed()->findOrFail($id);
        $data = $request->chill;
        $chill->update($data);
        return redirect()->route('admin.chill.index');
    }
}
