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
     * Принимает 2 массива:
     * 1. Имя и сообщение | ключи: [username, message].
     * 2. Телефон и email | ключи: [phone, email].
     *
     * Возвращает результат выполнения, true - сохранено / false - нет.
     *
     * Если совпадений в базе нет, создаёт новый отзыв в моделе Comment.
     * Так же создаются соответсвующие записи из массива contacts в моделях Phone и Email.
     * @param array $comment
     * @param array $contacts
     * @return bool
     */
    public function createComment(array $comment, array $contacts) : bool;
}
