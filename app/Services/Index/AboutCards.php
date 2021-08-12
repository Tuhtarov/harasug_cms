<?php

namespace App\Services\Index;

use App\Contracts\Index\AboutCardsInterface;
use App\Models\AboutCard;
use Illuminate\Database\Eloquent\Collection;

class AboutCards implements AboutCardsInterface {

    public function getAboutCards()
    {
        $aboutCard = AboutCard::all();
        return $aboutCard->collect();
    }
}
