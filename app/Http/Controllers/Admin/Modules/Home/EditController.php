<?php

namespace App\Http\Controllers\Admin\Modules\Home;

use App\Http\Controllers\Admin\Screens\Home\HomeScreen;
use App\Models\Home;

class EditController extends BaseController
{
    public function __invoke(int $id)
    {
        $home = Home::findOrFail($id);
        HomeScreen::edit($home);
    }
}
