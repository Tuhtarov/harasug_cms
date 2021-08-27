<?php

namespace App\Http\Controllers\Admin\Modules\About;

use App\Http\Controllers\Admin\Screens\About\AboutScreen;
use App\Models\AboutCard;

class EditController extends BaseController {
    public function __invoke(int $id)
    {
        $aboutCard = AboutCard::withTrashed()->findOrFail($id);
        AboutScreen::edit($aboutCard);
    }
}
