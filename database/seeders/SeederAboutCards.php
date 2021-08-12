<?php

namespace Database\Seeders;

use App\Models\AboutCard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederAboutCards extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutCard = AboutCard::create([
            'title' => "О нас",
            'excerpt' => "ааааааааааааааа аааааааааааааааааааааааааа ааааааааааааа аааааааааааааааа аа",
        ]);
        $aboutCard->save();

        $aboutCard = AboutCard::create([
            'title' => "О Ольге",
            'excerpt' => "ааааааааааааааа аааааааааааааааааааааааааа ааааааааааааа аааааааааааааааа аа",
        ]);
        $aboutCard->save();

        $aboutCard = AboutCard::create([
            'title' => "О создателе",
            'excerpt' => "Верстает харасуг 24/7",
        ]);
        $aboutCard->save();
    }
}
