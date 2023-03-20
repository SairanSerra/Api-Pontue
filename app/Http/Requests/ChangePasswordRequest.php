<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'email'           => ['required'],
            'password'        => ['required', 'min:6'],
            'confirmPassword' => ['required', 'min:6']
        ];
    }

    public function messages()
    {
        return [
            'email.required'                => 'email e um campo obrigatorio',
            'password.required'             => 'password e um campo obrigatorio',
            'password.min'                  => 'password nao aceita menos de 6 caracters',
            'confirmPassword.required'      => 'confirmPassword e um campo obrigatorio',
            'confirmPassword.min'           => 'confirmPassword nao aceita menos de 6 caracters',
        ];
    }
}
