<?php

namespace App\Http\Requests\Vaga;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreVagaRequest extends FormRequest
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
    public function rules(Request $request): array
    {//dd($request->all());
        return [
            'nome' => 'required|max:255',
            'quantidade_vagas' => 'required|numeric|integer',
            'tipo_contrato_id' => 'required|numeric:0|min:1',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O campo Vaga não pode ser vazio!',
            'quantidade_vagas.required' => 'Informe a quantidade de vagas!',
            'quantidade_vagas.numeric' => 'Informe um número válido!',
            'tipo_contrato_id.min' => 'Informe o tipo de Contrato!',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'quantidade_vagas' => 'Quantidade de Vagas',
            'tipo_contrato_id' => 'Tipo de Contrato',
        ];
    }
}
