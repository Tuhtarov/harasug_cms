<?php

namespace App\Http\Controllers\Admin\Modules\Message;

use App\Http\Controllers\Admin\Screens\Message\MessageScreen;

class IndexController extends BaseController
{
    public function withoutTrashed()
    {
        $messages = $this->service->getMessages();
        MessageScreen::index($messages);
    }

    public function onlyTrashed() {
        $messages = $this->service->getMessages(true);
        MessageScreen::index($messages, true);
    }
}
