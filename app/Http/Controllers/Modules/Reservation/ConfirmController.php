<?php

namespace App\Http\Controllers\Modules\Reservation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConfirmController extends BaseController
{
    public function showForm()
    {
        if (!$this->checkSession()) {
            return redirect()->route('adfm.show.main-page');
        }

        return view('adfm.public.reservation.reservation-confirm', [
            'home' => session()->get('reservation')['home'],
            'data' => session()->get('reservation')['data'],
            'page' => session()->get('reservation')['page'],
        ]);
    }

    public function showAdditional()
    {
        if (!$this->checkSession()) {
            return redirect()->route('adfm.show.main-page');
        }

        //проверяем, доступен ли домик для бронирования с указанными реквизитами
        $data = session()->get('reservation')['data'];
        try {
            $this->mainService->checkHomeOnAvailable(
                $data['home_id'], $data['time_in'],
                $data['time_out'], $data['qty_peoples']
            );
        } catch (\Exception $e) {
            $message = 'При проверки юрты на доступность бронирования произошла ошибка.';

            if ($e->getMessage() == 'не доступна') {
                $message = 'К сожалению, юрта "' . $data['title'] . '", на выбранное Вами время ('. "${data['time_in']} : ${data['time_out']}" .') уже занята,
                 попробуйте забронировать на другое время, или воспользуйтесь формой для поиска свободных юрт, которая расположена в верхней части сайта.';
            }

            return redirect()->back()->withErrors(['Ошибка проверки' => $message]);
        }

        return view('adfm.public.reservation.reservation-additional-confirm', [
            'home' => session()->get('reservation')['home'],
            'data' => session()->get('reservation')['data'],
            'page' => session()->get('reservation')['page'],
        ]);
    }

    private function checkSession()
    {
        if (!session()->has('reservation')
            && !isset(session()->get('reservation')['home'])
            && !isset(session()->get('reservation')['data'])
            && !isset(session()->get('reservation')['page'])
        ) {
            Log::channel('reservation')
                ->error(__FILE__ . __METHOD__ . ' В сессии не были найдены данные для отображения View');
            return false;
        }

        return true;
    }
}
