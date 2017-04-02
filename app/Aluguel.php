<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluguel extends Model
{
    
    protected $table = 'alugueis';

    protected $fillable = [
    	'dataLocacao',
      	'dataDevolucao',
        'pagamento',
      	'idVeiculo',
        'idCliente'

     ];

    public function Cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function Veiculo()
    {
        return $this->belongsTo('App\Veiculo');
    }
}
