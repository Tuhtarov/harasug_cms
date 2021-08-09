<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CafeRelations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = [];

        for ($i = 1; $i < 4; $i++) {
            $relations[] = [
                'cafe_record_id' => $i,
                'cafe_category_id' => $i,
                'cafe_type_id' => $i,
            ];
        }
        for ($i = 5; $i < 9; $i++) {
            $relations[] = [
                'cafe_record_id' => $i,
                'cafe_category_id' => 2,
                'cafe_type_id' => 1,
            ];
        }
        for ($i = 10; $i < 14; $i++) {
            $relations[] = [
                'cafe_record_id' => $i,
                'cafe_category_id' => 3,
                'cafe_type_id' => 1,
            ];
        }
        DB::table('cafe_relations')->insert($relations);
    }
}
