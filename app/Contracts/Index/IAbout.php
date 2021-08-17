<?php

namespace App\Contracts\Index;

/**
 * Интерфейс, предоставляющий методы для работы с модулем "О нас"
 * @package App\Contracts\Index
 */
interface IAbout {
    public function getAboutItems();
    public function getAboutBySlug(string $slug);
}
