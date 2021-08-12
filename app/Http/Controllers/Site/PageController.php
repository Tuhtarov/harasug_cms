<?php

namespace App\Http\Controllers\Site;

use App\Contracts\Index\AboutCardsInterface;
use App\Contracts\Index\HomesInterface;
use App\Contracts\Index\QuestionsAnswerInterface;
use App\Models\Adfm\File;
use App\Models\Adfm\Product;
use App\Http\Controllers\Controller;
use App\Models\DumpTruck;
use App\Models\Adfm\Page;
use Doctrine\DBAL\Driver\Exception;
use Illuminate\Http\File as IFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class PageController extends Controller
{
    private AboutCardsInterface $aboutCardsService;
    private HomesInterface $homesService;
    private QuestionsAnswerInterface $qaService;

    public function __construct(
        AboutCardsInterface $_aboutCards,
        HomesInterface $_homes,
        QuestionsAnswerInterface $_qa
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
        return view('adfm::public.page', compact('page'));
    }
}
