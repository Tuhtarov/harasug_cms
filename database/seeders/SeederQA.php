<?php

namespace Database\Seeders;

use App\Models\QuestionAnswer;
use Illuminate\Database\Seeder;

class SeederQA extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Qa = QuestionAnswer::create([
            'question' => "Что такое Lorem Ipsum?",
            'answer' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.'
        ]);
        $Qa->save();

        $Qa = QuestionAnswer::create([
            'question' => "Почему он используется?",
            'answer' => 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться.'
        ]);
        $Qa->save();

        $Qa = QuestionAnswer::create([
            'question' => "Откуда он появился?",
            'answer' => 'Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так.'
        ]);
        $Qa->save();

        $Qa = QuestionAnswer::create([
            'question' => "Где его взять?",
            'answer' => 'Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации,
            например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен
            Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.'
        ]);
        $Qa->save();
    }
}
