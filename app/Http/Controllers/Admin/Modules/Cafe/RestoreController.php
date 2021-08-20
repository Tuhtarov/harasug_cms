<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Models\CafeCategory;
use App\Models\CafeRecord;

class RestoreController extends BaseController
{
    public function restoreRecord(int $id)
    {
        $record = CafeRecord::withTrashed()->findOrFail($id);
        $record->restore();
        return back();
    }

    public function restoreCategory(int $id)
    {
        $category = CafeCategory::withTrashed()->findOrFail($id);
        $category->restore();
        return back();
    }
}
