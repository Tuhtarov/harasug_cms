<?php

namespace App\Http\Controllers\Modules;

use App\Contracts\Cafe\CafeInterface;
use App\Http\Controllers\Controller;
use App\Models\Adfm\Page;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    private CafeInterface $cafeService;
    private Page $page;

    public function __construct(CafeInterface $_cafe)
    {
        $this->cafeService = $_cafe;
        $this->page = Page::where('slug', '=', 'cafe')->firstOrFail();
    }

    /**
     * Для обработки "Гостевого кафе"
     */
    public function index()
    {
        $cafe = $this->cafeService->getRecordsForPublicCafe();
        return view('adfm::public.page', [
            'page' => $this->page,
            'cafe' => $cafe
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
