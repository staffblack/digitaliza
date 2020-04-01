
<div class="form-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
    <label for="titulo" class="control-label">{{ 'Titulo' }}</label>
    <textarea class="form-control" rows="5" name="titulo" type="textarea" id="titulo" >{{ isset($asignacion->titulo) ? $asignacion->titulo : ''}}</textarea>
    {!! $errors->first('titulo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_grupo') ? 'has-error' : ''}}">
    <label for="id_grupo" class="control-label">Numero del Grupo</label>
    <textarea class="form-control" rows="1" name="id_grupo" type="textarea" id="id_grupo" >{{ isset($asignacion->id_grupo) ? $asignacion->id_grupo : ''}}</textarea>
    {!! $errors->first('id_grupo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <textarea class="form-control" rows="5" name="descripcion" type="textarea" id="descripcion" >{{ isset($asignacion->descripcion) ? $asignacion->descripcion : ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('archivo') ? 'has-error' : ''}}">
    <label for="archivo" class="control-label">{{ 'Archivo' }}</label>
    <input class="form-control" name="archivo" type="file" id="archivo" value="{{ isset($asignacion->archivo) ? $asignacion->archivo : ''}}" >
    {!! $errors->first('archivo', '<p class="help-block">:message</p>') !!}
</div>
<input name="id_docente" type="hidden" value="{{session('idusuario')}}">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
