@extends('layouts.master')

@section('contenido')
	<h2><i class="fa fa-desktop" aria-hidden="true"></i> Registrar nuevo servicio facturable</h2>
	<p>
	    A continuación podrás registrar un nuevo servicio facturable.</p>
	<hr/>
	<div class="col-sm-7">
		{!! Form::open(['class' => 'form-horizontal', 'route' => 'facturacion.store', 'method' => 'POST']) !!}

			@include('facturacion.partials.fields')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-plus"></i> Registrar servicio</button>				
	            </div>
        	</div>

		{!! Form:: close() !!}
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

@endsection
