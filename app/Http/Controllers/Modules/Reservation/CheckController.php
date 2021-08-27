<?php

namespace App\Http\Controllers\Modules\Reservation;

use App\Http\Requests\Reservation\CheckAdditionalRequest;
use App\Http\Requests\Reservation\CheckHomeRequest;
use App\Models\Home;

class CheckController extends BaseController
{
    public function checkHome(CheckHomeRequest $request)
    {
        $data = $request->validated()['book'];

        $page = new \stdClass();
        $page->title = 'Подтверждение';
        $page->slug = 'reservation';
        $page->content = '';

        $home = Home::findOrFail($data['home_id']);

        //сохраненяем в сессию данные на случай если произойдёт ошибка валидации,
        session()->put('reservation', [
            'home' => [
                'description' => $home->description,
                'image' => 'https://via.placeholder.com/450x300'
            ],
            'data' => $data,
            'page' => $page
        ]);

        return redirect()->route('reservation.confirm.show');
    }

    //роут для проверки свободных домиков, для альтернативной формы с карточек страницы бронирования
    public function checkAdditional(CheckAdditionalRequest $request)
    {
        $data = $request->validated()['book'];

        $page = new \stdClass();
        $page->title = 'Подтверждение';
        $page->slug = 'reservation';
        $page->content = '';

        $home = Home::findOrFail($data['home_id']);

        //сохраненяем в сессию данные на случай если произойдёт ошибка валидации,
        session()->put('reservation', [
            'home' => [
                'description' => $home->description,
                'image' => 'https://via.placeholder.com/450x300'
            ],
            'data' => $data,
            'page' => $page
        ]);

        return redirect()->route('reservation.confirm.additional.show');
    }
}
