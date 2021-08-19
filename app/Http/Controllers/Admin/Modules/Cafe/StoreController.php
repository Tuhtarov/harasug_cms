<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use Illuminate\Http\Request;

class StoreController extends BaseController {
    public function __invoke(Request $request)
    {
        $result = $this->service->storeCafeRecord($request->cafe_record);

        if($result) {
            return back(201);
        }

        return back();
    }
}
