<?php

namespace App\Http\Controllers\Admin\Modules\Reservation;

use App\Contracts\Reservation\IReservation;
use App\Contracts\Reservation\ReservationBase;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected IReservation $service;

    /**
     * BaseController constructor.
     * @param ReservationBase $reservationService
     */
    public function __construct(ReservationBase $reservationService)
    {
        $this->service = $reservationService;
    }
}
