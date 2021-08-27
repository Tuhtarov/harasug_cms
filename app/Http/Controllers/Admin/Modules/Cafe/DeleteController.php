<?php

namespace App\Http\Controllers\Admin\Modules\Cafe;

use App\Models\CafeCategory;
use App\Models\CafeRecord;

class DeleteController extends BaseController {

    public function deleteRecord(int $id)
    {
        $record = CafeRecord::findOrFail($id);
        $SlugCafeType = $this->service->getSlugCafeTypeByCategoryId($record->cafe_category_id);
        $record->delete();
        return redirect()->route('admin.cafe.record.index', ['cafeType' => $SlugCafeType]);
    }

    public function deleteCategory(int $id)
    {
        $category = CafeCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.cafe.category.index');
    }
}
