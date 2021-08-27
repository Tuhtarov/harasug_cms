<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return RequestRules::getBookingRules();
    }

    public function messages()
    {
        return [
            'book.phone.required' => 'Для подтверждения необходимо ввести номер телефона.',
            'book.name.required' => 'Для подтверждения необходимо ввести своё имя.',
            'book.qty_old.required' => 'Поле для ввода количества взрослых должно быть заполнено.'
        ];
    }
}
