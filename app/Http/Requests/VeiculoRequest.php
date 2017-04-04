<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cliente;

class VeiculoRequest extends FormRequest
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
            'ano' => 'required|numeric',
            'modelo' => 'required',
            'marca' =>  'required',
            'placa' => 'required|string',
            'cor' => 'required|alpha',
            'valor_aluguel' => 'required|numeric',          //
        ];
    }


private function getSegmentFromEnd($position_from_end = 1) {
    $segments =$this->segments();
    return $segments[sizeof($segments) - $position_from_end];
}

     public function messages()
    {
        return [
           'ano.required' => "O campo Ano é obrigatório!",
           'ano.numeric' => "O campo Ano deve ser um número!",
           'modelo.required' => "O campo Modelo é obrigatório!",
           'placa.required' => "O campo Placa é obrigatório!",
           'cor.required' => "O campo Cor é obrigatório!",
           'cor.alpha' => "O campo Cor só deve conter somente letras!",
           'valor_aluguel.required' => "O campo Valor da Diária é obrigatório!",
           'valor_aluguel.numeric' => "O campo Valor da Diária deve ser um número!",
           'marca.numeric' => "O campo Marca deve ser um número!",
        ];

    }
}
