<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cliente;

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
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email'
            'cpf' =>  'required|min:11|unique:users,cpf'
            'endereco' => 'required',
            'telefone' => 'required',
            'password' => 'required|confirmed|min:6',
            //
        ];
    }


private function getSegmentFromEnd($position_from_end = 1) {
    $segments =$this->segments();
    return $segments[sizeof($segments) - $position_from_end];
}

     public function messages()
    {
        return [
           'name.required' => "O campo Nome é obrigatório!",
           'email.unique' => "O Email já está cadastrado!",
           'cpf.min' => "O campo Cpf deve ter no mínimo 11 caracters!",
           'cpf.required' => "O campo Cpf é obrigatório!",
           'cpf.unique' => "O CPF já está Cadastrado!",
           'email.required' => "O campo Email é obrigatorio!",
           'email.email' => "O Email deve ser um endereço de e-mail válido!",
           'endereco.required' => "O campo Endereco é obrigatório!",
           'telefone.required'=> 'O campo Telefone é obrigatório!!',
           'password.required'=> 'O campo Senha é obrigatório!!',
           'password.confirmed'=>'A Confirmação de Senha nao confere!',
           'password.min' => 'A senha deve ter no mínimo 6 caracters'
        ];

    }
}
