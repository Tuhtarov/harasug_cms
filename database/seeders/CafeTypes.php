<?php

namespace Database\Seeders;

use App\Models\CafeType;
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
        $cafe = CafeType::create([
            'name' => "Европейская кухня"
        ]);
        $cafe->save();

        $cafe = CafeType::create([
            'name' => "Национальная кухня",
            'message' => "Национальные блюда хакасской кухни готовим по предварительным заказам"
        ]);
        $cafe->save();
    }
}
