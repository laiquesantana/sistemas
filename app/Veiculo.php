<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Veiculo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ano', 'modelo', 'marca','placa','ativo','valor_aluguel','cor'
    ];

    protected $dates = ['deleted_at'];

    public function Alugel()
    {
        return $this->hasMany('App\Alugel','id','idVeiculo');
    }


     public static function todosVeiculos()
    {

         $flights = DB::table('veiculos')->where('deleted_at', '=', NULl)->get();
			foreach ($flights as $flight) {
			   return[
			      $flight->id => $flight->modelo,

			   ];
			}
        
               
       
    }
}
