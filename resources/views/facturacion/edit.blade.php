@extends('layouts.master')

@section('contenido')

	<h2><i class="fa fa-users" aria-hidden="true"></i> Actualizar servicio facturable</h2>	
	<p>A continuación podrás actualizar el servicio facturable seleccionado.</p>
	<hr/>
	<div class="col-sm-7">
		{!! Form::model($facturacion, ['class' => 'form-horizontal', 'route' => 'facturacion.update', 'method' => 'PUT']) !!}

			@include('facturacion.partials.edit')		

			<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-8">				
					<button class="btn btn-primary" type="submit">
						<i class="fa fa-check"></i> Guardar cambios</button>	
					<a class="btn btn-danger" href="javascript:history.back()">
						<i class="fa fa-close"></i> Cancelar</a>			
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
