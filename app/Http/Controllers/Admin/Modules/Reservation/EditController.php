<?php

namespace App\Http\Controllers\Admin\Modules\Reservation;

use App\Http\Controllers\Admin\Screens\Reservation\ReservationScreen;
use App\Models\Reservation;

class EditController extends BaseController {
    public function __invoke(int $id)
    {
        $qa = Reservation::findOrFail($id);
        ReservationScreen::edit($qa);
    }
}
