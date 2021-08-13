<?php

namespace App\Services\Index;

use App\Contracts\Index\HomeInterface;
use App\Models\Home;

class HomeService implements HomeInterface
{
    public function getHomes()
    {
        return Home::all()->collect();
    }
}
