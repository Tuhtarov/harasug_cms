<?php

namespace App\Packages\ConfirmCancel\Service;

/**
 * Интерфейс для гарантии реализации функционала подтверждения / отмены подтверждения
 * для какой-либо сущности с полем is_confirmed.
 */
interface IConfirmCancel
{
    /**
     * Метод находит сущность по ID, устанавливает в поле is_confirmed ложное значение.
     * Возвращает результат в виде булева значения.
     *
     * @param int $id идентификатор записи из таблицы.
     * @return bool;
     */
    public function entityCancel(int $id) : bool;

    /**
     * Метод находит сущность по ID, устанавливает в поле is_confirmed истинное значение.
     * Возвращает результат в виде булева значения.
     *
     * @param int $id идентификатор записи из таблицы.
     * @return bool;
     */
    public function entityConfirm(int $id) : bool;
}
