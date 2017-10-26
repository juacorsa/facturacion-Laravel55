<?php

namespace App\Repositories;

use App\Interfaces\ClienteRepositoryInterface;
use App\Cliente;

class ClienteRepository implements ClienteRepositoryInterface
{
	public function obtenerTodos()
	{
		return Cliente::orderBy('nombre','asc')->get();
	}

	public function registrar(array $datos)
	{
		$cliente = new Cliente();
		$cliente->nombre = $datos['nombre'];
		$cliente->save();
	}

	public function actualizar(array $datos)
	{
		$id = $datos['id'];
		$cliente = $this->obtener($id);
		$cliente->nombre = $datos['nombre'];
		$cliente->save();
	}
	
	public function obtener($id)
	{
		return Cliente::find($id);
	}
}

