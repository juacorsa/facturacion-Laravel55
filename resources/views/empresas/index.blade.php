@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-user" aria-hidden="true"></i> Gestión de empresas</h2>
	<p>
	    A continuación se muestran todas las empresas registradas en la aplicación, ordenadas alfabéticamente.
		<span class="pull-right"><a href="{{ route('empresa.create') }}" class="btn btn-primary">
	    	<i class="fa fa-plus"></i> Registrar una nueva empresa</a></span>
	</p>
	<br>
	<div class="row">
		<div class="col-md-6">	
			<table id="tabla" class="table table-bordered item">
				<thead>
					<tr>
						<td class="no-sort">Editar</td>
						<td>Empresa</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($empresas as $empresa)
						<tr>
							<td>
								<a class="btn btn-primary" href="{{ route('empresa.edit', $empresa) }}">
									<i class="fa fa-bars"></i>									
								</a>						
							</td>							
							<td>
								{{ $empresa->nombre }}
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
				        type: "{{ Session::get('flash_tipo') }}",
				        text: "{{ Session::get('flash_mensaje') }}"
				    });
				});		
			</script>
		@endif		
    @stop

    {!! Session::forget('flash_titulo') !!}
    {!! Session::forget('flash_tipo') !!}
    {!! Session::forget('flash_mensaje') !!}    

@endsection