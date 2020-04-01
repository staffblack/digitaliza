<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <textarea class="form-control" rows="2" name="nombre" type="textarea" id="nombre" >{{ isset($subdepartamento->nombre) ? $subdepartamento->nombre : ''}}</textarea>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <textarea class="form-control" rows="2" name="descripcion" type="textarea" id="descripcion" >{{ isset($subdepartamento->descripcion) ? $subdepartamento->descripcion : ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('id_departamento') ? 'has-error' : ''}}">
    <label for="id_departamento" class="control-label">{{ 'Departamento' }}</label>
    <select id="id_departamento" name="id_departamento" class="form-control">
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
    
    {!! $errors->first('id_departamento', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
