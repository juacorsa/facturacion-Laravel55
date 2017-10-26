<?php

namespace App\Interfaces;

use App\Servicio;

interface ServicioRepositoryInterface 
{
	public function obtenerTodos();

	public function registrar(array $datos);

	public function actualizar(array $datos);
	
	public function obtener($id);
}

