<table>
    <thead>
        <tr>
            <strong><th>Id</th></strong>
            <strong><th>Código barras</th></strong>
            <strong><th>Nombre</th></strong>
            <strong><th>Descripción</th></strong>
            <strong><th>Categoría</th></strong>
            <strong><th>Marca</th></strong>
            <strong><th>Temporada</th></strong>
            <strong><th>Empaque</th></strong>
            <strong><th>Piezas por empaque</th></strong>
            <strong><th>Estado</th></strong>
        </tr>
    </thead>
    <tbody>

        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->producto_id }}</td>
                <td>{{ $producto->codigo_barras }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
               @foreach ($categorias as $categoria)
                    @if ($categoria->categoria_id == $producto->categoria_id)
                        <td>{{ $categoria->nombre }}</td>
                    @endif
                @endforeach
               @foreach ($marcas as $marca)
                    @if ($marca->marca_id == $producto->marca_id)
                        <td>{{ $marca->nombre }}</td>
                    @endif
                @endforeach
               @foreach ($temporadas as $temporada)
                    @if ($temporada->temporada_id == $producto->temporada_id)
                        <td>{{ $temporada->nombre }}</td>
                    @endif
                @endforeach
               @foreach ($empaques as $empaque)
                    @if ($empaque->empaque_id == $producto->empaque_id)
                        <td>{{ $empaque->nombre }}</td>
                    @endif
                @endforeach
                <td>{{ $producto->piezas_por_empaque }}</td>
                <td>Activo</td>
            </tr>
        @endforeach


    </tbody>
</table>
