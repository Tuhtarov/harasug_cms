<?php

namespace App\Contracts\Reservation;

use App\Models\Reservation;
use Illuminate\Support\Carbon;

abstract class ReservationBase implements IReservation {

    protected array $datePeriod;

    private static $perPage = 15;

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

    /**
     * Выводит записи без подтверждения бронирования.
     * По задумке, после подтверждения, запись уходит в историю.
     */
    public function showNew()
    {
        return Reservation::where('time_in', '>=', date('Y-m-d'))
            ->where('time_out', '>', date('Y-m-d'))
//            ->where('is_confirmed', false)
            ->join('homes', 'reservations.home_id', 'homes.id')
            ->select([
                'reservations.*',
                'homes.title as home_title'
            ])
            ->orderByDesc('created_at')
            ->paginate(self::$perPage);
    }

    /**
     * Выводит все записи из таблицы бронирования.
     * Истинное значение аргумента $onlyTrashed позволяет получить только удалённые записи.
     */
    public function showHistory(bool $onlyTrashed = false, bool $withTrashed = false)
    {
        if ($onlyTrashed) {
            return Reservation::onlyTrashed()
                ->join('homes', 'reservations.home_id', 'homes.id')
                ->select([
                    'reservations.*',
                    'homes.title as home_title'
                ])
                ->orderByDesc('created_at')
                ->paginate(self::$perPage);
        }

        return Reservation::withTrashed($withTrashed)
            ->join('homes', 'reservations.home_id', 'homes.id')
            ->select([
                'reservations.*',
                'homes.title as home_title'
            ])
            ->orderByDesc('created_at')
            ->paginate(self::$perPage);
    }

    /**
     * @param int $perPage
     */
    public static function setPerPage(int $perPage): void
    {
        self::$perPage = $perPage;
    }
}
