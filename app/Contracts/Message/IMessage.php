<?php

namespace App\Contracts\Message;

interface IMessage {
    function getMessages();
    function createMessage(array $message) : bool;
}
