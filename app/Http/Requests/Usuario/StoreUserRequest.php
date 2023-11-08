<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'perfil_id' => 'required|array|min:1',
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'O campo Nome não pode ser vazio!',
            'email.required' => 'Informe o seu email!',
            'email.unique' => 'email já cadastrado!',
            'email.email' => 'Informe um email valido!',
            'perfil_id.array' => 'Informe o Perfil!',
            'password.required' => 'O campo Senha não pode ser vazio!',
            'password.min' => 'A senha deve possuir no minimo 8 caracteres!',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'perfil_id' => 'Perfil',
        ];
    }
}
