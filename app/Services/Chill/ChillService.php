<?php

namespace App\Services\Chill;

use App\Contracts\Chill\IChill;
use App\Models\Chill;

class ChillService implements IChill {

    function getCards(string $mode = 'public')
    {
        return Chill::all()->where('published_at','<>', 'null');
    }

    function getCard(string $slug)
    {
        return Chill::where('slug', $slug)->firstOrFail();
    }
}
