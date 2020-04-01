

<div class="form-group {{ $errors->has('id_grupo') ? 'has-error' : ''}}">
    <label for="id_grupo" class="control-label">{{ 'Numero del Grupo a asignale evaluación' }}</label>
    <textarea class="form-control" rows="1" name="id_grupo" type="textarea" id="id_grupo" >{{ isset($evaluacion->id_grupo) ? $evaluacion->id_grupo : ''}}</textarea>
    {!! $errors->first('id_grupo', '<p class="help-block">:message</p>') !!}
</div>

<input name="id_asignacion" type="hidden" value="1">
<input name="n_preguntas" type="hidden" value="5">
<input name="id_docente" type="hidden" value="{{session('idusuario')}}">



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
