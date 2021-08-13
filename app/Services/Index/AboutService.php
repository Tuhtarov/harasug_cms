<?php

namespace App\Services\Index;

use App\Contracts\Index\AboutInterface;
use App\Models\AboutCard;
use Illuminate\Database\Eloquent\Collection;

class AboutService implements AboutInterface {

    public function getAboutCards()
    {
        $aboutCard = AboutCard::all();
        return $aboutCard->collect();
    }
}
