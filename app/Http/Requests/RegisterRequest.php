<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'regex:/^[a-zA-Zá-úÁ-Ú\s]+$/'],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'min:6']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'password' => 'senha',
        ];
    }


    public function messages()
    {
        return [
            'name.required' =>'O :attribute é obrigatório!',
            'email.required' =>'O :attribute é obrigatório!',
            'password.required' =>'A :attribute é obrigatória!',
            'name.min' => 'O :attribute deve ter pelo menos :min letras!',
            'password.min' => 'A :attribute deve ter pelo menos :min letras!',
            'email.email' => 'O email deve ser um email válido!',
            'email.unique' => 'Esse email já está sendo usado!',
            'name.regex' => 'Use apenas letras e espaços no seu nome!'
        ];
    }
}
