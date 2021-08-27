<?php

namespace App\Contracts\Reservation;

use Illuminate\Support\Carbon;

abstract class ReservationBase implements IReservation {

    protected array $datePeriod;

    /**
     * Метод парсит даты для их совместимости с запросами SQL.
     * Возвращает массив с готовыми для работы датами.
     *
     * @param string $time_in
     * @param string $time_out
     * @return array
     */
    protected function parseDate(string $time_in, string $time_out) : array {
        $this->datePeriod = [
          'start_date' => Carbon::parse($time_in)->toDate()->format('Y-m-d'),
          'end_date' => Carbon::parse($time_out)->toDate()->format('Y-m-d')
        ];

        return $this->datePeriod;
    }
}
