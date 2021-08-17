<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class SeederMessage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message = Message::create([
            'name' => 'Александр',
            'phone' => '+79233988888',
            'email' => 'alexandr@gmail.com',
            'message' => 'Классный сайт. Профессионал разрабатывал.'
        ]);
        $message->save();

        $message = Message::create([
            'name' => 'Павел',
            'phone' => '+79134476666',
            'email' => 'pavel@gmail.com',
            'message' => 'Тестовое сообщение.'
        ]);
        $message->save();

        $message = Message::create([
            'name' => 'Дмитрий',
            'phone' => '+79134474444',
            'email' => 'dmitriy@mail.ru',
            'message' => 'Тестовое сообщение.'
        ]);
        $message->save();
    }
}
