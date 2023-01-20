<table>
    <thead>
        <tr>
            <th>Id</th>
            <th># Sucursal</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Localidad</th>
            <th>Teléfono</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($sucursales as $sucursal)
            <tr>
                <td>{{ $sucursal->sucursal_id }}</td>
                <td>{{ $sucursal->numero_sucursal }}</td>
                <td>{{ $sucursal->nombre }}</td>
                @foreach ($estados as $estado)
                    @if ($estado->estado_id == $sucursal->estado_id)
                        <td>{{ $estado->nombre }}</td>
                    @endif
                @endforeach
                @foreach ($municipios as $municipio)
                    @if ($municipio->municipio_id == $sucursal->municipio_id)
                        <td>{{ $municipio->nombre }}</td>
                    @endif
                @endforeach
                @foreach ($localidades as $localidad)
                    @if ($localidad->localidad_id == $sucursal->localidad_id)
                        <td>{{ $localidad->nombre }}</td>
                    @endif
                @endforeach
                <td>{{ $sucursal->telefono }}</td>
                <td>{{ $sucursal->email }}</td>
                <td>Activo</td>
            </tr>
        @endforeach


    </tbody>
</table>
