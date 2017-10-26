<?php

namespace App\Repositories;

use App\Interfaces\EmpresaRepositoryInterface;
use App\Empresa;

class EmpresaRepository implements EmpresaRepositoryInterface
{
	public function obtenerTodos()
	{
		return Empresa::orderBy('nombre','asc')->get();
	}

	public function registrar(array $datos)
	{
		$empresa = new Empresa();
		$empresa->nombre = $datos['nombre'];
		$empresa->save();
	}

	public function actualizar(array $datos)
	{
		$id = $datos['id'];
		$empresa = $this->obtener($id);
		$empresa->nombre = $datos['nombre'];
		$empresa->save();
	}
	
	public function obtener($id)
	{
		return Empresa::find($id);
	}
}

