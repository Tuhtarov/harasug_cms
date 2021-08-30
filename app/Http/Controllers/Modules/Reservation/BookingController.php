<?php

namespace App\Http\Controllers\Modules\Reservation;

use App\Http\Requests\Reservation\BookingRequest;

class BookingController extends BaseController
{
    public function __invoke(BookingRequest $request)
    {
        $data = $request->validated()['book'];

        $page = new \stdClass();
        $page->slug = 'result';
        $page->title = 'Результат';

        if(isset($data['max_peoples'])) {
            if ($data['qty_child'] + $data['qty_old'] > $data['max_peoples']) {
                return redirect()->route('reservation.index')->withErrors(['Ошибка при бронировании юрты!', 'Суммарное количество людей не должно превышать: ' . $data['max_peoples']]);
            }
        }

        $result = $this->mainService->bindHome($data);

        if (!$result) {
            $page->title = 'Ошибка';
            return view('adfm.public.error', ['page' => $page]);
        }

        $page->title = 'Бронирование успешно';

        session()->forget('reservation');
        return view('adfm.public.success', ['page' => $page]);
    }
}
