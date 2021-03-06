<?php

namespace App\Contracts\Comment;

use App\Packages\ConfirmCancel\Service\IConfirmCancel;
use Illuminate\Support\Collection;

interface IComment extends IConfirmCancel {

    /**
     * Возвращает коллекцию Comment.
     * Возможные значения аргумента mode:
     *
     * 1. public - получить коллекцию для отображения в гостевой части сайта. (не включая удалённые и скрытые записи)
     * 2. admin - получить коллекцию для админки. (включая не опубликованные записи)
     * 3. trashed - получить коллекцию состоящую только из удалённых записей.
     * 4. no_published - получить коллекцию состоящую только из скрытых (не опубликованныъ) записей.
     *
     * @param string $mode значение по умолчанию: public
     * @return Collection
     */
     public function getComments(string $mode = 'public', int $perPageAdmin = 15, bool $onlyTrashed = false);

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
