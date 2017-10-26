<?php

namespace App\Repositories;

use App\Interfaces\ServicioRepositoryInterface;
use App\Servicio;

class ServicioRepository implements ServicioRepositoryInterface
{
	public function obtenerTodos()
	{
		return Servicio::orderBy('nombre','asc')->get();
	}

	public function registrar(array $datos)
	{
		$servicio = new Servicio();
		$servicio->nombre = $datos['nombre'];
		$servicio->save();
	}

	public function actualizar(array $datos)
	{
		$id = $datos['id'];
		$servicio = $this->obtener($id);
		$servicio->nombre = $datos['nombre'];
		$servicio->save();
	}
	
	public function obtener($id)
	{
		return Servicio::find($id);
	}
}

