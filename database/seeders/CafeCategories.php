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
        $categories = [];

        for ($i = 0; $i < 5; $i++) {
            $categories[] = [
                'name' => "Категория $i"
            ];
        }
        DB::table('cafe_categories')->insert($categories);
    }
}
