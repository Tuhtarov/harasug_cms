<?php

namespace App\Http\Controllers\Modules\Reservation;

use App\Http\Requests\Reservation\BookingRequest;

class BookingController extends BaseController
{
    public function __invoke(BookingRequest $request)
    {
        $data = $request->validated()['book'];

        $result = $this->mainService->bindHome($data);

        $page = new \stdClass();
        $page->slug = 'result';
        $page->title = 'Результат';

        if (!$result) {
            $page->title = 'Ошибка';
            return view('adfm.public.error', ['page' => $page]);
        }

        $page->title = 'Бронирование успешно';
        session()->forget('reservation');
        return view('adfm.public.success', ['page' => $page]);
    }
}
