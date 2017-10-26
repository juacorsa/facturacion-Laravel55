@extends('layouts.master')

@section('contenido')
	<h2><i class="fa fa-desktop" aria-hidden="true"></i> Registrar servicio</h2>
	<p>
	    A continuación podrás registrar un nuevo servicio. Recuerda que no está permitido duplicar servicios.	    
	</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::open(['class' => 'form-horizontal', 'route' => 'servicio.store', 'method' => 'POST']) !!}

			@include('servicios.partials.fields')		

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
    @stop

@endsection
