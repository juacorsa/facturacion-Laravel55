@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-desktop" aria-hidden="true"></i> Gestión de servicios</h2>
	<p>
	    A continuación se muestran todos los servicios registrados en la aplicación, ordenados alfabéticamente.
		<span class="pull-right"><a href="{{ route('servicio.create') }}" class="btn btn-primary">
	    	<i class="fa fa-plus"></i> Registrar un nuevo servicio</a></span>
	</p>
	<br>
	<div class="row">
		<div class="col-md-6">	
			<table id="tabla" class="table table-bordered item">
				<thead>
					<tr>
						<td class="no-sort">Editar</td>
						<td>Servicio</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($servicios as $servicio)
						<tr>
							<td>
								<a class="btn btn-primary" href="{{ route('servicio.edit', $servicio) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>							
							<td>
								{{ $servicio->nombre }}
							</td>							
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	@section('scripts')
	@parent    	
		<script>
		  	$('#tabla').DataTable({	
		  		"pagingType": "simple",
		  		"stateSave" : true,	  			  		
				"language"  : { "url": "{{ asset('/json/spanish.json')}}" },
				"columnDefs": [
				    { "width": "10px",  "targets": 0 }		
				]		 					     
		  	});		  
		 </script>    	
    	
		@if(Session::has('flash_toastr'))	
			<script type="text/javascript">
				toastr.{{ Session::get('flash_tipo') }}		
				('{{ Session::get('flash_mensaje') }}', '{{ Session::get('flash_titulo') }}')
			</script>
		@endif		

		@if(Session::has('flash_swal'))	
			<script type="text/javascript">
				$(function() {			
				    swal({
				        title: "{{ Session::get('flash_titulo') }}",
				        type:  "{{ Session::get('flash_tipo') }}",
				        text:  "{{ Session::get('flash_mensaje') }}"
				    });
				});		
			</script>
		@endif		
    @stop

    {!! Session::forget('flash_titulo') !!}
    {!! Session::forget('flash_tipo') !!}
    {!! Session::forget('flash_mensaje') !!}    
    
@endsection