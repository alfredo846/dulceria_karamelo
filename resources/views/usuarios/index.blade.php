@extends('layouts.main')
@section('title', 'Usuarios')

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
                    <p class="text-2x mar-no text-semibold">Usuarios | Listado</p>
                    <p></p>
                </div>
            </div>
        </div>
        <br><br><br>

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
                            <a href="{{ route('usuarios.papelera') }}">
                                <button type="submit"
                                    class="btn btn-circle btn-danger btn-icon add-tooltip" data-toggle="tooltip"
                                    data-container="body" data-placement="top" data-original-title="Papelera"><i
                                        class="demo-psi-recycling icon-lg"></i></button>
                            </a>

                            <a href="{{ route('usuarios.export') }}">
                                <button type="submit" class="btn btn-circle btn-mint btn-icon add-tooltip"
                                    data-toggle="tooltip" data-container="body" data-placement="top"
                                    data-original-title="Exportar"><i class="fa fa-file-excel-o fa-lg"></i></button>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('usuarios.create') }}"> <button class="button"><i
                                        class="ion-plus-circled lg"></i> Agregar nuevo usuario</button></a>

                        </div>
                    </div>
                </div><br>

                <div class="panel-body">
                    <table id="usuarios" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Foto</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Rol</th>
                                <th>Sucursal</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->username }}</td>
                                    <td><img class='profile-image' src="{{ asset('imagenes/usuarios/' . $usuario->foto) }}"
                                            alt="foto"></td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->telefono }}</td>
                                    @foreach ($roles as $rol)
                                        @if ($rol->rol_id == $usuario->rol_id)
                                            <td>{{ $rol->nombre }}</td>
                                        @endif
                                    @endforeach

                                    @foreach ($sucursales as $sucursal)
                                        @if (($sucursal->sucursal_id == $usuario->sucursal_id) && ($usuario->rol_id != '1'))
                                            <td>{{ $sucursal->nombre }}</td>
                                        @endif
                                    @endforeach
                                    @foreach ($sucursalesd as $sucursal)
                                       @if (($sucursal->sucursal_id == $usuario->sucursal_id) && ($usuario->rol_id != '1'))
                                            <td>{{ $sucursal->nombre }}</td>
                                        @endif
                                    @endforeach

                                    @if ($usuario->rol_id == '1')
                                        <td>Sucursales</td>
                                    @endif

                                    <td><span class="label label-mint">Activo</span></td>
                                    <td width="140">
                                        <a href="{{ route('usuarios.show', $usuario) }}">
                                            <button type="button" class="btn btn-sm btn-success btn-icon add-tooltip"
                                                data-toggle="tooltip" data-container="body" data-placement="top"
                                                data-original-title="Consultar"><i class="ion-eye icon-lg"></i>
                                            </button>
                                        </a>

                                        <a href="{{ route('usuarios.edit', $usuario) }}">
                                            <button class="btn btn-sm btn-primary btn-icon add-tooltip"
                                                data-toggle="tooltip" data-container="body" data-placement="top"
                                                data-original-title="Actalizar"><i
                                                    class="demo-psi-pen-5 icon-sm"></i></button>
                                        </a>

                                        <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST"
                                            style="display: inline-block" class="formulario-eliminar">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger btn-icon add-tooltip" data-toggle="tooltip"
                                                data-container="body" data-placement="top" data-original-title="Eliminar"><i
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
            }, 5000);
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
            $('#usuarios').DataTable({
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
