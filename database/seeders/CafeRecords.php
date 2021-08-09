<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CafeRecords extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [];

        for ($i = 0; $i < 15; $i++) {
            $records[] = [
                'title' => "Супер блюдо $i",
                'description' => "Описание блюда number $i",
                'price' => $i,
            ];
        }
        DB::table('cafe_records')->insert($records);
    }
}
