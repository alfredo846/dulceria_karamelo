@extends('layouts.main')
@section('title', 'Perfil')

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
                    <p class="text-2x mar-no text-semibold">Mí Perfil</p>
                    <p></p>
                </div>
            </div>
        </div>
        <br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="panel">
                <div class="panel-body">
                    <div class="fixed-fluid">
                        <div class="fixed-md-200 pull-sm-left fixed-right-border">
                            <!-- Simple profile -->
                            <div class="text-center">
                                <div class="pad-ver">
                                    <img src="{{ asset('imagenes/usuarios/' . $usuario->foto) }}" class="img-lg img-circle"
                                        alt="Profile Picture">
                                </div>
                                <h4 class="text-lg text-overflow mar-no">{{ $usuario->nombre }}</h4>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                </a><br>&nbsp;
                            </div>

                            <div class="progress progress-xs">
                                <div style="width: 100%;" class="progress-bar progress-bar-primary"></div>
                            </div>
                            <br>

                            <!-- Profile Details -->
                            <div id="clockdate">
                                <div class="clockdate-wrapper">
                                    <div id="clock"></div>
                                </div>
                                <div class="clockdate-wrapper">
                                    <div id="date"></div>
                                </div>
                            </div>
                            <hr>
                            @foreach ($roles as $rol)
                                @if ($usuario->rol_id == $rol->rol_id)
                                    <p class="pad-ver text-main text-sm text-uppercase text-bold text-center">
                                        {{ $rol->nombre }} </p>
                                @endif
                            @endforeach

                            <hr>
                            <h4 class="text-lg text-overflow mar-no text-center">
                                <span class="badge badge-mint">Activo</span>
                            </h4><br>
                        </div>
                        <div class="fluid">
                            <div class="panel panel-bordered panel-primary">
                                <div class="panel-heading">
                                    <div class="text-right">
                                        <button class="btn btn-sm btn-primary">Editar Perfil</button>
                                        <button class="btn btn-sm btn-mint">Descargar CV</button>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <form>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Nombre:</label>
                                                        <input type="text" class="form-control"
                                                            value={{ $usuario->nombre }} readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Apelliod paterno:</label>
                                                        <input type="text" class="form-control"
                                                            value={{ $usuario->apellido_paterno }} readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Apellido Materno:</label>
                                                        <input type="text" class="form-control"
                                                            value={{ $usuario->apellido_materno }} readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Género:</label>
                                                        @if ($usuario->genero == 'masculino')
                                                            <input type="email" class="form-control" value="Masculino"
                                                                readonly>
                                                        @else
                                                            <input type="email" class="form-control" value="Femenino"
                                                                readonly>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Teléfono:</label>
                                                        <input type="text" class="form-control"
                                                            value={{ $usuario->telefono }} readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Username:</label>
                                                        <input type="text" value="{{ $usuario->username }}"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Correo:</label>
                                                        <input type="email" class="form-control"
                                                            value={{ $usuario->email }} readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Rol:</label>
                                                        @foreach ($roles as $rol)
                                                            @if ($usuario->rol_id == $rol->rol_id)
                                                                <input type="text" class="form-control"
                                                                    value={{ $rol->nombre }} readonly>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>

												@if($usuario->rol_id !=1)
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Sucursal:</label>
                                                        @foreach ($sucursales as $sucursal)
                                                            @if ($sucursal->sucursal_id == $usuario->sucursal_id)
                                                            <input type="text" value="{{ $sucursal->nombre }}"
                                                            class="form-control" readonly>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
												@endif
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Último login:</label>
                                                        <input type="email" class="form-control"
                                                            value="{{ $usuario->ultimo_login }}" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
            $('#sucursales').DataTable({
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

    @if (session('foto') == 'ok')
        <script>
            Swal.fire(
                '¡Actualizado!',
                'La fotografía ha sido actualizada exitosamente.',
                'success',
            )
        </script>
    @endif

    @if (session('password') == 'ok')
        <script>
            Swal.fire(
                '¡Actualizado!',
                'La contraseña ha sido actualizada exitosamente.',
                'success',
            )
        </script>
    @endif

    <script type="text/javascript">
        function startTime() {
            var today = new Date();
            var hr = today.getHours();
            var min = today.getMinutes();
            var sec = today.getSeconds();
            ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
            hr = (hr == 0) ? 12 : hr;
            hr = (hr > 12) ? hr - 12 : hr;
            //Add a zero in front of numbers<10
            hr = checkTime(hr);
            min = checkTime(min);
            sec = checkTime(sec);
            document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

            var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre',
                'Noviembre', 'Diciembre'
            ];
            var days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            var curWeekDay = days[today.getDay()];
            var curDay = today.getDate();
            var curMonth = months[today.getMonth()];
            var curYear = today.getFullYear();
            var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear;
            document.getElementById("date").innerHTML = date;

            var time = setTimeout(function() {
                startTime()
            }, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    </script>
@endsection
