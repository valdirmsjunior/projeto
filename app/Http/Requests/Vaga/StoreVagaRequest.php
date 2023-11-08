<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules(): array
    {
        return [
            'vaga' => 'required|max:255',
            'quantidade_vagas' => 'required',
            'tipo_contrato_id' => 'required'
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
            'vaga.required' => 'O campo Vaga não pode ser vazio!',
            'quantidade_vagas.required' => 'Informe a quantidade de vagas!',
            'tipo_contrato_id.required' => 'Informe o tipo de Contrato!',
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
            'vaga' => 'Vaga',
            'quantidade_vagas' => 'Quantidade de Vagas',
            'tipo_contrato_id' => 'Tipo de Contrato',
        ];
    }
}
