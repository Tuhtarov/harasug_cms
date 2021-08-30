<?php

namespace App\Http\Controllers\Admin\Modules\Reservation;

use App\Http\Controllers\Admin\Screens\Reservation\ReservationScreen;

class CreateController extends BaseController
{
    public function __invoke()
    {
        ReservationScreen::create();
    }
}
