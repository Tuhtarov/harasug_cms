<?php

namespace App\Http\Controllers\Admin\Modules\Reservation;

use App\Models\Reservation;
use Illuminate\Http\Request;

class StoreController extends BaseController {
    public function __invoke(Request $request)
    {
        $data = $request->reservation;

        $reservation = Reservation::firstOrCreate($data);

        if($reservation->exists) {
            return redirect()->route('admin.reservation.index-history');
        }

        return back();
    }
}
