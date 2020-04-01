<div class="col-lg-6">
    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
        <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
        <textarea class="form-control" rows="1" name="nombre" type="textarea" id="nombre" >{{ isset($usuario->nombre) ? $usuario->nombre : ''}}</textarea>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>   

<div class="col-lg-6">
    <div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
        <label for="apellido" class="control-label">{{ 'Apellido' }}</label>
        <textarea class="form-control" rows="1" name="apellido" type="textarea" id="apellido" >{{ isset($usuario->apellido) ? $usuario->apellido : ''}}</textarea>
        {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <textarea class="form-control" rows="1" name="email" type="textarea" id="email" >{{ isset($usuario->email) ? $usuario->email : ''}}</textarea>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
    <label for="edad" class="control-label">{{ 'Edad' }}</label>
    <input class="form-control" name="edad" type="number" id="edad" value="{{ isset($usuario->edad) ? $usuario->edad : ''}}" >
    {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="col-lg-6">
    <div class="form-group {{ $errors->has('sexo') ? 'has-error' : ''}}">
    <label for="sexo" class="control-label">{{ 'Sexo' }}</label>
    <select name="sexo" class="form-control" id="sexo" >
    @foreach (json_decode('{"Masculino":"Masculino","Femenino":"Femenino"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($usuario->sexo) && $usuario->sexo == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('sexo', '<p class="help-block">:message</p>') !!}
</div>

</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
        <label for="telefono" class="control-label">{{ 'Telefono' }}</label>
        <textarea class="form-control" rows="1" name="telefono" type="textarea" id="telefono" >{{ isset($usuario->telefono) ? $usuario->telefono : ''}}</textarea>
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group {{ $errors->has('tipo_identificacion') ? 'has-error' : ''}}">
        <label for="tipo_identificacion" class="control-label">{{ 'Tipo Identificacion' }}</label>
        <select name="tipo_identificacion" class="form-control" id="tipo_identificacion" >
        @foreach (json_decode('{"1":"Cedula","2":"Pasaporte"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($usuario->tipo_identificacion) && $usuario->tipo_identificacion == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
        {!! $errors->first('tipo_identificacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('identificacion') ? 'has-error' : ''}}">
        <label for="identificacion" class="control-label">{{ 'Identificacion' }}</label>
        <textarea class="form-control" rows="1" name="identificacion" type="textarea" id="identificacion" >{{ isset($usuario->identificacion) ? $usuario->identificacion : ''}}</textarea>
        {!! $errors->first('identificacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="control-label">{{ 'Password' }}</label>
        <input class="form-control" name="password" type="password" id="password" value="" >
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group {{ $errors->has('perfil') ? 'has-error' : ''}}">
        <label for="perfil" class="control-label">{{ 'Perfil' }}</label>
        <select name="perfil" class="form-control" id="perfil" >
        @foreach (json_decode('{"1":"Administrador(a)","2":"Transportista","3":"Cajero(a)"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($usuario->perfil) && $usuario->perfil == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
        {!! $errors->first('perfil', '<p class="help-block">:message</p>') !!}
    </div>
    
</div>





<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'editar' ? 'Actualizar' : 'Crear' }}">
</div>
