<table>
    <thead>
        <tr style="background-color:red">
            <th>Id</th>
            <th>Nombre</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->categoria_id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>Activo</td>
            </tr>
        @endforeach


    </tbody>
</table>
