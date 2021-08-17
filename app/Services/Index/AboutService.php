<?php

namespace App\Services\Index;

use App\Contracts\Index\IAbout;
use App\Models\AboutCard;
use Illuminate\Database\Eloquent\Collection;

class AboutService implements IAbout
{
    public function getAboutItems()
    {
        return AboutCard::all()->collect();
    }

    public function getAboutBySlug(string $slug)
    {
        return AboutCard::where('slug', $slug)->firstOrFail();
    }
}
