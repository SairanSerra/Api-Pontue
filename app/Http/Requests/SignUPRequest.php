<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SignUPRequest extends FormRequest
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
            'name'              => ['required'],
            'email'             => ['required'],
            'password'          => ['required', 'min:6'],
            'confirmPassword'   => ['required', 'min:6']
        ];
    }

    public function messages()
    {
        return [
            'name.required'            => 'name e um campo obrigatorio',
            'email.required'           => 'email e um campo obrigatorio',
            'password'                 => 'password e um campo obrigatorio',
            'password.min'             => 'password deve conter no minimo 6 caracteres',
            'confirmPassword.required' => 'confirmPassword e um campo obrigatorio',
            'confirmPassword.min'      => 'confirmPassword deve conter no minimo 6 caracteres'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }

}
