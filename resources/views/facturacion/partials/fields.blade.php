
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
		<select class="form-control" name="cliente_id" autofocus="">
 			@foreach($clientes as $cliente)
          		<option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
      		@endforeach				
		</select>
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Servicio</label>
	<div class="col-sm-8">
		<select class="form-control" name="servicio_id">
 			@foreach($servicios as $servicio)
          		<option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
      		@endforeach				
		</select>
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Empresa</label>
	<div class="col-sm-8">
		<select class="form-control" name="empresa_id">
 			@foreach($empresas as $empresa)
          		<option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
      		@endforeach				
		</select>
	</div>	
</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label">Meses de facturación</label>	
	<div class="col-sm-2">		
		<span class="mes">Enero</span>
		{!! Form::select('ene', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Febrero</span>
		{!! Form::select('feb', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Marzo</span>
		{!! Form::select('mar', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>

	<div class="col-sm-2">		
		<span class="mes">Abril</span>
		{!! Form::select('abr', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>

</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label"></label>	
	<div class="col-sm-2">		
		<span class="mes">Mayo</span>
		{!! Form::select('may', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Junio</span>
		{!! Form::select('jun', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Julio</span>
		{!! Form::select('jul', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Agosto</span>
		{!! Form::select('ago', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>

</div>

<div class="form-group">   		
	<label class="col-sm-2 control-label"></label>	
	<div class="col-sm-2">		
		<span class="mes">Septiembre</span>
		{!! Form::select('sep', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Octubre</span>
		{!! Form::select('oct', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Noviembre</span>
		{!! Form::select('nov', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
	</div>
	<div class="col-sm-2">		
		<span class="mes">Diciembre</span>
		{!! Form::select('dic', ['0' => 'No', '1' => 'Sí'], '0', ['class' => 'form-control']) !!}
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
	<label class="col-sm-2 control-label">Observaciones</label>
	<div class="col-sm-8">
		{!! Form::textarea('observaciones', null, ['rows' => '4', 'class' => 'form-control', 'autocomplete' => 'off']) !!}  	
	</div>
</div>

