<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;

class SeederHomes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutCard = Home::create([
            'title' => "Баран",
            'price' => 1500,
        ]);
        $aboutCard->save();

        $aboutCard = Home::create([
            'title' => "Орёл",
            'price' => 1200,
        ]);
        $aboutCard->save();

        $aboutCard = Home::create([
            'title' => "Медведь",
            'price' => 1488,
        ]);
        $aboutCard->save();
    }
}
