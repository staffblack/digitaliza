<div class="form-group {{ $errors->has('ubicacion') ? 'has-error' : ''}}">
    <label for="ubicacion" class="control-label">{{ 'Ubicacion' }}</label>
    <textarea class="form-control" rows="5" name="ubicacion" type="textarea" id="ubicacion" >{{ isset($ubicacion->ubicacion) ? $ubicacion->ubicacion : ''}}</textarea>
    {!! $errors->first('ubicacion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('observacion') ? 'has-error' : ''}}">
    <label for="observacion" class="control-label">{{ 'Observacion' }}</label>
    <textarea class="form-control" rows="5" name="observacion" type="textarea" id="observacion" >{{ isset($ubicacion->observacion) ? $ubicacion->observacion : ''}}</textarea>
    {!! $errors->first('observacion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
