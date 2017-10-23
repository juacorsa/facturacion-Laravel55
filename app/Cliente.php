<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
     protected $table    = 'clientes';
     public $timestamps  = false;
     protected $fillable = ['nombre', 'empresa_id'];    
}