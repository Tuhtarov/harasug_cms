<?php

namespace App\Services\Message;

use App\Contracts\Message\IMessage;
use App\Models\Message;

class MessageService implements IMessage
{
    function getMessages(bool $onlyTrashed = false)
    {
        if ($onlyTrashed) {
            return Message::onlyTrashed()->paginate(10);
        }

        return Message::withTrashed(false)->paginate(10);
    }

    function createMessage(array $message): bool
    {
        $message = new Message($message);
        return $message->save();
    }
}
