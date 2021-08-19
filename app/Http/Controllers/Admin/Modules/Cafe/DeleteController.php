<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Models\CafeCategory;
use App\Models\CafeRecord;

class DeleteController extends BaseController {

    public function removeRecord(int $id)
    {
        $record = CafeRecord::findOrFail($id);
        $record->delete();
        return back();
    }

    public function removeCategory(CafeCategory $category)
    {
        $category->delete();
        return back();
    }
}
