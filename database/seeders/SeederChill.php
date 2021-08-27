<?php

namespace Database\Seeders;

use App\Models\Chill;
use Illuminate\Database\Seeder;

class SeederChill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chill = Chill::create([
            'title' => "Конные прогулки",
            'content' => "На коне кататься будете как в фильме Тарантино 'Однажды в Голливуде', там сцена была где хиппи
             приезжим устраивали экскурсии по горам на лошадях, не далеко от их Ранчо.",
            'slug' => "horse_race",
            'price' => 1000
        ]);
        $chill->save();

        $chill = Chill::create([
            'title' => "Экскурсии",
            'content' => "Продемонстриуем Хакасские курганы, живописные места.",
            'slug' => "travel",
            'price' => 1000,
            'price_info' => 'цена / чел'
        ]);
        $chill->save();

        $chill = Chill::create([
            'title' => "Встреча с шаманов",
            'content' => "Гадания, омоложение, очищение души от грехов и злых духов.",
            'slug' => "vstrecha_s_shamanom"
        ]);
        $chill->save();

        $chill = Chill::create([
            'title' => "Баня",
            'content' => "Банька парилка.... Полный рассколбас...))",
            'slug' => "banya",
            'price' => 1000
        ]);
        $chill->save();
    }
}
