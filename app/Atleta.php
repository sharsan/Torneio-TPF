<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
      protected $fillable =['nome','apelido','cinturao','clube_id','categoria_id','escalao_id','peso','sexo','idade','telefone','email','treinador_id','descricao'];
}
