<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CafeCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cafe_categories')->insert([
            'name' => "Завтраки",
            'cafe_type_id' => 1
        ]);
        DB::table('cafe_categories')->insert([
            'name' => "Эчпочмаки",
            'cafe_type_id' => 2
        ]);
        DB::table('cafe_categories')->insert([
            'name' => "Горячее",
            'cafe_type_id' => 1
        ]);
        DB::table('cafe_categories')->insert([
            'name' => "Мясное",
            'cafe_type_id' => 2
        ]);
    }
}
