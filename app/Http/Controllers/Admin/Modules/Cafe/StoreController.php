<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Models\CafeType;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function storeRecord(Request $request)
    {
        $result = $this->service->storeCafeRecord($request->cafe_record);

        if (!$result) {
            return back();
        }

        $cafeType = CafeType::findOrFail($request->cafe_record['cafe_type_id'])->slug;

        return redirect()->route('admin.cafe.record.index', compact('cafeType'));
    }

    public function storeCategory(Request $request)
    {
        $result = $this->service->storeCafeCategory($request->cafe_category);

        if (!$result) {
            return back();
        }

        return redirect()->route('admin.cafe.category.index');
    }
}
