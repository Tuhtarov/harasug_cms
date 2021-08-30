<?php

namespace App\Contracts\Reservation;

use App\Packages\ConfirmCancel\Service\IConfirmCancel;

/**
 * Интерфейс, предназначен для проверки, поиска, и бронировании свободных домиков.
 * @package App\Contracts\Reservation
 */
interface IReservation extends IConfirmCancel {
    /**
     * Ищет доступные для бронирования домики.
     * Принимает дату заезда, дату отъезда, и количество человек.
     * Возвращает коллекцию доступных домиков для брони.
     *
     * @param string $time_in дата заезда
     * @param string $time_out дата отъезда
     * @param int $qtyPeoples количество человек
     * @return mixed
     */
    function checkAvailableHomes(string $time_in, string $time_out, int $qtyPeoples);

    /**
     * Метод сохраняет в базу запись о брони с указанными данными в аргументе.
     * Возвращает результат true - ок, false - давай по новой.
     *
     * В массиве должны существовать следующие ключи:
     *
     * string time_in дата заезда;
     *
     * string time_out дата отъезда;
     *
     * int qty_child количество детей;
     *
     * int qty_old количество взрослых;
     *
     * int home_id идентификатор домика;
     *
     * string name имя клиента;
     *
     * string phone телефон клиента;
     *
     * @param array $data - массив данных для создания записи в таблице reservations, ключи описаны выше.
     * @return bool
     */
    function bindHome(array &$data) : bool;

    /**
     * Метод проверяет конкретный домик по ID, на его доступность к брони.
     * Если домик свободен, то возвращается true, иначе - false;
     * @param int $homeId идентификатор домика.
     * @param string $timeIn дата заезда;
     * @param string $timeOut дата отъезда;
     * @param int $qtyPeoples количество человек;
     * @return bool
     */
    function checkHomeOnAvailable(int $homeId, string $timeIn, string $timeOut, int $qtyPeoples) : bool;

}
