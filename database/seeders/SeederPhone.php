<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Seeder;

class SeederPhone extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tel = Phone::create([
            'phone' => '+79232281337'
        ]);
        $tel->save();

        $tel = Phone::create([
            'phone' => '+79133988640'
        ]);
        $tel->save();

        $tel = Phone::create([
            'phone' => '+79133988622'
        ]);
        $tel->save();

        //Контактные телефоны Харасуга
        $tel = Phone::create([
            'phone' => '+79832550535',
            'role' => 'Харасуг'
        ]);
        $tel->save();
        $tel = Phone::create([
            'phone' => '+79832550545',
            'role' => 'Харасуг'
        ]);
        $tel->save();
        $tel = Phone::create([
            'phone' => '+79235901001',
            'role' => 'Харасуг'
        ]);
        $tel->save();
    }
}
