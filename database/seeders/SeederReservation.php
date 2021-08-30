<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SeederReservation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = Reservation::create([
            'time_in' => date('Y-m-d'),
            'time_out' => Carbon::parse(date('Y-m-d'))->addDay(),
            'qty_old' => 2,
            'qty_child' => 2,
            'home_id' => 8,
            'name' => 'Олёша',
            'phone' => '+79233988888',
            'is_confirmed' => 1
        ]);
        $r->save();

        $r = Reservation::create([
            'time_in' => Carbon::parse(date('Y-m-d'))->addDay(),
            'time_out' => Carbon::parse(date('Y-m-d'))->addDays(2),
            'qty_old' => 0,
            'qty_child' => 2,
            'home_id' => 2,
            'name' => 'Евгеша',
            'phone' => '+79133988888',
            'is_confirmed' => 1
        ]);
        $r->save();

        $r = Reservation::create([
            'time_in' => Carbon::parse(date('Y-m-d'))->addDays(2),
            'time_out' => Carbon::parse(date('Y-m-d'))->addDays(4),
            'qty_old' => 1,
            'qty_child' => 1,
            'home_id' => 3,
            'name' => 'Павлуша',
            'phone' => '+79223988888',
            'is_confirmed' => 1
        ]);
        $r->save();

        $r = Reservation::create([
            'time_in' => Carbon::parse(date('Y-m-d'))->addDays(5),
            'time_out' => Carbon::parse(date('Y-m-d'))->addDays(7),
            'qty_old' => 1,
            'qty_child' => 1,
            'home_id' => 4,
            'name' => 'Вламидимир',
            'phone' => '+79223988888',
            'is_confirmed' => 1
        ]);
        $r->save();

        $r = Reservation::create([
            'time_in' => Carbon::parse(date('Y-m-d')),
            'time_out' => Carbon::parse(date('Y-m-d'))->addDay(),
            'qty_old' => 0,
            'qty_child' => 3,
            'home_id' => 6,
            'name' => 'Анатолий',
            'phone' => '+79223288888',
            'is_confirmed' => 0
        ]);
        $r->save();
    }
}
