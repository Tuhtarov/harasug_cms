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
//
//    /**
//     * @param int $cafe_type
//     * Принимает id типа кухни (Национальная, Европейская)
//     * @return mixed
//     */
//    function getRecordsByType(int $cafe_type);
//
//    /**
//     * @param int $cafe_category
//     * Принимает id категории товара (Завтрак, Закуски к пиву)
//     * @return mixed
//     */
//    function getRecordsByCategory(int $cafe_category);
}
