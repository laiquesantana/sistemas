<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cliente;

class AluguelRequest extends FormRequest
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
            'idVeiculo' => 'required',
            'idCliente' => 'required',
            'dataLocacao' =>  'required',
            'dataDevolucao' => 'required|after:dataLocacao',
            'pagamento' => 'required',
            'valor_aluguel' => 'required',    
        ];
    }


private function getSegmentFromEnd($position_from_end = 1) {
    $segments =$this->segments();
    return $segments[sizeof($segments) - $position_from_end];
}

     public function messages()
    {
        return [
           'idVeiculo.required' => "Escolha algum modelo de Veiculo",
           'idCliente.required' => "Selecione algum Cliente",
           'dataLocacao.required' => "O campo Ano Data de Locação obrigatório!",
           'pagamento.required' => "O campo pagamento é obrigatório!",
           'valor_aluguel.required' => "O campo Valor Total é obrigatório!",
           'dataDevolucao.required' => "O campo Data de Devolução é obrigatório!",
           'dataDevolucao.after' => "O campo Data de Devolução deve ser posterior a Data de Locação!",
           
        ];

    }
}
