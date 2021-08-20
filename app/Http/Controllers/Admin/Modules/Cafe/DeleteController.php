<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Models\CafeCategory;
use App\Models\CafeRecord;

class DeleteController extends BaseController {

    public function deleteRecord(int $id)
    {
        $record = CafeRecord::findOrFail($id);
        $record->delete();
        return back();
    }

    public function deleteCategory(int $id)
    {
        $category = CafeCategory::findOrFail($id);
        $category->delete();
        return back();
    }
}
