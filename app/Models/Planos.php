<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planos extends Model
{
    use HasFactory;

    protected $table = 'planos';

    
    function clientes(){
        return $this->beLongsToMany(Clientes::class,'plano_id','id');
    }
}
