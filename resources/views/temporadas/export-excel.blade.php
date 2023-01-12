<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($temporadas as $temporada)
            <tr>
                <td>{{ $temporada->temporada_id}}</td>
                <td>{{ $temporada->nombre }}</td>
                <td>Activo</td>
            </tr>
        @endforeach

    </tbody>
</table>
