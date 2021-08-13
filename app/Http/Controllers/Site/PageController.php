<?php

namespace App\Http\Controllers\Site;

use App\Contracts\Index\AboutInterface;
use App\Contracts\Index\HomeInterface;
use App\Contracts\Index\QaInterface;
use App\Models\Adfm\Product;
use App\Http\Controllers\Controller;
use App\Models\DumpTruck;
use App\Models\Adfm\Page;


class PageController extends Controller
{
    private AboutInterface $aboutCardsService;
    private HomeInterface $homesService;
    private QaInterface $qaService;

    public function __construct(
        AboutInterface $_aboutCards,
        HomeInterface $_homes,
        QaInterface $_qa
    ) {
        $this->aboutCardsService = $_aboutCards;
        $this->homesService = $_homes;
        $this->qaService = $_qa;
    }

    public function showMainPage()
    {
        $aboutCards = $this->aboutCardsService->getAboutCards();
        $homes = $this->homesService->getHomes();
        $qaItems = $this->qaService->getQA();

        $page = Page::where('slug', '=', 'index')->firstOrFail();

        return view('adfm::public.index', [
            'page' => $page,
            'aboutCards' => $aboutCards,
            'homes' => $homes,
            'qaItems' => $qaItems
        ]);
    }

    public function showPage($slug)
    {
        $page = Page::where('slug', '=', $slug)->firstOrFail();

        return view('adfm::public.page', [
            'page' => $page
        ]);
    }
}
