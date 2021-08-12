<?php

namespace App\Services\Index;

use App\Contracts\Index\HomesInterface;
use App\Models\Home;

class Homes implements HomesInterface
{
    public function getHomes()
    {
        return Home::all()->collect();
    }
}
