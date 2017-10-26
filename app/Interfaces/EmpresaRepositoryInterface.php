<?php

namespace App\Interfaces;

use App\Empresa;

interface EmpresaRepositoryInterface 
{
	public function obtenerTodos();

	public function registrar(array $datos);

	public function actualizar(array $datos);
	
	public function obtener($id);
}

