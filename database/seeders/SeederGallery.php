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
            'slug' => "nashi_yurts"
        ]);
        $gallery->save();

        $gallery = Gallery::create([
            'title' => "Кафе",
            'content' => "Image 1. Image 2",
            'slug' => "cafe"
        ]);
        $gallery->save();

        $gallery = Gallery::create([
            'title' => "Наша банька",
            'content' => "Image 1. Image 2",
            'slug' => "nasha_banya"
        ]);
        $gallery->save();


        $gallery = Gallery::create([
            'title' => "Наша природа",
            'content' => "Image 1. Image 2",
            'slug' => "nasha_priroda"
        ]);
        $gallery->save();


        $gallery = Gallery::create([
            'title' => "Атмосфера",
            'content' => "Image 1. Image 2",
            'slug' => "atmosfera"
        ]);
        $gallery->save();

        $gallery = Gallery::create([
            'title' => "Лучшее",
            'content' => "Image 1. Image 2",
            'slug' => "best"
        ]);
        $gallery->save();
    }
}
