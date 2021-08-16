<?php

namespace App\Http\Requests\Comment;

class DefaultRules
{
    //константы для валидации комментариев
    public const PHONE_LENGTH = 12;
    public const NAME_MIN_LENGTH = 4;
    public const EMAIL_MIN_LENGTH = 3;
    public const EMAIL_MAX_LENGTH = 254;
    public const MESSAGE_MIN_LENGTH = 15;
}
