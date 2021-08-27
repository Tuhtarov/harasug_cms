<?php

namespace App\Http\Controllers\Admin\Modules\About;

use App\Models\AboutCard;
use Illuminate\Http\Request;

class UpdateController extends BaseController {
    public function __invoke(int $id, Request $request)
    {
        $aboutCard = AboutCard::findOrFail($id);
        $aboutCard->update($request->about_card);
        return redirect()->route('admin.about.index');
    }
}
