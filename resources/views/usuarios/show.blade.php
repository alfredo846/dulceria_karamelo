@extends('layouts.main')
@section('title', 'Consultar usuario')

@section('head')
    <!--Switchery [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\switchery\switchery.min.css') }}" rel="stylesheet">


    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\bootstrap-select\bootstrap-select.min.css') }}" rel="stylesheet">


    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\bootstrap-tagsinput\bootstrap-tagsinput.min.css') }}" rel="stylesheet">


    <!--Chosen [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\chosen\chosen.min.css') }}" rel="stylesheet">


    <!--noUiSlider [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\noUiSlider\nouislider.min.css') }}" rel="stylesheet">


    <!--Select2 [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\select2\css\select2.min.css') }}" rel="stylesheet">


    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\bootstrap-timepicker\bootstrap-timepicker.min.css') }}" rel="stylesheet">


    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\bootstrap-datepicker\bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!--Dropzone [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\dropzone\dropzone.min.css') }}" rel="stylesheet">

@endsection

@section('content')

    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <br>
        <div class="col-md-12">
            <div class="panel panel-primary panel-colorful media middle pad-all">
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"> Consultar Usuario</p>
                    <p></p>
                </div>
            </div>
        </div><br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="row">
                <form action="" class="form-horizontal">
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading"><br>
                                <h4 class="text-main text-bold mar-no text-center">Usuario</h4>
                            </div>

                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left"></label>
                                    <div class="col-sm-8">
                                        <div id="imagePreview"></div>
                                        <img class='profile-image-show' src="{{ asset('imagenes/usuarios/' . $usuario->foto) }}" alt="foto">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $usuario->nombre }}" autocomplete="off" class="form-control"
                                        id="demo-is-inputnormal" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Apellido
                                        Paterno:</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $usuario->apellido_paterno }}" autocomplete="off"
                                            class="form-control" id="demo-is-inputnormal" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Apellido
                                        Materno:</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $usuario->apellido_materno }}" autocomplete="off"
                                            class="form-control" id="demo-is-inputnormal" disabled>
                                    </div>
                                </div>

                                <div class="panel-footer text-left">
                                    <a href="{{ route('usuarios.index') }}" class="text-right fs-6 text-secundario"><img
                                    src="{{ asset('assets/img/regresar.jpg') }}" width="30" height="30"></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold text-left">Género:</label>
                                    <div class="col-sm-8">
                                        <div class="radio">

                                            <input type="radio" name="genero" Value="masculino"
                                              @if($usuario->genero == 'masculino') checked @endif
                                                id="demo-form-radio-1" class="magic-radio" disabled>
                                            <label for="demo-form-radio-1">Maculino</label>

                                            <input type="radio" name="genero" Value="femenino"
                                                @if($usuario->genero == 'femenino') checked @endif
                                                id="demo-form-radio-2" class="magic-radio" disabled>
                                            <label for="demo-form-radio-2">Femenino</label>

                                        </div>
                                        @if ($errors->first('genero'))
                                            <i class="text-danger">El campo género es obligatorio</i>
                                        @endif
                                    </div>
                                </div><br>

                                 <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold  text-left">Teléfono:</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $usuario->telefono }}" autocomplete="off" class="form-control"
                                            id="demo-is-inputnormal" disabled>
                                    </div>
                                </div><br>

                                 <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold  text-left">Username:</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $usuario->username }}" autocomplete="off" class="form-control"
                                            id="demo-is-inputnormal" disabled>
                                    </div>
                                </div><br>

                                 <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold  text-left">Email:</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ $usuario->email }}" autocomplete="off" class="form-control"
                                            id="demo-is-inputnormal" disabled>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold  text-left">Rol:</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" data-live-search="true" data-width="100%" disabled>
                                            @foreach ($roles as $rol)
                                                @if ($usuario->rol_id == $rol->rol_id)
                                                    <option value="{{ $rol->rol_id }}" selected>
                                                        {{ $rol->nombre }}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>

                                @if($usuario->sucursal_id != "")
                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold  text-left">Sucursal:</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" data-live-search="true" data-width="100%" disabled>
                                            @foreach ($sucursales as $sucursal)
                                                @if ($usuario->sucursal_id == $sucursal->sucursal_id)
                                                    <option value="{{ $sucursal->sucursal_id }}" selected>
                                                        {{ $sucursal->nombre }}
                                                @endif
                                            @endforeach
                                            @foreach ($sucursalesd as $sucursal)
                                                @if ($usuario->sucursal_id == $sucursal->sucursal_id)
                                                    <option value="{{ $sucursal->sucursal_id }}" selected>
                                                        {{ $sucursal->nombre }}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <br>&nbsp;<br>&nbsp;
                            </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!--End page content-->
    </div>
    <!--END CONTENT CONTAINER-->

@endsection

@section('script')
    <!--Switchery [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\switchery\switchery.min.js') }}"></script>


    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\bootstrap-select\bootstrap-select.min.js') }}"></script>


    <!--Bootstrap Tags Input [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\bootstrap-tagsinput\bootstrap-tagsinput.min.js') }}"></script>


    <!--Chosen [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\chosen\chosen.jquery.min.js') }}"></script>


    <!--noUiSlider [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\noUiSlider\nouislider.min.js') }}"></script>


    <!--Select2 [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\select2\js\select2.min.js') }}"></script>


    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\bootstrap-timepicker\bootstrap-timepicker.min.js') }}"></script>


    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\bootstrap-datepicker\bootstrap-datepicker.min.js') }}"></script>


    <!--Form Component [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\form-component.js') }}"></script>

    <!--Dropzone [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\dropzone\dropzone.min.js') }}"></script>


    <!--Form File Upload [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\form-file-upload.js') }}"></script>

    <script src="{{ asset('assets\js\demo\nifty-demo.min.js') }}"></script>

@endsection
