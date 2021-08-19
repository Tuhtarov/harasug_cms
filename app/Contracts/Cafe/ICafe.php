<?php

namespace App\Contracts\Cafe;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ICafe {

    /**
     * @return mixed
     * Возвращает коллекцию всех товаров Кафе.
     */
    function getRecordsForPublicCafe() : object;

    /**
     * Достаёт товары для админки по id кафе.
     *
     * @param int $cafeTypeId
     * @param bool $withTrashed
     * @param int|null $perPage
     */
    function getRecordsByTypeId(int $cafeTypeId,  bool $withTrashed = false, int $perPage = null);

    /**
     * Возвращает все имеющиеся кухни.
     * @return mixed
     */
    function getCafeTypes();

    /**
     * Возвращает все категории.
     * Опциональные параметры:
     * 1. Вернуть всё, включая удалённые категории.
     * 2. Вернуть категории, принадлежащие конкретной кухни.
     *
     * @param bool $withTrashed
     * @param int|null $byCafeId
     * @return mixed
     */
    function getCategories(bool $withTrashed = false, int $byCafeId = null);

    public function storeCafeRecord(array $recordData);
}
