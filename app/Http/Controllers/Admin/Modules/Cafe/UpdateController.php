<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Models\CafeType;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function updateRecord(int $id, Request $request)
    {
        $this->service->updateCafeRecord($id, $request->cafe_record);
        $cafeType = CafeType::findOrFail($request->cafe_record['cafe_type_id'])->slug;

        return redirect()->route('admin.cafe.record.index', compact('cafeType'));
    }

    public function updateCategory(int $id, Request $request)
    {
        $this->service->updateCafeCategory($id, $request->cafe_category);
        return redirect()->route('admin.cafe.category.index');
    }

    public function updateCafe(int $id, Request $request)
    {
        $this->service->updateCafeType($id, $request->cafe_type);
        return redirect()->route('admin.cafe.index');
    }
}
