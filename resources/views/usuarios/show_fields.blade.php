<!-- Nombres Field -->
<div class="col-sm-12">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{{ $usuarios->nombres }}</p>
</div>

<!-- Apellidos Field -->
<div class="col-sm-12">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    <p>{{ $usuarios->apellidos }}</p>
</div>

<!-- Fecha Nacimiento Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
    <p>{{ $usuarios->fecha_nacimiento }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $usuarios->email }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $usuarios->password }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $usuarios->direccion }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $usuarios->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $usuarios->updated_at }}</p>
</div>

