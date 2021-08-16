<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adfm\News;
use Illuminate\Support\Facades\Mail;
use stdClass;

class NewsController extends Controller
{
    public function showNewsList()
    {
        $news = News::all();

        $page = new stdClass();
        $page->title = "Новости";
        $page->slug = "news";

        return view('adfm::public.news.list', [
            'cards' => $news,
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
