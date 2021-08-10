<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory,SoftDeletes;
  

    protected $table = 'clientes';
    protected $fillable = [
        'nome','email','telefone','estado','cidade','data_nascimento'
    ];


    function planos(){
        return $this->beLongsToMany(Planos::class);
    }
}
