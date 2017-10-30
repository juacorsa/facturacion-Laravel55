@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-bell" aria-hidden="true"></i> Detalle servicio facturable</h2>	
	<p>A continuación podrás ver el detalle del servicio facturable seleccionado.</p>
	<hr/>
	<div class="col-sm-6">
		<table id="tabla" class="table table-bordered">
			<tr>
				<td class="detalle">Cliente</td>
				<td>{{ $facturacion->cliente->nombre }}</td>
			</tr>
			<tr>
				<td class="detalle">Servicio</td>
				<td>{{ $facturacion->servicio->nombre }}</td>
			</tr>
			<tr>
				<td class="detalle">Facturado por</td>
				<td>{{ $facturacion->empresa->nombre }}</td>
			</tr>
			<tr>
				<td class="detalle">Coste</td>
				<td>{{ $facturacion->base }} €</td>
			</tr>
			<tr>
				<td class="detalle">Estado</td>
				<td>
					@if($facturacion->estado == 1)
						<span class="label label-success">Activo</span>
					@else
						<span class="label label-danger">Inactivo</span>				
					@endif					
				</td>					
			</tr>	
			<tr>
				<td class="detalle">Dominio</td>
				<td>{{ $facturacion->dominio }}</td>
			</tr>					
			<tr>
				<td class="detalle">Fecha baja</td>
				<td>{{ $facturacion->fecha_baja }}</td>
			</tr>
			<tr>
				<td class="detalle">Motivo baja</td>
				<td>{{ $facturacion->motivo_baja }}</td>
			</tr>
			<tr>
				<td class="detalle">Observaciones</td>
				<td>{{ $facturacion->observaciones }}</td>
			</tr>
			<tr>
				<td class="detalle">Meses de facturación</td>
				<td>{{ $mesesFacturacion }}</td>
			</tr>					
		</table>
		<a class="btn btn-danger" href="javascript:history.back()">
			<i class="fa fa-close"></i> Volver</a>			
	</div>

	@section('scripts')
	@parent
	<script type="text/javascript">
			$(document).keydown(function(e) {				
				if (e.keyCode == 27) { 
				   window.history.back();
				   return false;
				}
			});    				
		</script>
    @stop

@endsection
