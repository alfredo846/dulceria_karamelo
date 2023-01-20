<table>
    <thead>
        <tr>
            <strong><th>Id</th></strong>
            <strong><th>Nombre</th></strong>
            <strong><th>Estado</th></strong>
        </tr>
    </thead>
    <tbody>

        @foreach ($roles as $rol)
            <tr>
                <td>{{ $rol->rol_id }}</td>
                <td>{{ $rol->nombre }}</td>
                <td>Activo</td>
            </tr>
        @endforeach


    </tbody>
</table>
