<?php

namespace App\Packages\ConfirmCancel\Controller;

use App\Packages\ConfirmCancel\Service\IConfirmCancel;

/**
 * Модицифирует контроллеры, добавляя функционал подтверждения / отмены подтверждения для сущности, у которой присутствует
 * поле is_confirmed.
 *
 * Основное назначение данной модификации - избавление от дублирования одной и той же реализации данного функционала.
 *
 * Методы контроллера:
 *
 * 1. accept (int id) идёт в базу через инстанс сервиса, и устанавливает значение true в поле is_confirmed.
 *
 * 2. cancel (int id) делает тоже самое что и accept, только предназначен для обратной цели.
 *
 * 3. защиненный, абстрактный метод getServiceInstance: IConfirmCancel, в нём необходимо реализовать возврат инстанса
 * сервиса, где реализован интерфейс IConfirmCancel.
 *
 * После выполнения метода accept/cancel, происходит редирект на предыдущий URL.
 *
 * В пакете ConfirmCancel есть стандартная реализация в виде трейта ServiceConfirmCancel, он должен включаться в тот
 * сервис, в котором есть имплементация интерфейса IConfirmCancel.
 *
 * @package App\Traits\Controller
 */
trait ControllerConfirmCancel
{
    /**
     * Метод для подтверждения сущности
     */
    public function accept(int $id)
    {
        $result = $this->getServiceInstance()->entityConfirm($id);

        if ($result) {
            return back()->with('Успешно', 'Запись подтверждена.');
        }

        return back()->withErrors('Ошибка', 'Во время подтверждения произошёл сбой.');
    }

    /**
     * Метод для отмены подтверждения сущности (видимость, бронирование, публикация)
     */
    public function cancel(int $id)
    {
        $result = $this->getServiceInstance()->entityCancel($id);

        if ($result) {
            return back()->with('Успешно', 'Запись подтверждена.');
        }

        return back()->withErrors('Ошибка', 'Во время подтверждения произошёл сбой.');
    }

    /**
     * Данный метод должен возвращать инстанс сервиса, у которого в иеархии
     * наследования есть интерфейс IConfirmCancel с его реализацией.
     * @return mixed
     */
    abstract protected function getServiceInstance() : IConfirmCancel;
}
