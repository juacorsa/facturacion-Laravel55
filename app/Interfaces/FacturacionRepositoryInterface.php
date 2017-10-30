<?php

namespace App\Interfaces;

use App\Facturacion;

interface FacturacionRepositoryInterface 
{	
	public function registrar(array $datos);

	public function actualizar(array $datos);

	public function obtener($id);

	public function obtenerTodos($mes, $servivio, $estado, $empresa);

	public function obtenerMesesFacturacion($id);
}

