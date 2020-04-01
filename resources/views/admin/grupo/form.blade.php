
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($grupo->nombre) ? $grupo->nombre : ''}}">
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('periodo_electivo') ? 'has-error' : ''}}">
    <label for="periodo_electivo" class="control-label">{{ 'Periodo Electivo' }}</label>
    <select name="periodo_electivo" class="form-control" id="periodo_electivo" >
    @foreach (json_decode('{"1":"2020-01","2":"2020-02"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($grupo->periodo_electivo) && $grupo->periodo_electivo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('periodo_electivo', '<p class="help-block">:message</p>') !!}
</div>

<input type="hidden" name="id_docente" value="<?php echo Auth::id();?>">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
