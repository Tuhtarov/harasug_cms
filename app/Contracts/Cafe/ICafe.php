<?php

namespace App\Contracts\Cafe;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

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
    function getCafeTypes(int $perPage = null);

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

    /**
     * Сохраняет блюдо в базу.
     * @param array $recordData
     * @return mixed
     */
    public function storeCafeRecord(array $recordData);

    /**
     * Сохраняет категорию в базу, в массиве должен быть ID кафе для которой создаётся категория, и название категории.
     * @param array $categoryData
     * @return mixed
     */
    public function storeCafeCategory(array $categoryData);

    public function getRecordForEdit(int $recordId) : Model;

    public function getCategoriesForIndex(int $perPage = 20) : LengthAwarePaginator;

    public function updateCafeType(int $cafeTypeId, array $cafeTypeData);

    public function updateCafeCategory(int $categoryId, array $cafeCategoryData);

    public function updateCafeRecord(int $recordId, array $recordData);

}
