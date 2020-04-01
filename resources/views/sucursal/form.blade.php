
<div class="form-group {{ $errors->has('id_empresa') ? 'has-error' : ''}}">
    <label for="id_empresa" class="control-label">{{ 'Empresa' }}</label>

    <select id="id_empresa" name="id_empresa" class="form-control">
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
    

    {!! $errors->first('id_empresa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre_sucursal') ? 'has-error' : ''}}">
    <label for="nombre_sucursal" class="control-label">{{ 'Nombre Sucursal' }}</label>
    <textarea class="form-control" rows="2" name="nombre_sucursal" type="textarea" id="nombre_sucursal" >{{ isset($sucursal->nombre_sucursal) ? $sucursal->nombre_sucursal : ''}}</textarea>
    {!! $errors->first('nombre_sucursal', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
