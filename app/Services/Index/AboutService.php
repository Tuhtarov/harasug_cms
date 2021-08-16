<?php

namespace App\Services\Index;

use App\Contracts\Index\IAbout;
use App\Models\AboutCard;
use Illuminate\Database\Eloquent\Collection;

class AboutService implements IAbout {

    public function getAboutCards()
    {
        $aboutCard = AboutCard::all();
        return $aboutCard->collect();
    }
}
