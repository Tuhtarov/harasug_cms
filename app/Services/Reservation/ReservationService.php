<?php

namespace App\Services\Reservation;

use App\Contracts\Reservation\ReservationBase;
use App\Models\Home;
use App\Models\Reservation;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class ReservationService extends ReservationBase
{
    //поиск доступных для брони домиков
    function checkAvailableHomes(string $time_in, string $time_out, int $qtyPeoples)
    {
        //в эту переменную попадают отформатированные даты для sql запросов
        $datePeriod = $this->parseDate($time_in, $time_out);

        try {
            //достаём ID тех домиков, что находятся между прибывшим диапазоном дат + только те, что имеют статус подтверждения
            //т.е даже если есть запись в базе, которая находится в промежутке полученных дат, но при этом, запись не подтверждена с админки,
            //то мы считаем эту запись не актуальной, и считаем связанный с ней домик, как доступный для бронирования
            //я программист, а не оратор, умею общаться только с машинами, если не понятно, то извиняйте, главное что бы этот код работал корреткно

            //после того, как у нас есть список из ID занятых домиков, мы берём все существующие в базе дома, и из полученной коллекции
            //отсеиваем те домики, у которых есть совпадение со списком из ID занятых домиков,
            //тем самым мы получаем только сводобные для брони дома, и работаем дальше с ними
            $notAvailableHomesId = Reservation::whereBetween('time_in', $datePeriod)
                ->orWhereBetween('time_out', $datePeriod)
                ->orWhere(function ($query) use ($datePeriod) {
                    $query->where('time_in', '<', $datePeriod['start_date'])
                    ->where('time_out', '>', $datePeriod['end_date']);
                })
                ->get()->where('is_confirmed', 1)->pluck('home_id')->toArray();

            $availableHomes = Home::get()->whereNotIn('id', $notAvailableHomesId);
//            dd($notAvailableHomesId, $availableHomes);
        } catch (Exception $e) {
            Log::channel('reservation')->error('Ошибка при выполнении запроса ' . $e->getMessage() . ' ' . __FILE__);
            return null;
        }

        return $availableHomes;
    }

    //создание записи о брони домика
    function bindHome(array &$data): bool
    {
        $availableHomes = $this->checkAvailableHomes($data['time_in'], $data['time_out'], $data['qty_child'] + $data['qty_old']);

        if ($availableHomes == null || $availableHomes->count() < 1) {
            return false;
        }

        $home = Home::where('id', $data['home_id'])->first();

        if ($home == null) {
            throw new \Exception('Юрты не существует');
        }

        if (!$availableHomes->contains('id', $home->id)) {
            throw new \Exception('Юрты нет в списке доступных');
        }

        $data['time_in'] = $this->datePeriod['start_date'];
        $data['time_out'] = $this->datePeriod['end_date'];

        return $this->storeData($data);
    }

    /**
     * Метод сохраняет запись о бронировании в базу.
     */
    private function storeData(array &$data): bool
    {
        return Reservation::create($data)->exists();
    }

    //метод проверяет домик на доступность бронирования
    function checkHomeOnAvailable(int $homeId, string $timeIn, string $timeOut, int $qtyPeoples): bool
    {
        $availableHomes = $this->checkAvailableHomes($timeIn, $timeOut, $qtyPeoples);

        if ($availableHomes == null || $availableHomes->count() < 1) {
            return false;
        }

        $home = Home::where('id', $homeId)->first();

        if ($home == null) {
            throw new \Exception('не существует');
        }

        if (!$availableHomes->contains('id', $home->id)) {
            throw new \Exception('не доступна');
        }

        return true;
    }
}
