<?php

namespace App\Contracts\Index;

interface IHome {
    public function getHomes();
    public function getHomeBySlug(string $slug);
}
