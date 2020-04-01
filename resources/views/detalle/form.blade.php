<div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
    <label for="id" class="control-label">{{ 'Id' }}</label>
    <input class="form-control" name="id" type="number" id="id" value="{{ isset($detalle->id) ? $detalle->id : ''}}" >
    {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('n_pregunta') ? 'has-error' : ''}}">
    <label for="n_pregunta" class="control-label">{{ 'N Pregunta' }}</label>
    <input class="form-control" name="n_pregunta" type="number" id="n_pregunta" value="{{ isset($detalle->n_pregunta) ? $detalle->n_pregunta : ''}}" >
    {!! $errors->first('n_pregunta', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pregunta') ? 'has-error' : ''}}">
    <label for="pregunta" class="control-label">{{ 'Pregunta' }}</label>
    <textarea class="form-control" rows="5" name="pregunta" type="textarea" id="pregunta" >{{ isset($detalle->pregunta) ? $detalle->pregunta : ''}}</textarea>
    {!! $errors->first('pregunta', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_evaluacion') ? 'has-error' : ''}}">
    <label for="id_evaluacion" class="control-label">{{ 'Id Evaluacion' }}</label>
    <textarea class="form-control" rows="5" name="id_evaluacion" type="textarea" id="id_evaluacion" >{{ isset($detalle->id_evaluacion) ? $detalle->id_evaluacion : ''}}</textarea>
    {!! $errors->first('id_evaluacion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_docente') ? 'has-error' : ''}}">
    <label for="id_docente" class="control-label">{{ 'Id Docente' }}</label>
    <textarea class="form-control" rows="5" name="id_docente" type="textarea" id="id_docente" >{{ isset($detalle->id_docente) ? $detalle->id_docente : ''}}</textarea>
    {!! $errors->first('id_docente', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
