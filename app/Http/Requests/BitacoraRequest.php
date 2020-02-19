<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BitacoraRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'anillamador' => ['numeric', 'digits_between:8,10'],
            'dni' => ['numeric', 'digits_between:10,13'],
            'ticket' => ['numeric'],
            'tmo' => ['regex:#[0-9]:[0-9]{2}#'],
        ];
    }
}
