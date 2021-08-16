<?php

namespace App\Contracts\Chill;

interface IChill {
    function getCards(string $mode = 'public');
    function getCard(string $slug);
}
