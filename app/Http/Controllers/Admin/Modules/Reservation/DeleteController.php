<?php

namespace App\Http\Controllers\Admin\Modules\Reservation;

use App\Models\Reservation;

class DeleteController extends BaseController
{
    public function __invoke(int $id)
    {
        Reservation::findorFail($id)->delete();
        return back();
    }
}
