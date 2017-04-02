<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Cliente extends Model
{

	 use SoftDeletes;
    
     protected $fillable = [
        'cpf', 'nome', 'endereco','telefone','email',''
    ];


        protected $dates = ['deleted_at'];


    public function Alugel()
    {
        return $this->hasMany('App\Alugel','id','idCliente');
    }


     public static function todosClientes()
    {

         $Clientes =DB::table('clientes')->pluck('nome','id');
       
			foreach ($Clientes as $cliente) {
			   return[
			      $cliente

			   ];
			}
        
               
       
    }
}
