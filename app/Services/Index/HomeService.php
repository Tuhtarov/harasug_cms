<?php

namespace App\Services\Index;

use App\Contracts\Index\IHome;
use App\Models\Home;

class HomeService implements IHome
{
    public function getHomes()
    {
        return Home::all()->collect();
    }
}
