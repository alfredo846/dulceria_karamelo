@extends('layouts.main')
@section('title', 'Articulo papelera')

@section('head')
    <!--DataTables [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\datatables\media\css\dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\plugins\datatables\extensions\Responsive\css\responsive.dataTables.min.css') }}"
        rel="stylesheet">

    <!--Ion Icons [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\ionicons\css\ionicons.min.css') }}" rel="stylesheet">

@endsection

@section('content')
    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <br>
        <div class="col-md-12">
            <div class="panel panel-primary panel-colorful media middle pad-all">
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold text-center">Articulos | Papelera </p>
                    <p class="text-2x mar-no text-semibold text-left">
                        @if ($usuariologeado->id != '1')
                            @foreach ($sucursales as $sucursale)
                                @if ($sucursale->sucursal_id == $usuariologeado->sucursal_id)
                                    {{ $sucursale->nombre }}
                                @endif
                            @endforeach
                            @foreach ($sucursalesd as $sucursale)
                                @if ($sucursale->sucursal_id == $usuariologeado->sucursal_id)
                                    {{ $sucursale->nombre }}
                                @endif
                            @endforeach
                        @endif
                    </p>

                </div>
            </div>
        </div>
        <br><br><br><br>

        <!--Page content-->
        <div id="page-content">

            <!-- Basic Data Tables -->
            <div class="panel">

                <div class="panel-footer text-left">
                    <a href="{{ route('articulos.index') }}" class="text-right fs-6 text-secundario add-tooltip"
                        data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Regresar"><img
                            src="{{ asset('assets/img/regresar.jpg') }}" width="30" height="30"></a>
                </div>
                <div class="content">
                    @include('layouts.partials.alerts')
                </div>

                <div class="panel-body">
                    <table id="articulos" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Código barras</th>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Stock empaque</th>
                                <th>Stock unidad</th>
                                <th>Status</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articulos as $articulo)
                                @foreach ($productos as $producto)
                                    @if ($articulo->producto_id == $producto->producto_id)
                                        <tr>
                                            <td width="140">{{ $producto->codigo_barras }}</td>
                                            <td><img class='profile-image'
                                                    src="{{ asset('imagenes/productos/' . $producto->imagen) }}"
                                                    alt="foto">
                                            </td>
                                            <td width="180">{{ $producto->nombre }}</td>
                                            <td>{{ $articulo->stock_empaque }}</td>
                                            <td>{{ $articulo->stock_unidad }}</td>
                                            <td width="180">

                                                @if ($articulo->stock_empaque == 0)
                                                    <div class="progress progress-striped active progress-lg">
                                                        <div style="width: 100%;" class="progress-bar progress-bar-danger">
                                                            <strong class="text-1x"> Agotado
                                                                ({{ $articulo->stock_empaque }})
                                                                <strong>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($articulo->stock_empaque > 0 && $articulo->stock_empaque <= $articulo->stock_minimo)
                                                    <div class="progress progress-striped active progress-lg">
                                                        <div style="width: 100%;" class="progress-bar progress-bar-warning">
                                                            <strong class="text-1x"> Casi sin existencia
                                                                ({{ $articulo->stock_empaque }})<strong>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($articulo->stock_empaque > $articulo->stock_minimo && $articulo->stock_empaque < $articulo->stock_maximo)
                                                    <div class="progress progress-striped active progress-lg">
                                                        <div style="width: 100%;" class="progress-bar progress-bar-primary">
                                                            <strong class="text-1x"> Stock suficiente
                                                                ({{ $articulo->stock_empaque }})</strong>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($articulo->stock_empaque >= $articulo->stock_maximo)
                                                    <div class="progress progress-striped active progress-lg">
                                                        <div style="width: 100%;" class="progress-bar progress-bar-mint">
                                                            Hay sobre existencia
                                                            ({{ $articulo->stock_empaque }})</div>
                                                    </div>
                                                @endif
                                            </td>

                                            <td><span class="label label-danger">Inactivo</span></td>
                                            <td width="150">

                                                <form action="{{ route('articulos.activar', $articulo) }}" method="POST"
                                                    style="display: inline-block" class="formulario-activar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-mint btn-icon">Activar</button>
                                                </form>

                                                <form action="{{ route('articulos.borrar', $articulo) }}" method="POST"
                                                    style="display: inline-block" class="formulario-borrar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger btn-icon">Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach

                            @foreach ($articulos as $articulo)
                                @foreach ($productosd as $producto)
                                    @if ($articulo->producto_id == $producto->producto_id)
                                        <tr>
                                            <td width="140">{{ $producto->codigo_barras }}</td>
                                            <td><img class='profile-image'
                                                    src="{{ asset('imagenes/productos/' . $producto->imagen) }}"
                                                    alt="foto">
                                            </td>
                                            <td width="180">{{ $producto->nombre }}</td>
                                            <td>{{ $articulo->stock_empaque }}</td>
                                            <td>{{ $articulo->stock_unidad }}</td>
                                            <td width="180">

                                                @if ($articulo->stock_empaque == 0)
                                                    <div class="progress progress-striped active progress-lg">
                                                        <div style="width: 100%;" class="progress-bar progress-bar-danger">
                                                            <strong class="text-1x"> Agotado
                                                                ({{ $articulo->stock_empaque }})
                                                                <strong>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($articulo->stock_empaque > 0 && $articulo->stock_empaque <= $articulo->stock_minimo)
                                                    <div class="progress progress-striped active progress-lg">
                                                        <div style="width: 100%;" class="progress-bar progress-bar-warning">
                                                            <strong class="text-1x"> Casi sin existencia
                                                                ({{ $articulo->stock_empaque }})<strong>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($articulo->stock_empaque > $articulo->stock_minimo && $articulo->stock_empaque < $articulo->stock_maximo)
                                                    <div class="progress progress-striped active progress-lg">
                                                        <div style="width: 100%;" class="progress-bar progress-bar-primary">
                                                            <strong class="text-1x"> Stock suficiente
                                                                ({{ $articulo->stock_empaque }})</strong>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($articulo->stock_empaque >= $articulo->stock_maximo)
                                                    <div class="progress progress-striped active progress-lg">
                                                        <div style="width: 100%;" class="progress-bar progress-bar-mint">
                                                            Hay sobre existencia
                                                            ({{ $articulo->stock_empaque }})</div>
                                                    </div>
                                                @endif
                                            </td>

                                            <td><span class="label label-danger">Inactivo</span></td>
                                            <td>
                                                <form action="{{ route('articulos.activar', $articulo) }}" method="POST"
                                                    style="display: inline-block" class="formulario-activar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-mint btn-icon">Activar</button>
                                                </form>

                                                <form action="{{ route('articulos.borrar', $articulo) }}" method="POST"
                                                    style="display: inline-block" class="formulario-borrar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger btn-icon">Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Striped Table -->

        </div>
        <!--End page content-->

    </div>
    <!--END CONTENT CONTAINER-->
@endsection


@section('script')
    <!--DataTables [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\datatables\media\js\jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets\plugins\datatables\media\js\dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets\plugins\datatables\extensions\Responsive\js\dataTables.responsive.min.js') }}"></script>


    <!--DataTables Sample [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\tables-datatables.js') }}"></script>
    <script src="{{ asset('assets\js\demo\ui-buttons.js') }}"></script>

    <!--Icons [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\icons.js') }}"></script>
    <script src="{{ asset('assets\js\sweetalert2@11.js') }}"></script>


    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El registro se elimino exitosamente.',
                'success'
            )
        </script>
    @endif

    @if (session('activar') == 'ok')
        <script>
            Swal.fire(
                '¡Activado!',
                'El registro se ha activado exitosamente.',
                'success'
            )
        </script>
    @endif

    @if (session('borrar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El registro se ha eliminado exitosamente.',
                'success'
            )
        </script>
    @endif

    <script type="text/javascript">
        $(document).ready(function() {
            $('#demo-dt-basic').DataTable({
                language: {
                    url: "{{ asset('assets/js/spanish.json') }}"
                }
            });
        });


        $(document).ready(function() {
            $('#articulos').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtrado de  _MAX_ registros totales)",
                    'search': 'Buscar:',
                    'paginate': {
                        'next': 'Siguiente',
                        'previous': 'Anterior'
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".content").fadeOut(1500);
            }, 3000);
        });
    </script>

    <script>
        $('.formulario-borrar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Este registro se eliminará de forma permanente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#26a69a',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        });
    </script>

    <script>
        $('.formulario-activar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                text: '¿Está seguro de que desea activar el registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#26a69a',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, activar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        });
    </script>


@endsection
