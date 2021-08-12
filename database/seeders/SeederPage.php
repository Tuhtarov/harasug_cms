<?php

namespace Database\Seeders;

use App\Models\Adfm\Page;
use Illuminate\Database\Seeder;

class SeederPage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = Page::create([
            'title' => 'Главная',
            'slug' => 'index',
            'is_published' => '1'
        ]);
        $page->save();

        $page = Page::create([
            'title' => 'Кафе',
            'slug' => 'cafe',
            'is_published' => '1'
        ]);
        $page->save();

        $page = Page::create([
            'title' => 'Галерея',
            'slug' => 'gallery',
            'is_published' => '1'
        ]);
        $page->save();

        $page = Page::create([
            'title' => 'Отдых',
            'slug' => 'chill',
            'is_published' => '1'
        ]);
        $page->save();

        $page = Page::create([
            'title' => 'Бронирование',
            'slug' => 'reservation',
            'is_published' => '1'
        ]);
        $page->save();

        $page = Page::create([
            'title' => 'Контакты',
            'slug' => 'contacts',
            'is_published' => '1'
        ]);
        $page->save();

        $page = Page::create([
            'title' => 'Новости',
            'slug' => 'news',
            'is_published' => '1'
        ]);
        $page->save();

        $page = Page::create([
            'title' => 'Отзывы',
            'slug' => 'comments',
            'is_published' => '1'
        ]);
        $page->save();
    }
}
