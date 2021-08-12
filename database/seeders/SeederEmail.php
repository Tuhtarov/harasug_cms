<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Seeder;

class SeederEmail extends Seeder
{
    /**
     * Run the database seeds.
     *  $table->unsignedSmallInteger('id')->autoIncrement()->primary()->unique();
        $table->char('email', '254')->unique();
        $table->string('role')->default('Гость');
     * @return void
     */
    public function run()
    {
        $email = Email::create([
            'email' => 'tuguzhenshina@gmail.ru',
        ]);
        $email->save();

        $email = Email::create([
            'email' => 'kozlovskih@mail.com',
        ]);
        $email->save();

        $email = Email::create([
            'email' => 'gerbermaria@yandex.ru',
        ]);
        $email->save();

        //почта с макета
        $email = Email::create([
            'email' => 'freia_2@mail.ru',
            'role' => 'Харасуг'
        ]);
        $email->save();
    }
}
