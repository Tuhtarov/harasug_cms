<?php

namespace App\Contracts\Gallery;

interface IGallery {
    public function getGalleries();
    public function getGallery(string $slug);
}
