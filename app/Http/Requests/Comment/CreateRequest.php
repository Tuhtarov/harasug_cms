<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        return [
                'comment.username' => 'required|string|Min:'.DefaultRules::NAME_MIN_LENGTH,
                'comment.message' => 'required|Min:' . DefaultRules::MESSAGE_MIN_LENGTH,
                'comment.phone' => 'required|regex:/^\+7([0-9]+)+$/|Min:' . DefaultRules::PHONE_LENGTH . '|Max:' . DefaultRules::PHONE_LENGTH,
                'comment.email' => 'required|regex:/^.+@.+$/i|Min:' . DefaultRules::EMAIL_MIN_LENGTH . '|Max:' . DefaultRules::EMAIL_MAX_LENGTH,
        ];
    }
}
