<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treinador extends Model
{
     protected $fillable =['nome','apelido','clube_id','sexo','idade','telefone','email','descricao','created_at','updated_at'];
} 
