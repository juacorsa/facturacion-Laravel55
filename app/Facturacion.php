<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
	protected $table   = 'facturacion';
    public $timestamps = false;

    public function cliente()
    {
		return $this->belongsTo('App\Cliente');
    }

    public function empresa()
    {
		return $this->belongsTo('App\Empresa');
    }

    public function servicio()
    {
		return $this->belongsTo('App\Servicio');
    }
}
