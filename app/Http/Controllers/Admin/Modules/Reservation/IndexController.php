<?php

namespace App\Http\Controllers\Admin\Modules\Reservation;

use App\Http\Controllers\Admin\Screens\Reservation\ReservationScreen;

class IndexController extends BaseController
{
    public function showNew()
    {
        ReservationScreen::index($this->service->showNew(), 'Новые заявки');
    }

    public function showHistory()
    {
        ReservationScreen::index($this->service->showHistory(), 'История');
    }

    public function showTrashed()
    {
        ReservationScreen::index($this->service->showHistory(true), 'Удалённое', true);
    }
}
