<?php

namespace App\Repositories;

use App\Interfaces\FacturacionRepositoryInterface;
use App\Facturacion;
use Config;

class FacturacionRepository implements FacturacionRepositoryInterface
{
	private $meses = array("", "ene", "feb", "mar", "abr", "may", "jun", "jul", "ago", "sep", "oct", "nov", "dic");

	public function registrar(array $datos)
	{
		$facturacion = new Facturacion();
		$facturacion->cliente_id    = $datos['cliente_id'];
		$facturacion->servicio_id   = $datos['servicio_id'];
		$facturacion->empresa_id    = $datos['empresa_id'];		
		$facturacion->dominio 	    = $datos['dominio'];
		$facturacion->base 			= $datos['base'];
		$facturacion->observaciones = $datos['observaciones'];
		$facturacion->ene = $datos['ene'];
		$facturacion->feb = $datos['feb'];
		$facturacion->mar = $datos['mar'];
		$facturacion->abr = $datos['abr'];
		$facturacion->may = $datos['may'];
		$facturacion->jun = $datos['jun'];
		$facturacion->jul = $datos['jul'];
		$facturacion->ago = $datos['ago'];
		$facturacion->sep = $datos['sep'];
		$facturacion->oct = $datos['oct'];
		$facturacion->nov = $datos['nov'];
		$facturacion->dic = $datos['dic'];
		$facturacion->save();
	}

	public function obtener($id)
	{
		return Facturacion::find($id);
	}

	public function obtenerTodos($mes, $servicio, $estado, $empresa)
	{		
		if ($servicio > 0) {
			return Facturacion::with('cliente')
				->with('servicio')
				->with('empresa')
				->where($this->meses[$mes], 1)
				->where('servicio_id', $servicio)
				->where('empresa_id', $empresa)
				->where('estado', $estado)
				->get();
		} else {
			return Facturacion::with('cliente')
				->with('servicio')
				->with('empresa')
				->where($this->meses[$mes], 1)				
				->where('empresa_id', $empresa)
				->where('estado', $estado)
				->get();			
		}
	}

	public function actualizar(array $datos)
	{
		$id = $datos['id'];
		$facturacion = $this->obtener($id);
		$facturacion->cliente_id    = $datos['cliente_id'];
		$facturacion->servicio_id   = $datos['servicio_id'];
		$facturacion->empresa_id    = $datos['empresa_id'];		
		$facturacion->dominio 	    = $datos['dominio'];
		$facturacion->base 			= $datos['base'];
		$facturacion->observaciones = $datos['observaciones'];
		$facturacion->ene = $datos['ene'];
		$facturacion->feb = $datos['feb'];
		$facturacion->mar = $datos['mar'];
		$facturacion->abr = $datos['abr'];
		$facturacion->may = $datos['may'];
		$facturacion->jun = $datos['jun'];
		$facturacion->jul = $datos['jul'];
		$facturacion->ago = $datos['ago'];
		$facturacion->sep = $datos['sep'];
		$facturacion->oct = $datos['oct'];
		$facturacion->nov = $datos['nov'];
		$facturacion->dic = $datos['dic'];
		$facturacion->save();		
	}

	public function obtenerMesesFacturacion($id)
	{
		$mesesFacturacion = '';
		$facturacion = $this->obtener($id);

		if ($facturacion->ene == 1) $mesesFacturacion = $mesesFacturacion . ' Enero';
		if ($facturacion->feb == 1) $mesesFacturacion = $mesesFacturacion . ' Febrero';
		if ($facturacion->mar == 1) $mesesFacturacion = $mesesFacturacion . ' Marzo';
		if ($facturacion->abr == 1) $mesesFacturacion = $mesesFacturacion . ' Abril';
		if ($facturacion->may == 1) $mesesFacturacion = $mesesFacturacion . ' Mayo	';
		if ($facturacion->jun == 1) $mesesFacturacion = $mesesFacturacion . ' Junio';
		if ($facturacion->jul == 1) $mesesFacturacion = $mesesFacturacion . ' Julio';
		if ($facturacion->ago == 1) $mesesFacturacion = $mesesFacturacion . ' Agosto';
		if ($facturacion->sep == 1) $mesesFacturacion = $mesesFacturacion . ' Septiembre';
		if ($facturacion->oct == 1) $mesesFacturacion = $mesesFacturacion . ' Octubre';
		if ($facturacion->oct == 1) $mesesFacturacion = $mesesFacturacion . ' Noviembre';
		if ($facturacion->oct == 1) $mesesFacturacion = $mesesFacturacion . ' Diciembre';		
		return $mesesFacturacion;
	}
}

