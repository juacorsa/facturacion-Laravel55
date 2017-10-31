@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-bell" aria-hidden="true"></i> Consulta de servicios facturables</h2>	
	<p>A continuación podrás consultar los servicios facturables según los criterios especificados.</p>
	<hr>	
	{!! Form::open(['class' => 'form-inline', 'route' => 'facturacion.list', 'method' => 'POST']) !!}	
		<div class="form-group">							
			<select name="mes" class="form-control">
				<option value="1" {{ $mes == 1 ? 'selected' : '' }}>Enero</option>
				<option value="2" {{ $mes == 2 ? 'selected' : '' }}>Febrero</option>
				<option value="3" {{ $mes == 3 ? 'selected' : '' }}>Marzo</option>
				<option value="4" {{ $mes == 4 ? 'selected' : '' }}>Abril</option>
				<option value="5" {{ $mes == 5 ? 'selected' : '' }}>Mayo</option>
				<option value="6" {{ $mes == 6 ? 'selected' : '' }}>Junio</option>
				<option value="7" {{ $mes == 7 ? 'selected' : '' }}>Julio</option>
				<option value="8" {{ $mes == 8 ? 'selected' : '' }}>Agosto</option>
				<option value="9" {{ $mes == 9 ? 'selected' : '' }}>Septiembre</option>
				<option value="10" {{ $mes == 10 ? 'selected' : '' }}>Octubre</option>
				<option value="11" {{ $mes == 11 ? 'selected' : '' }}>Noviembre</option>
				<option value="12" {{ $mes == 12 ? 'selected' : '' }}>Diciembre</option>				
			</select>								
			<select class="form-control" name="servicio">
				<option value="0">Todos</option>
 				@foreach($servicios as $servicio)
          			<option value="{{$servicio->id}}"
          				{{ $servicio_anterior == $servicio->id ? 'selected' : '' }}>
          				{{ $servicio->nombre }}</option>
      			@endforeach				
			</select>											
			<select class="form-control" name="empresa">
 				@foreach($empresas as $empresa)
          			<option value="{{$empresa->id}}" 
          				{{ $empresa_anterior == $empresa->id ? 'selected' : '' }}>
          				{{ $empresa->nombre }}</option>
      			@endforeach				
			</select>														
			<select name="estado" class="form-control">
				<option value="1" {{ $estado == 1 ? 'selected' : '' }}>Activo</option>
				<option value="0" {{ $estado == 0 ? 'selected' : '' }}>Inactivo</option>
			</select>	
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-search-plus"></i> Buscar servicios
			</button>				
		</div>	
	{!! Form::close() !!}
	<br>
	@if (count($serviciosFacturables) > 0)
	<div class="row">
		<div class="col-md-12">	
			<table id="tabla" class="table table-bordered item">
				<thead>
					<tr>
						<td class="no-sort">Editar</td>
						<td>Cliente</td>
						<td class="no-sort">Servicio</td>
						<td class="no-sort">Facturado por</td>
						<td>Coste</td>
						<td class="no-sort">Estado</td>
						<td class="no-sort">Dominio</td>
						<td class="no-sort">Observaciones</td>
						<td class="no-sort">Detalle</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($serviciosFacturables as $servicio)
						<tr>
							<td>
								<a class="btn btn-primary" href="{{ route('facturacion.edit', $servicio) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>							
							<td>{{ $servicio->cliente->nombre }}</td>	
							<td>{{ $servicio->servicio->nombre }}</td>	
							<td class="text-center">{{ $servicio->empresa->nombre }}</td>	
							<td>{{ $servicio->base }}</td>								
							<td class="text-center">
								@activo($servicio)
									<span class="label label-success">Activo</span>
								@endactivo
								@inactivo($servicio)
									<span class="label label-danger">Inactivo</span>
								@endinactivo
							</td>
							<td>{{ $servicio->dominio }}</td>
							<td>{{ $servicio->observaciones }}</td>
							<td>
								<a class="btn btn-primary" href="{{ route('facturacion.show', $servicio) }}">
									<i class="fa fa-calendar"></i>									
								</a>						
							</td>														
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>	
	</div>
	<a href="{{ route('facturacion.exportar')}}" class="btn btn-primary">
		<i class="fa fa-table"></i> Exportar a Excel</a>
	@else
		Oops!!. No se han encontrado servicios facturables según los criterios seleccionados.
	@endif

	@section('scripts')
	@parent    	
		<script>
		  	$('#tabla').DataTable({	
		  		"pagingType": "simple",
		  		"stateSave" : true,	  			  		
				"language"  : { "url": "{{ asset('/json/spanish.json')}}" },
				"columnDefs": [
				    { "width": "10px",  "targets": 0 },
				    { "width": "60px",  "targets": 2 },
				    { "width": "100px",  "targets": 3 },
				    { "width": "30px",  "targets": 4 },
				    { "width": "20px",  "targets": 5 },
				    { "width": "10px",  "targets": 8 }
				]		 					     
		  	});		  
		 </script>    	    	
    @stop

@endsection