<?php

namespace App\Contracts\Feedback;

use Illuminate\Support\Collection;

interface CommentInterface {

    /**
     * Возвращает коллекцию Comment.
     * Возможные значения аргумента mode:
     *
     * 1. public - получить коллекцию для отображения в гостевой части сайта. (не включая удалённые и скрытые записи)
     * 2. admin - получить коллекцию для админки. (включая удалённые и скрытые записи)
     * 3. trashed - получить коллекцию состоящую только из удалённых записей.
     * 4. no_published - получить коллекцию состоящую только из скрытых (не опубликованныъ) записей.
     *
     * @param string $mode значение по умолчанию: public
     * @return Collection
     */
    public function getComments(string $mode = 'public') : Collection;

    /**
     * Принимает массив с данными:
     * Имя, сообщение, телефон и email;
     * Ключи массива должны соответствовать следующим: [username, message, phone, email].
     *
     * Возвращает результат выполнения, true - сохранено / false - нет.
     *
     * Если совпадений в базе нет, то создаёт новую запись в таблице comments.
     * Так же создаются соответствующие записи в таблицах phones и emails.
     *
     * @param array $comment
     * @return bool
     */
    public function createComment(array $comment) : bool;
}
