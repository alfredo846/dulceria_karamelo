<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($marcas as $marca)
            <tr>
                <td>{{ $marca->marca_id }}</td>
                <td>{{ $marca->nombre }}</td>
                <td>Activo</td>
            </tr>
        @endforeach


    </tbody>
</table>
