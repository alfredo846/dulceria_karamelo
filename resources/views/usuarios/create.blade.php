@extends('layouts.main')
@section('title', 'Agregar usuario')

@section('head')
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\bootstrap-select\bootstrap-select.min.css') }}" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\chosen\chosen.min.css') }}" rel="stylesheet">

    <!--noUiSlider [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\noUiSlider\nouislider.min.css') }}" rel="stylesheet">

@endsection

@section('content')

    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <br>
        <div class="col-md-12">
            <div class="panel panel-primary panel-colorful media middle pad-all">
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"> Agregar Usuario</p>
                    <p></p>
                </div>
            </div>
        </div><br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="row">
                <form action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal" name="formulario_01">
                    @csrf
                    @method('POST')
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading"><br>
                                <h4 class="text-main text-bold mar-no text-center">Usuario</h4>
                            </div>

                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombre" placeholder="Nombre del usuario" maxlength="25"
                                            value="{{ old('nombre') }}" autocomplete="off" class="form-control"
                                            id="nombre" onkeyup="myFunction();">
                                        @if ($errors->first('nombre'))
                                            <i class="text-danger">{{ $errors->first('nombre') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Apellido
                                        Paterno:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="apellido_paterno" maxlength="25"
                                            placeholder="Apellido paterno del usuario" value="{{ old('apellido_paterno') }}"
                                            autocomplete="off" class="form-control" id="apellido_paterno"
                                            onkeyup="myFunction();">
                                        @if ($errors->first('apellido_paterno'))
                                            <i class="text-danger">{{ $errors->first('apellido_paterno') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Apellido
                                        Materno:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="apellido_materno" maxlength="25"
                                            placeholder="Apellido materno del usuario" value="{{ old('apellido_materno') }}"
                                            autocomplete="off" class="form-control" id="apellido_materno"
                                            onkeyup="myFunction();">
                                        @if ($errors->first('apellido_materno'))
                                            <i class="text-danger">{{ $errors->first('apellido_materno') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left">Foto:</label>
                                    <div class="col-sm-8">
                                        <div id="imagePreview"></div>
                                        <input type="file" placeholder="Coloque su fotografía" id="imagen"
                                            class="upload-box" name="foto"
                                            accept="image/png,image/jpeg,image/jpg,image/jfif">
                                        @if ($errors->first('foto'))
                                            <br>
                                            <i class="text-danger">{{ $errors->first('foto') }}
                                                <label> La imagén no debe exceder los 2 Mb y solo acepta
                                                    imágenes con extensiones 'jpeg, jpg, png, jfif</label></i>
                                        @endif
                                    </div>
                                </div>

                                <div class="panel-footer text-left">
                                    <a href="{{ route('usuarios.index') }}"
                                        class="text-right fs-6 text-secundario add-tooltip" data-toggle="tooltip"
                                        data-container="body" data-placement="top" data-original-title="Regresar"><img
                                            src="{{ asset('assets/img/regresar.jpg') }}" width="34" height="34"></a>
                                </div>
                                <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                    </div>
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-9 control-label text-bold text-semibold is-instruccion">Los campos
                                        indicados con * son obligatorios.</label>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold is-required text-left">Género:</label>
                                    <div class="col-sm-8">
                                        <div class="radio">

                                            <input type="radio" name="genero" Value="masculino"
                                                {{ old('genero') == 'masculino' ? 'checked' : '' }} id="demo-form-radio-1"
                                                class="magic-radio">
                                            <label for="demo-form-radio-1">Maculino</label>

                                            <input type="radio" name="genero" Value="femenino"
                                                {{ old('genero') == 'femenino' ? 'checked' : '' }} id="demo-form-radio-2"
                                                class="magic-radio">
                                            <label for="demo-form-radio-2">Femenino</label>

                                        </div>
                                        @if ($errors->first('genero'))
                                            <i class="text-danger">El campo género es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold text-left is-required">Teléfono:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="telefono" placeholder="Teléfono"
                                            value="{{ old('telefono') }}" maxlength="10"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            autocomplete="off" class="form-control" id="demo-is-inputnormal">
                                        @if ($errors->first('telefono'))
                                            <i class="text-danger">El campo teléfono es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold text-left">Username:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="username" placeholder="Usuario"
                                            value="{{ old('username') }}" autocomplete="off" class="form-control"
                                            id="username" readonly>
                                        @if ($errors->first('username'))
                                            <i class="text-danger">{{ $errors->first('username') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold is-required text-left">Email:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            placeholder="Correo electrónico" autocomplete="off" class="form-control"
                                            id="demo-is-inputnormal">
                                        @if ($errors->first('email'))
                                            <i class="text-danger">{{ $errors->first('email') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold is-required text-left">Password:</label>
                                    <div class="col-sm-8">
                                        <input type="password" placeholder="Password" id="demo-hor-inputpass"
                                            class="form-control" name="password">

                                        @if ($errors->first('password'))
                                            <i class="text-danger">{{ $errors->first('password') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold is-required text-left">Rol:</label>
                                    <div class="col-sm-8">

                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="rol_id" id="rol_id" onchange="seleccionado()">
                                            <option value="">-- Seleccione un rol --</option>
                                            @foreach ($roles as $rol)
                                                @if (old('rol_id') == $rol->rol_id)
                                                    <option value="{{ $rol->rol_id }}" selected>
                                                        {{ $rol->nombre }}
                                                    @else
                                                    <option value="{{ $rol->rol_id }}">{{ $rol->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @if ($errors->first('rol_id'))
                                            <i class="text-danger">El campo rol es obligatorio</i>
                                        @endif
                                        <br>

                                        @if ($errors->first('sucursal_id'))
                                            <i class="text-danger">El campo sucursal es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group" id="sucursales" style="display:none;">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold is-required text-left">Sucursal:</label>
                                    <div class="col-sm-8">

                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="sucursal_id">
                                            <option value="">-- Seleccione una sucursal --</option>
                                            @foreach ($sucursales as $sucursal)
                                                @if (old('sucursal_id') == $sucursal->sucursal_id)
                                                    <option value="{{ $sucursal->sucursal_id }}" selected>
                                                        {{ $sucursal->nombre }}
                                                    @else
                                                    <option value="{{ $sucursal->sucursal_id }}">{{ $sucursal->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>

                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <button class="buttonp" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </div><br>&nbsp;<br>&nbsp;
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\bootstrap-select\bootstrap-select.min.js') }}"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\chosen\chosen.jquery.min.js') }}"></script>

    <!--noUiSlider [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\noUiSlider\nouislider.min.js') }}"></script>

    <!--Form Component [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\form-component.js') }}"></script>

    {{-- Mostrar la imagén --}}
    <script>
        (function() {
            function filePreview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').html("<img class='fotoperfil' src='" + e.target.result + "'/>");
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#imagen').change(function() {
                filePreview(this);
            });
        })();
    </script>

    {{-- Username --}}
    <script type="text/JavaScript">
        function myFunction() {
                        var nombre = document.getElementById("nombre").value;
                        var apellido_paterno = document.getElementById("apellido_paterno").value;
                        var apellido_materno = document.getElementById("apellido_materno").value;
                        var datos;
                        datos = nombre + " " + apellido_paterno + " "+ apellido_materno;
                        document.formulario_01.username.value = datos;
                        // alert(datos);
                        // document.getElementById("aux").innerHTML = datos;
                       }
            </script>

    {{-- Validar input nombre --}}
    <script type="text/JavaScript">
        $('input[name=nombre]').bind('keypress', function(event) {
                        var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚ ]+$");
                        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                        if (!regex.test(key)) {
                        event.preventDefault();
                        return false;
                        }
                        });
            </script>

    {{-- Validar input apellido paterno --}}
    <script type="text/JavaScript">
        $('input[name=apellido_paterno]').bind('keypress', function(event) {
                        var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚ ]+$");
                        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                        if (!regex.test(key)) {
                        event.preventDefault();
                        return false;
                        }
                        });
                        </script>

    {{-- Validar input apellido mateno --}}
    <script type="text/JavaScript">
        $('input[name=apellido_materno]').bind('keypress', function(event) {
                        var regex = new RegExp("^[a-zA-ZáéíóúÁÉÍÓÚ ]+$");
                        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                        if (!regex.test(key)) {
                        event.preventDefault();
                        return false;
                        }
                        });
            </script>

    {{-- ocultar y mostrar inputs
         <script type="text/JavaScript">
            const rol_id = document.querySelector("#rol_id");
            const input = document.querySelector("#sucursal_id");

            rol_id.addEventListener("change", () => {
            if (rol_id.value === "1") {
                input.style.display = 'none';
            } else {
                input.style.display = 'initial';
            }
            });
        </script> --}}

    {{-- mostrar u ocultar el select sucursales --}}
    <script>
        function seleccionado() {
            var opt = $('#rol_id').val();

            // alert(opt);
            if (opt == "1") {
                $('#sucursales').hide();
            } else {
                if (opt == "2") {
                    $('#sucursales').show();
                } else {
                    $('#sucursales').show();
                }
            }
        }
    </script>

@endsection
