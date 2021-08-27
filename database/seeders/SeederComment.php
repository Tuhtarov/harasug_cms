<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class SeederComment extends Seeder
{
    /**
     * Run the database seeds.
     *
     *  $table->string('username', 100);
        $table->unsignedSmallInteger('phone_id', 12)->unique();
        $table->tinyText('email')->unique();
        $table->text('message');
     *
     * @return void
     */
    public function run()
    {
        $comment = Comment::create([
            'username' => 'Никита Тугужеков',
            'phone_id' => 1,
            'email_id' => 1,
            'message' => 'Классное место для отдыха со своей девушкой!!'
        ]);
        $comment->save();

        $comment = Comment::create([
            'username' => 'Вячеслав Козловских',
            'phone_id' => 2,
            'email_id' => 2,
            'message' => 'Лучшие трэп юрты'
        ]);
        $comment->save();

        $comment = Comment::create([
            'username' => 'Мария Гербер',
            'phone_id' => 3,
            'email_id' => 3,
            'message' => 'Понравилась еда в кафе. Прекрасные и живописные места, в добавок и озеро не далеко'
        ]);
        $comment->save();
    }
}
