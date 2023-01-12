<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($empaques as $empaque)
            <tr>
                <td>{{ $empaque->empaque_id }}</td>
                <td>{{ $empaque->nombre }}</td>
                <td>Activo</td>
            </tr>
        @endforeach


    </tbody>
</table>
