<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Adfm\News;
use App\Models\Adfm\Page;
use stdClass;

class NewsController extends Controller
{
    public function showNewsList()
    {
        $cards = News::all();

        $page = Page::where('slug', 'news')->firstOrFail();

        return view('adfm::public.news.list', [
            'cards' => $cards,
            'page' => $page
        ]);
    }

    public function showNewsPage($year, $month, $day, $slug)
    {
        $news = News::whereYear('published_at', '=', $year)->whereMonth('published_at', '=', $month)
            ->whereDay('published_at', '=', $day)->where('slug', $slug)->firstOrFail();

        $page = new stdClass();
        $page->title = $news->slug;
        $page->slug = $news->slug;

        return view('adfm::public.news.page', [
            'news' => $news,
            'page' => $page
        ]);
    }
}
