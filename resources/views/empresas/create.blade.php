@extends('layouts.master')

@section('contenido')
	<h2><i class="fa fa-user" aria-hidden="true"></i> Registrar empresa</h2>
	<p>
	    A continuación podrás registrar una nueva empresa. Recuerda que no está permitido duplicar empresas.   
	</p>
	<hr/>
	<div class="col-sm-6">
		{!! Form::open(['class' => 'form-horizontal', 'route' => 'empresa.store', 'method' => 'POST']) !!}

			@include('empresas.partials.fields')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-plus"></i> Registrar empresa</button>				
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
