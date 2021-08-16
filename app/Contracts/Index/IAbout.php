<?php

namespace App\Contracts\Index;

/**
 * Интерфейс, предоставляющий методы для работы с модулем "О нас"
 * @package App\Contracts\Index
 */
interface IAbout {
    /**
     * Возвращает массив карточек блока "О нас".
     * @return array
     */
    public function getAboutCards();
}
