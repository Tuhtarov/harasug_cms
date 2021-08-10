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
        DB::table('cafe_records')->insert([
            'title' => "Доширак с курицей",
            'description' => "Делекантный вкус, изысканное блюдо",
            'weight' => '200 г',
            'price' => 99,
            'cafe_category_id' => 1
        ]);
        DB::table('cafe_records')->insert([
            'title' => "Доширак с курицей",
            'description' => "Делекантный вкус, изысканное блюдо",
            'weight' => '200 г',
            'price' => 99,
            'cafe_category_id' => 1
        ]);
        DB::table('cafe_records')->insert([
            'title' => "Доширак с курицей",
            'description' => "Делекантный вкус, изысканное блюдо",
            'weight' => '200 г',
            'price' => 99,
            'cafe_category_id' => 1
        ]);


        DB::table('cafe_records')->insert([
            'title' => "Лолось маринованный",
            'description' => "Только что поймали",
            'weight' => '1000 г',
            'price' => 199,
            'cafe_category_id' => 4
        ]);
        DB::table('cafe_records')->insert([
            'title' => "Лолось маринованный",
            'description' => "Только что поймали",
            'weight' => '1000 г',
            'price' => 199,
            'cafe_category_id' => 4
        ]);
        DB::table('cafe_records')->insert([
            'title' => "Лолось маринованный",
            'description' => "Только что поймали",
            'weight' => '1000 г',
            'price' => 199,
            'cafe_category_id' => 4
        ]);



        DB::table('cafe_records')->insert([
            'title' => "Доширак c говядиной острый",
            'description' => "Очень острый",
            'weight' => '20 г',
            'price' => 29,
            'cafe_category_id' => 2
        ]);
        DB::table('cafe_records')->insert([
            'title' => "Доширак c говядиной острый",
            'description' => "Очень острый",
            'weight' => '20 г',
            'price' => 29,
            'cafe_category_id' => 2
        ]);
        DB::table('cafe_records')->insert([
            'title' => "Доширак c говядиной острый",
            'description' => "Очень острый",
            'weight' => '20 г',
            'price' => 29,
            'cafe_category_id' => 2
        ]);
    }
}
