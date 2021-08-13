<?php

namespace App\Contracts\Feedback;

use Illuminate\Support\Collection;

interface CommentsInterface {

    /**
     * Возвращает public коллекцию моделей Comment.
     * @return Collection
     */
    public function getComments() : Collection;

    /**
     * Возвращает всю имеющуюся коллекцию моделей Comment.
     * @return Collection
     */
    public function getCommentsAll() : Collection;

    /**
     * Принимает массив, в котором ключи это - [name, phone, email, message].
     * Если совпадений в базе нет, сохраняет полученные данные в модель Comment, Phone, Email.
     * Возвращает результат выполнения, true - сохранено / false - нет.
     *
     * @param array $comment
     * @return bool
     */
    public function saveComments(array $comment) : bool;
}
