<?php

namespace App\Http\Controllers\Admin\Modules\About;


use App\Models\AboutCard;
use Illuminate\Http\Request;

class StoreController extends BaseController {
    public function __invoke(Request $request)
    {
        $data = $request->about_card;
        //избавляемся от фото до тех пор, пока не будет сделан функционал хранения фото
        unset($data['image']);

        $aboutCard = AboutCard::firstOrCreate($data);

        if($aboutCard->exists) {
            return redirect()->route('admin.about.index');
        }

        return back();
    }
}
