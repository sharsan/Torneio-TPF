<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vencedor extends Model
{
protected $fillable=['nomeTorneio','escalao','primeiro','segundo','terceiro','terceiro2','juri','descricao','created_at','updated_at'];
}
