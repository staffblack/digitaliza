<div class="form-group {{ $errors->has('rack') ? 'has-error' : ''}}">
    <label for="rack" class="control-label">{{ 'Rack' }}</label>
    <textarea class="form-control" rows="5" name="rack" type="textarea" id="rack" >{{ isset($rack->rack) ? $rack->rack : ''}}</textarea>
    {!! $errors->first('rack', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('observacion') ? 'has-error' : ''}}">
    <label for="observacion" class="control-label">{{ 'Observacion' }}</label>
    <textarea class="form-control" rows="5" name="observacion" type="textarea" id="observacion" >{{ isset($rack->observacion) ? $rack->observacion : ''}}</textarea>
    {!! $errors->first('observacion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
