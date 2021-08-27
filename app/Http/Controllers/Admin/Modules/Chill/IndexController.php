<?php

namespace App\Http\Controllers\Admin\Modules\Chill;

use App\Http\Controllers\Admin\Screens\Chill\ChillScreen;
use App\Models\Chill;

class IndexController extends BaseController {
    public function __invoke()
    {
        $chills = Chill::withTrashed()->paginate(15);
        ChillScreen::index($chills);
    }
}
