<div class="table-responsive">
    <table class="table" id="usuarios-table">
        <thead>
        <tr>
        <th style="text-align: center">Nombres</th>
        <th style="text-align: center">Apellidos</th>
        <th style="text-align: center">Fecha Nacimiento</th>
        <th style="text-align: center">Email</th>
        <th style="text-align: center">Direccion</th>
            <th colspan="3" style="text-align: center"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuarios)
            <tr>
            <td style="text-align: center">{{ $usuarios->nombres }}</td>
            <td style="text-align: center">{{ $usuarios->apellidos }}</td>
            <td style="text-align: center">{!! \Carbon\Carbon::parse($usuarios->fecha_nacimiento)->format('Y-m-d')!!}</td>
            <td style="text-align: center">{{ $usuarios->email }}</td>
            <td style="text-align: center">{{ $usuarios->direccion }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['usuarios.destroy', $usuarios->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('usuarios.show', [$usuarios->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('usuarios.edit', [$usuarios->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Esta seguro que desea eliminar al usuario?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
