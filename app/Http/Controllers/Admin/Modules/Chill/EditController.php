<?php

namespace App\Http\Controllers\Admin\Modules\Chill;

use App\Http\Controllers\Admin\Screens\Chill\ChillScreen;
use App\Models\Chill;

class EditController extends BaseController
{
    public function __invoke(int $id)
    {
        $chill = Chill::withTrashed()->findOrFail($id);
        ChillScreen::edit($chill);
    }
}
