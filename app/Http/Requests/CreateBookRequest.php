<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateBookRequest extends FormRequest
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
            'name'      => ['required', 'max:20'],
            'dtRelease' => ['required', 'date_format:Y-m-d'],
            'nbPages'   => ['required', 'numeric', 'max: 9999999999'],
            'favorite'  => ['required', 'in:YES,NO']
        ];
    }

    public function messages()
    {
        return [

        'name.required'          => 'name e obrigatorio',
        'name.max'               => 'name pode ter no maximo 20 caracters',
        'dtRelease.required'     => 'dtRelease e obrigatório',
        'dtRelease.date_format'  => 'dtRelease deve estar no formato Y-m-d',
        'nbPages.required'       => 'nbPages e obrigatorio',
        'nbPages.numeric'        => 'nbPages aceita apenas números',
        'nbPages.max'            => 'nbPages aceita no maximo o valor de 9999999999',
        'favorite.required'      => 'favorite e obrigatorio',
        'favorite.in'            => 'favorite aceita apenas YES ou NO'

        ];

    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
