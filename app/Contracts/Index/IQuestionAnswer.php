<?php

namespace App\Contracts\Index;

interface IQuestionAnswer {
    /**
     * Возвращает коллекцию "Вопрос-ответ".
     * Принимает два параметра (необязательно)
     *
     * 1. qtyRecords - количество записей.
     * 2. sortMode - сортировка по ASC / DESC.
     *
     * @param int|null $qtyRecords по умолчанию null (все записи)
     * @param string $sortMode по умолчанию desc
     * @return mixed
     */
    public function getQA(int $qtyRecords = null, string $sortMode = 'desc');
}
