<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'inicio' => 'required|unique:consultas|date',
            'termino' => 'required|unique:consultas|date|after:inicio',
            'custo' => 'required|numeric',
            'nome_tratamento' => 'required',
            'medicacoes_tratamento' => 'required',
            'repouso_tratamento' => 'required',
            'animal_id' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'inicio' => 'inicio da consulta',
            'termino' => 'fim da consulta',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'unique' => 'Você já possui uma consulta agendada neste horário',
            'date' => 'A data de :attribute deve ser uma data válida.'
        ];
    }
}
