<?php

namespace Database\Seeders;

use App\Models\Adfm\News;
use Illuminate\Database\Seeder;

class SeederNews extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = News::create([
            'title' => "Объявление о нерабочих днях",
            'content' => "Контен не может быть нулевым, иначе создать запись не получится :(",
            'slug' => "info",
            'published_at' => '2021-02-10 12:00:00'

        ]);
        $news->save();

        $news = News::create([
            'title' => "Специальные предложения",
            'content' => "Контен не может быть нулевым, иначе создать запись не получится :(",
            'slug' => "sales",
            'published_at' => '2021-09-10 12:00:00'

        ]);
        $news->save();

        $news = News::create([
            'title' => "Вкусные пироги на воскресенье",
            'content' => "Контен не может быть нулевым, иначе создать запись не получится :(",
            'slug' => "pirogi_kapusta",
            'published_at' => "2020-08-10 12:00:00"

        ]);
        $news->save();

        $news = News::create([
            'title' => "Домашние изделия из натурального творога",
            'content' => "Контен не может быть нулевым, иначе создать запись не получится :(",
            'slug' => "natural_food",
            'published_at' => '2021-04-10 12:00:00'
        ]);
        $news->save();
    }
}
