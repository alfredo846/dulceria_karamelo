@extends('layouts.main')
@section('title', 'Ventas')

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
            <div class="panel panel-primary panel-colorful media middle pad-all text-center">
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold">Ventas</p>
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
                            <a href="{{ route('ventas.papelera') }}">
                                <button id="deleteItem" type="submit"
                                    class="btn btn-circle btn-danger btn-icon add-tooltip" data-toggle="tooltip"
                                    data-container="body" data-placement="top" data-original-title="Papelera"><i
                                        class="demo-psi-recycling icon-lg"></i></button>
                            </a>

                            <a href="{{ route('ventas.export') }}">
                                <button type="submit" class="btn btn-circle btn-mint btn-icon add-tooltip"
                                    data-toggle="tooltip" data-container="body" data-placement="top"
                                    data-original-title="Exportar"><i class="fa fa-file-excel-o fa-lg"></i></button>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('ventas.create') }}"> <button class="button"><i
                                        class="ion-plus-circled lg"></i> Agregar nueva venta</button></a>

                        </div>
                    </div>
                </div><br>

                <div class="panel-body">
                    <table id="ventas" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Vendedor</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas as $venta)
                                <tr>
                                    @foreach($usuarios as $usuario)
                                    @if($venta->user_id == $usuario->id)
                                    <td>{{ $usuario->username }}</td>
                                    @endif
                                    @endforeach
                                    <td>{{ $venta->fecha_venta }}</td>
                                    <td>$ {{ $venta->total }}</td>
                                    <td><span class="label label-mint">Activo</span></td>
                                    <td width="140">
                                        <a href="{{ route('ventas.show', $venta) }}">
                                            <button type="button" class="btn btn-sm btn-success btn-icon add-tooltip"
                                                data-toggle="tooltip" data-container="body" data-placement="top"
                                                data-original-title="Consultar"><i class="ion-eye icon-lg"></i>
                                            </button>
                                        </a>

                                        <a href="{{ route('ventas.edit', $venta) }}">
                                            <button class="btn btn-sm btn-primary btn-icon add-tooltip"
                                                data-toggle="tooltip" data-container="body" data-placement="top"
                                                data-original-title="Actalizar"><i
                                                    class="demo-psi-pen-5 icon-sm"></i></button>
                                        </a>

                                        <form action="{{ route('ventas.destroy', $venta) }}" method="POST"
                                            style="display: inline-block" class="formulario-eliminar">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-icon add-tooltip"
                                                data-toggle="tooltip" data-container="body" data-placement="top"
                                                data-original-title="Eliminar"><i
                                                    class="demo-psi-recycling icon-sm"></i></button>
                                        </form>
                                    </td>
                                </tr>
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
                '??Eliminado!',
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
                title: '??Est??s seguro?',
                text: "??Este registro se eliminar??!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#26a69a',
                cancelButtonColor: '#d33',
                confirmButtonText: '??Si, eliminar!',
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
            $('#ventas').DataTable({
                order: [
                    [1, 'desc']
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por p??gina",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la p??gina _PAGE_ de _PAGES_",
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
