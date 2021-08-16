<?php

namespace App\Services\Gallery;

use App\Contracts\Gallery\IGallery;
use App\Models\Gallery;

class GalleryService implements IGallery {

    public function getGalleries()
    {
        return Gallery::all()->where('published_at', '<>', 'null');
    }

    public function getGallery(string $slug)
    {
        return Gallery::where('slug', $slug)->firstOrFail();
    }
}
