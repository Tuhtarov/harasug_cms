<?php

namespace App\Http\Controllers\Modules\Reservation;

use App\Http\Requests\Reservation\SearchRequest;
use Illuminate\Database\Eloquent\Collection;

class SearchController extends BaseController
{
    //выполняет поиск доступных для бронирования домиков, в конце отдаёт результат
    public function showAvailableHomes(SearchRequest $request)
    {
        $data = $request->validated()['book'];

        $qtyPeoples = $data['qty_old'] + $data['qty_child'];

        $availableHomes = $this->mainService->checkAvailableHomes(
            $data['time_in'],
            $data['time_out'],
            $qtyPeoples
        );

        if ($availableHomes instanceof Collection) {
            $availableHomes = $availableHomes->collect();
        }

        $page = new \stdClass();
        $page->title = 'Результат поиска';
        $page->slug = 'reservation';
        $page->content = '';

        return view('adfm::public.reservation.reservation-result-list', [
            'page' => $page,
            'cards' => $availableHomes,
            'data' => $data
        ]);
    }
}
