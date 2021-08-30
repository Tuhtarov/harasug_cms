<?php

namespace App\Http\Controllers\Admin\Modules\Reservation;

use App\Models\Reservation;

class RestoreController extends BaseController {
    public function __invoke(int $id)
    {
        Reservation::withTrashed()->findOrFail($id)->restore();
        return back();
    }
}
