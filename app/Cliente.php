<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{

	 use SoftDeletes;
    
     protected $fillable = [
        'cpf', 'nome', 'endereco','telefone','email',''
    ];


        protected $dates = ['deleted_at'];
}
