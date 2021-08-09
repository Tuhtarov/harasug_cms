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
        $types = [];

        for ($i = 0; $i < 5; $i++) {
            $types[] = [
                'name' => "Кухня $i"
            ];
        }
        DB::table('cafe_types')->insert($types);
    }
}
