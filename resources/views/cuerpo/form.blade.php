
<div class="form-group {{ $errors->has('cuerpo') ? 'has-error' : ''}}">
    <label for="cuerpo" class="control-label">{{ 'Cuerpo' }}</label>
    <textarea class="form-control" rows="5" name="cuerpo" type="textarea" id="cuerpo" >{{ isset($cuerpo->cuerpo) ? $cuerpo->cuerpo : ''}}</textarea>
    {!! $errors->first('cuerpo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('observacion') ? 'has-error' : ''}}">
    <label for="observacion" class="control-label">{{ 'Observacion' }}</label>
    <textarea class="form-control" rows="5" name="observacion" type="textarea" id="observacion" >{{ isset($cuerpo->observacion) ? $cuerpo->observacion : ''}}</textarea>
    {!! $errors->first('observacion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
