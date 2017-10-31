<?php

namespace App\Repositories;

use App\Interfaces\FacturacionRepositoryInterface;
use App\Facturacion;
use Config;
use Carbon\Carbon;
use App\Mes;

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
		$query = Facturacion::with('cliente')
				->with('servicio')
				->with('empresa')
				->where($this->meses[$mes], 1)				
				->where('empresa_id', $empresa)
				->where('estado', $estado);

		if ($servicio > 0)
			$query = $query->where('servicio_id', $servicio);

		return $query->get();				
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
		$facturacion->motivo_baja   = $datos['motivo_baja'];		
		$facturacion->estado        = $datos['estado'];
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
	
		if ($datos['fecha_baja']) {
			$fecha = explode("/", $datos['fecha_baja']);			
			$fecha_baja = new Carbon();
			$fecha_baja->setDate($fecha[2], $fecha[1], $fecha[0]);
			$facturacion->fecha_baja = $fecha_baja;
		}

		$facturacion->save();		
	}

	public function obtenerMesesFacturacion($id)
	{
		$mesesFacturacion = '';
		$facturacion = $this->obtener($id);

		if ($facturacion->ene == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::ENERO;
		if ($facturacion->feb == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::FEBRERO;
		if ($facturacion->mar == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::MARZO;
		if ($facturacion->abr == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::ABRIL;
		if ($facturacion->may == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::MAYO;
		if ($facturacion->jun == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::JUNIO;
		if ($facturacion->jul == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::JULIO;
		if ($facturacion->ago == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::AGOSTO;
		if ($facturacion->sep == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::SEPTIEMBRE;
		if ($facturacion->oct == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::OCTUBRE;
		if ($facturacion->nov == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::NOVIEMBRE;
		if ($facturacion->dic == 1) $mesesFacturacion = $mesesFacturacion . ' ' . Mes::DICIEMBRE;

		return $mesesFacturacion;
	}
}

