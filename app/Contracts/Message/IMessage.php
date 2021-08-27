<?php

namespace App\Contracts\Message;

interface IMessage {
    function getMessages(bool $onlyTrashed = false);
    function createMessage(array $message) : bool;
}
