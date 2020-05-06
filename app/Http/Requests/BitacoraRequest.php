<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Stmt\Break_;

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
        switch (auth()->user()->group) {
            case 'BAF':
                return [
                    'anillamador' => 'numeric|digits_between:8,10|required',
                    'dni' => 'numeric|digits_between:10,13|required',
                    'ticket' => 'numeric|required',
                    'tmo' => 'regex:#[0-9]:[0-9]{2}#|required',
                    'coment' => 'min:10|required',
                    'tipo' => 'required',
                ];
                break;
            case 'CHAT':
                return [
                    'ip' => ['regex:#^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$#'],
                    'dni' => ['numeric', 'digits_between:10,13'],
                    'ticket' => ['numeric'],
                    'tmo' => ['regex:#[0-9]:[0-9]{2}#'],
                    'req' => ['required']
                ];
                break;
            case 'SACMOVIL':
                return [
                    'anillamador' => ['numeric', 'digits_between:8,10'],
                    'dni' => ['numeric', 'digits_between:10,13'],
                    'ticket' => ['numeric'],
                    'tmo' => ['regex:#[0-9]:[0-9]{2}#'],
                ];
                break;
            default:
                break;
        }
    }
}
