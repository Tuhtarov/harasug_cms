<?php

namespace Database\Seeders;

use App\Models\CafeRecord;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CafeCategories::class,
            CafeTypes::class,
            CafeRecords::class,
            CafeRelations::class
        ]);
    }
}
