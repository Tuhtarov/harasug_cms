<?php

namespace App\Services\Message;

use App\Contracts\Message\IMessage;
use App\Models\Message;

class MessageService implements IMessage
{
    function getMessages()
    {
        return Message::all();
    }

    function createMessage(array $message) : bool
    {
        $message = new Message($message);
        return $message->save();
    }
}
