<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CafeTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cafe_types')->insert([
            'name' => "Европейская кухня",
            'image' => null
        ]);
        DB::table('cafe_types')->insert([
            'name' => "Национальная кухня",
            'message' => "Национальные блюда хакасской кухни готовим по предварительным заказам",
            'image' => null
        ]);
    }
}
