<?php

namespace App\Contracts\Index;

/**
 * Интерфейс, предоставляющий методы для работы с модулем "О нас"
 * @package App\Contracts\Index
 */
interface IAbout {
    public function getAboutItems(bool $forAdmin = false);
    public function getAboutBySlug(string $slug);
}
