<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Descripción</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->producto_id }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>Activo</td>
            </tr>
        @endforeach


    </tbody>
</table>
