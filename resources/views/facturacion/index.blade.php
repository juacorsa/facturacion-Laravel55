@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-users" aria-hidden="true"></i> Consulta de servicios facturables</h2>	
	<p>A continuación podrás consultar los servicios facturables según los criterios especificados.</p>
	<hr>	
	{!! Form::open(['class' => 'form-inline', 'route' => 'facturacion.list', 'method' => 'POST']) !!}	
		<div class="form-group">							
			<select name="mes" class="form-control">
				<option value="1">Enero</option>
				<option value="2">Febrero</option>
				<option value="3">Marzo</option>
				<option value="4">Abril</option>
				<option value="5">Mayo</option>
				<option value="6">Junio</option>
				<option value="7">Julio</option>
				<option value="8">Agosto</option>
				<option value="9">Septiembre</option>
				<option value="10">Octubre</option>
				<option value="11">Noviembre</option>
				<option value="12">Diciembre</option>				
			</select>								
			<select class="form-control" name="servicio">
				<option value="0">Todos</option>
 				@foreach($servicios as $servicio)
          			<option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
      			@endforeach				
			</select>
			<select class="form-control" name="empresa">
 				@foreach($empresas as $empresa)
          			<option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
      			@endforeach				
			</select>														
			<select name="estado" class="form-control">
				<option value="1">Activo</option>
				<option value="0">Inactivo</option>
			</select>					
			<button class="btn btn-primary" type="submit">
				<i class="fa fa-search-plus"></i> Buscar servicios
			</button>				
		</div>	
	{!! Form::close() !!}

@endsection