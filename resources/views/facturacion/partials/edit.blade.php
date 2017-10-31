
<div class="form-group"> 	  
	<div class="col-sm-offset-2 col-sm-8 error">			
		@if($errors->any())
			Atención, se han detectado los siguientes errores:			
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		@endif
	</div>
</div>

{!! Form::hidden('id', null) !!}

<div class="form-group">   		
	<label class="col-sm-2 control-label">Cliente</label>
	<div class="col-sm-8">
		 {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Servicio</label>
	<div class="col-sm-8">
		 {!! Form::select('servicio_id', $servicios, null, ['class' => 'form-control']) !!}
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Empresa</label>
	<div class="col-sm-8">
		 {!! Form::select('empresa_id', $empresas, null, ['class' => 'form-control']) !!}		
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Meses de facturación</label>	
	<div class="col-sm-2">		
		<span class="mes">Enero</span>
		{!! Form::select('ene', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Febrero</span>
		{!! Form::select('feb', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Marzo</span>
		{!! Form::select('mar', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>

	<div class="col-sm-2">		
		<span class="mes">Abril</span>
		{!! Form::select('abr', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>

</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label"></label>	
	<div class="col-sm-2">		
		<span class="mes">Mayo</span>
		{!! Form::select('may', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Junio</span>
		{!! Form::select('jun', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Julio</span>
		{!! Form::select('jul', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Agosto</span>
		{!! Form::select('ago', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>

</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label"></label>	
	<div class="col-sm-2">		
		<span class="mes">Septiembre</span>
		{!! Form::select('sep', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Octubre</span>
		{!! Form::select('oct', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Noviembre</span>
		{!! Form::select('nov', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Diciembre</span>
		{!! Form::select('dic', ['0' => 'No', '1' => 'Sí'], null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Dominio</label>
	<div class="col-sm-8">
		{!! Form::text('dominio', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}  	
		<span class="info">Dominio asociado al servicio, si procede</span>
	</div>
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Coste</label>
	<div class="col-sm-3">
		{!! Form::text('base', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}  			
		<span class="info">Base imponible</span>		
	</div>
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Estado</label>
	<div class="col-sm-3">
		{!! Form::select('estado', ['0' => 'Inactivo', '1' => 'Activo'], null, ['class' => 'form-control']) !!}				
	</div>
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Fecha Baja</label>
	<div class="col-sm-3">
		{!! Form::text('fecha_baja', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}  	
		<span class="info">Formato dd/mm/yyyy</span>						
	</div>
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Motivo Baja</label>
	<div class="col-sm-8">
		{!! Form::textarea('motivo_baja', null, ['rows' => '4', 'class' => 'form-control', 'autocomplete' => 'off']) !!}  	
	</div>
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Observaciones</label>
	<div class="col-sm-8">
		{!! Form::textarea('observaciones', null, ['rows' => '4', 'class' => 'form-control', 'autocomplete' => 'off']) !!}  	
	</div>
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
