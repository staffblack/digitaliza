<div class="col-lg-12">
    <div class="form-group {{ $errors->has('codigo_verificacion') ? 'has-error' : ''}}">
        <label for="codigo_verificacion" class="control-label">Codigo de la Caja</label>
        <textarea class="form-control" rows="1" name="codigo_verificacion" type="textarea" id="codigo_verificacion" >{{ isset($caja->codigo_verificacion) ? $caja->codigo_verificacion : ''}}</textarea>
        {!! $errors->first('codigo_verificacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group {{ $errors->has('empresa') ? 'has-error' : ''}}">
        <label for="empresa" class="control-label">{{ 'Empresa' }}</label>
        <select id="empresa" name="empresa" class="form-control">
            <?php
                include 'conexion3.php';
                $registros = mysqli_query($conexion, "select * FROM empresa") or
    die("Problemas en el select:" . mysqli_error($conexion));

  while ($reg = mysqli_fetch_array($registros)) {
                ?>
            <option value="{{ $reg['id']}}">{{$reg['nombre_empresa'] }}</option>
            <?php 
  }
            ?>
     </select>
        
        {!! $errors->first('empresa', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('sucursal') ? 'has-error' : ''}}">
        <label for="sucursal" class="control-label">{{ 'Sucursal' }}</label>
        <div id="select2lista"></div>
        {!! $errors->first('sucursal', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('departamento') ? 'has-error' : ''}}">
        <label for="departamento" class="control-label">{{ 'Departamento' }}</label>
        <select id="departamento" name="departamento" class="form-control">
            <?php
                include 'conexion3.php';
                $registros = mysqli_query($conexion, "select * FROM departamento") or
    die("Problemas en el select:" . mysqli_error($conexion));

  while ($reg = mysqli_fetch_array($registros)) {
                ?>
            <option value="{{ $reg['id']}}">{{$reg['nombre'] }}</option> 
            <?php 
  }
            ?>
     </select>
        
        {!! $errors->first('departamento', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('sub_departamento') ? 'has-error' : ''}}">
        <label for="sub_departamento" class="control-label">{{ 'Sub Departamento' }}</label>
        <div id="select3lista"></div>
        {!! $errors->first('sub_departamento', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('detalle') ? 'has-error' : ''}}">
        <label for="detalle" class="control-label">{{ 'Detalle' }}</label>
        <textarea class="form-control" rows="1" name="detalle" type="textarea" id="detalle" >{{ isset($caja->detalle) ? $caja->detalle : ''}}</textarea>
        {!! $errors->first('detalle', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('sub_detalle') ? 'has-error' : ''}}">
        <label for="sub_detalle" class="control-label">{{ 'Sub Detalle' }}</label>
        <textarea class="form-control" rows="1" name="sub_detalle" type="textarea" id="sub_detalle" >{{ isset($caja->sub_detalle) ? $caja->sub_detalle : ''}}</textarea>
        {!! $errors->first('sub_detalle', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-4">
    <div class="form-group {{ $errors->has('fecha_desde') ? 'has-error' : ''}}">
        <label for="fecha_desde" class="control-label">{{ 'Fecha Desde' }}</label>
        <input class="form-control" name="fecha_desde" type="date" id="fecha_desde" value="{{ isset($caja->fecha_desde) ? $caja->fecha_desde : ''}}" >
        {!! $errors->first('fecha_desde', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-4">
    <div class="form-group {{ $errors->has('fecha_hasta') ? 'has-error' : ''}}">
        <label for="fecha_hasta" class="control-label">{{ 'Fecha Hasta' }}</label>
        <input class="form-control" name="fecha_hasta" type="date" id="fecha_hasta" value="{{ isset($caja->fecha_hasta) ? $caja->fecha_hasta : ''}}" >
        {!! $errors->first('fecha_hasta', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-4">
    <div class="form-group {{ $errors->has('fecha_vencimiento') ? 'has-error' : ''}}">
        <label for="fecha_vencimiento" class="control-label">{{ 'Fecha Vencimiento' }}</label>
        <input class="form-control" name="fecha_vencimiento" type="date" id="fecha_vencimiento" value="{{ isset($caja->fecha_vencimiento) ? $caja->fecha_vencimiento : ''}}" >
        {!! $errors->first('fecha_vencimiento', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('secuencia_desde') ? 'has-error' : ''}}">
        <label for="secuencia_desde" class="control-label">{{ 'Secuencia Desde' }}</label>
        <input class="form-control" name="secuencia_desde" type="number" id="secuencia_desde" value="{{ isset($caja->secuencia_desde) ? $caja->secuencia_desde : ''}}" >
        {!! $errors->first('secuencia_desde', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('secuencia_hasta') ? 'has-error' : ''}}">
        <label for="secuencia_hasta" class="control-label">{{ 'Secuencia Hasta' }}</label>
        <input class="form-control" name="secuencia_hasta" type="number" id="secuencia_hasta" value="{{ isset($caja->secuencia_hasta) ? $caja->secuencia_hasta : ''}}" >
        {!! $errors->first('secuencia_hasta', '<p class="help-block">:message</p>') !!}
    </div>
    
    <div class="col-lg-12">
        <div class="form-group {{ $errors->has('etiqueta') ? 'has-error' : ''}}">
            <label for="etiqueta" class="control-label">{{ 'Excel' }}</label>
            <input class="form-control" name="etiqueta" type="file" id="logotipo" value="{{ isset($caja->etiqueta) ? $caja->etiqueta : ''}}" >
            {!! $errors->first('etiqueta', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    

</div>
        <input name="estado" type="hidden" id="estado" value="1" >
        <input name="ubicacion" type="hidden" id="ubicacion" value="0" >
        <input name="rack" type="hidden" id="rack" value="0" >
        <input name="cuerpo" type="hidden" id="cuerpo" value="0" >
        
        

        
    
</div>







<div class="col-lg-12">
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'editar' ? 'Actualizar' : 'Crear' }}">
    </div>
    
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('#empresa').val(1);
		recargarLista();

		$('#empresa').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"../selectsucursal.php",
			data:"continente=" + $('#empresa').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('#departamento').val(1);
		recargarLista2();

		$('#departamento').change(function(){
			recargarLista2();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista2(){
		$.ajax({
			type:"POST",
			url:"../selectsubdepartamento.php",
			data:"continente=" + $('#departamento').val(),
			success:function(r){
				$('#select3lista').html(r);
			}
		});
	}
</script>
