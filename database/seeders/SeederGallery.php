<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class SeederGallery extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gallery = Gallery::create([
            'title' => "Наши юрты",
            'content' => "Image 1. Image 2",
            'slug' => "nashi_yurts",
            'published_at' => '2021-11-11 11:11:11'
        ]);
        $gallery->save();

        $gallery = Gallery::create([
            'title' => "Кафе",
            'content' => "Image 1. Image 2",
            'slug' => "cafe",
            'published_at' => '2021-08-11 10:12:11'
        ]);
        $gallery->save();

        $gallery = Gallery::create([
            'title' => "Наша банька",
            'content' => "Image 1. Image 2",
            'slug' => "nasha_banya",
            'published_at' => '2021-11-08 11:09:11'
        ]);
        $gallery->save();


        $gallery = Gallery::create([
            'title' => "Наша природа",
            'content' => "Image 1. Image 2",
            'slug' => "nasha_priroda",
            'published_at' => '2021-11-09 11:09:11'
        ]);
        $gallery->save();


        $gallery = Gallery::create([
            'title' => "Атмосфера",
            'content' => "Image 1. Image 2",
            'slug' => "atmosfera",
            'published_at' => '2021-11-07 11:09:11'
        ]);
        $gallery->save();

        $gallery = Gallery::create([
            'title' => "Лучшее",
            'content' => "Image 1. Image 2",
            'slug' => "best",
            'published_at' => '2021-11-02 11:09:11'
        ]);
        $gallery->save();
    }
}
