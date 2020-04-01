<div class="col-lg-11">
<div class="form-group {{ $errors->has('nombre_empresa') ? 'has-error' : ''}}">
    <label for="nombre_empresa" class="control-label">{{ 'Nombre Empresa' }}</label>
    <textarea class="form-control" rows="1" name="nombre_empresa" type="textarea" id="nombre_empresa" >{{ isset($empresa->nombre_empresa) ? $empresa->nombre_empresa : ''}}</textarea>
    {!! $errors->first('nombre_empresa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_grupo') ? 'has-error' : ''}}">
    <label for="id_grupo" class="control-label">{{ 'Grupo' }}</label>

    <select id="id_grupo" name="id_grupo" class="form-control">
        <option value="0">Ningun Grupo</option>
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
    

    {!! $errors->first('id_grupo', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('logotipo') ? 'has-error' : ''}}">
    <label for="logotipo" class="control-label">{{ 'Logotipo' }}</label>
    <input class="form-control" name="logotipo" type="file" id="logotipo" value="{{ isset($empresa->logotipo) ? $empresa->logotipo : ''}}" >
    {!! $errors->first('logotipo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
</div>