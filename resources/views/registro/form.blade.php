<input type="hidden" name="id_grupo" value="0">
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($registro->email) ? $registro->email : ''}}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control" name="password" type="password" id="password" >
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <textarea class="form-control" rows="1" name="name" type="textarea" id="name" >{{ isset($registro->name) ? $registro->name : ''}}</textarea>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
    <label for="apellido" class="control-label">{{ 'Apellido' }}</label>
    <textarea class="form-control" rows="1" name="apellido" type="textarea" id="apellido" >{{ isset($registro->apellido) ? $registro->apellido : ''}}</textarea>
    {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('identificacion') ? 'has-error' : ''}}">
    <label for="identificacion" class="control-label">{{ 'Identificacion' }}</label>
    <input class="form-control" name="identificacion" type="number" id="identificacion" value="{{ isset($registro->identificacion) ? $registro->identificacion : ''}}">
    {!! $errors->first('identificacion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
    <label for="edad" class="control-label">{{ 'edad' }}</label>
    <input class="form-control" name="edad" type="number" id="edad" value="{{ isset($registro->edad) ? $registro->edad : ''}}">
    {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    <label for="telefono" class="control-label">{{ 'telefono' }}</label>
    <input class="form-control" name="telefono" type="number" id="telefono" value="{{ isset($registro->telefono) ? $registro->telefono : ''}}">
    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('sexo') ? 'has-error' : ''}}">
    <label for="sexo" class="control-label">{{ 'sexo' }}</label><br>
    <select name="sexo" class="form-control">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>    
    {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
</div>


<input type="hidden" name="roles" value="1">
<input type="hidden" name="perfil" value="1">
<input type="hidden" name="id_docente" value="0">
<input type="hidden" name="representante" value="0">
<input type="hidden" name="telefono_represen" value="0">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Registrar' }}">
</div>
