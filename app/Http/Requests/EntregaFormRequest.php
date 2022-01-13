<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntregaFormRequest extends FormRequest
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
            'cliente_id' => 'required',
            'status' => 'required',
            'ponto_coleta' => 'required',
            'ponto_destino' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'Cliente é obrigatório',
            'status.required' => 'Status é obrigatório',
            'ponto_coleta.required' => 'Ponto de Coleta é obrigatório',
            'ponto_destino.required' => 'Ponto de Destino é obrigatório'
        ];
    }
}
