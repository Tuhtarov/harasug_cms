<?php

namespace App\Http\Controllers\Site;

use App\Contracts\Index\IAbout;
use App\Contracts\Index\IHome;
use App\Contracts\Index\IQuestionAnswer;
use App\Models\Adfm\Product;
use App\Http\Controllers\Controller;
use App\Models\DumpTruck;
use App\Models\Adfm\Page;


class PageController extends Controller
{
    private IAbout $aboutCardsService;
    private IHome $homesService;
    private IQuestionAnswer $qaService;

    public function __construct(
        IAbout $_aboutCards,
        IHome $_homes,
        IQuestionAnswer $_qa
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
