<?php

namespace App\Http\Controllers\Site;

use App\Helpers\Adfm\Dev;
use App\Models\Adfm\File;
use App\Models\Adfm\Product;
use App\Http\Controllers\Controller;
use App\Models\DumpTruck;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use App\Models\Adfm\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Adapter\Local;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;
use League\Glide\Server;
use stdClass;


class PageController extends Controller
{
    public function showMainPage()
    {
        $page = new stdClass();
        $page->title = "Главная";
        $page->slug = "/";
        return view('adfm::public.index', compact('page'));
    }

    public function showPage($slug)
    {
        $page = Page::where('slug', '=', $slug)->firstOrFail();
        return view('adfm::public.page', compact('page'));
    }

    /* TODO Через этот метод нужно представлять конкретный блог конкретной страницы */
    public function showPageWith($pageSlug, $blogSlug)
    {
        $page = Page::where('slug', '=', $pageSlug)->firstOrFail();
        return view('adfm::public.page', compact('page'));
    }
}
