<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model;

class Torneio extends Model
{
    protected $fillable=[ 'nome', 'datai', 'datat', 'descricao','created_at','updated_at'];
}       