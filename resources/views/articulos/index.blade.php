@extends('layouts.main')
@section('title', 'Articulos')

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
                    <p class="text-2x mar-no text-semibold text-center">Articulos | Listado </p>
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

                <div class="content">
                    @include('layouts.partials.alerts')
                </div>

                <div class="panel-heading demo-icon">
                    <div class="col-md-12">
                        <div class="col-md-9">
                            <a href="{{ route('articulos.papelera') }}">
                                <button id="deleteItem" type="submit"
                                    class="btn btn-circle btn-danger btn-icon add-tooltip" data-toggle="tooltip"
                                    data-container="body" data-placement="top" data-original-title="Papelera"><i
                                        class="demo-psi-recycling icon-lg"></i></button>
                            </a>

                            <a href="{{ route('articulos.export') }}">
                                <button type="submit" class="btn btn-circle btn-mint btn-icon add-tooltip"
                                    data-toggle="tooltip" data-container="body" data-placement="top"
                                    data-original-title="Exportar"><i class="fa fa-file-excel-o fa-lg"></i></button>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('articulos.create') }}"> <button class="button"><i
                                        class="ion-plus-circled lg"></i> Agregar nuevo articulo</button></a>

                        </div>
                    </div>
                </div><br>

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

                                            <td><span class="label label-mint">Activo</span></td>
                                            <td width="140">
                                                <a href="{{ route('articulos.show', $articulo) }}">
                                                    <button type="button"
                                                        class="btn btn-sm btn-success btn-icon add-tooltip"
                                                        data-toggle="tooltip" data-container="body" data-placement="top"
                                                        data-original-title="Consultar"><i class="ion-eye icon-lg"></i>
                                                    </button>
                                                </a>

                                                <a href="{{ route('articulos.edit', $articulo) }}">
                                                    <button class="btn btn-sm btn-primary btn-icon add-tooltip"
                                                        data-toggle="tooltip" data-container="body" data-placement="top"
                                                        data-original-title="Actalizar"><i
                                                            class="demo-psi-pen-5 icon-sm"></i></button>
                                                </a>

                                                <form action="{{ route('articulos.destroy', $articulo) }}" method="POST"
                                                    style="display: inline-block" class="formulario-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger btn-icon add-tooltip"
                                                        data-toggle="tooltip" data-container="body" data-placement="top"
                                                        data-original-title="Eliminar"><i
                                                            class="demo-psi-recycling icon-sm"></i></button>
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

                                            <td><span class="label label-mint">Activo</span></td>
                                            <td width="140">
                                                <a href="{{ route('articulos.show', $articulo) }}">
                                                    <button type="button"
                                                        class="btn btn-sm btn-success btn-icon add-tooltip"
                                                        data-toggle="tooltip" data-container="body" data-placement="top"
                                                        data-original-title="Consultar"><i class="ion-eye icon-lg"></i>
                                                    </button>
                                                </a>

                                                <a href="{{ route('articulos.edit', $articulo) }}">
                                                    <button class="btn btn-sm btn-primary btn-icon add-tooltip"
                                                        data-toggle="tooltip" data-container="body" data-placement="top"
                                                        data-original-title="Actalizar"><i
                                                            class="demo-psi-pen-5 icon-sm"></i></button>
                                                </a>

                                                <form action="{{ route('articulos.destroy', $articulo) }}" method="POST"
                                                    style="display: inline-block" class="formulario-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger btn-icon add-tooltip"
                                                        data-toggle="tooltip" data-container="body" data-placement="top"
                                                        data-original-title="Eliminar"><i
                                                            class="demo-psi-recycling icon-sm"></i></button>
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
            <!--===================================================-->
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


    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".content").fadeOut(1500);
            }, 3000);
        });
    </script>

    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Este registro se eliminará!",
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
                order: [
                    [1, 'desc']
                ],
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
@endsection