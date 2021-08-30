<?php

namespace App\Http\Controllers\Admin\Modules\Reservation;

use App\Models\Reservation;
use Illuminate\Http\Request;

class UpdateController extends BaseController {
    public function __invoke(int $id, Request $request)
    {
        $reservation = Reservation::withTrashed()->findOrFail($id);
        $reservation->update($request->reservation);
        return redirect()->route('admin.reservation.index-history');
    }
}
