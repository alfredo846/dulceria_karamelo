@extends('layouts.app')
@section('title', 'Agregar sucursal')

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
            <div class="panel panel-info panel-colorful media middle pad-all" style="background-color:#783449">
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"> Agregar Sucursal</p>
                    <p></p>
                </div>
            </div>
        </div><br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="row">
                <form action="{{ route('sucursales.store') }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    @method('POST')
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading"><br>
                                <h4 class="text-main text-bold mar-no text-center">Sucursal</h4>
                            </div>

                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Número de Sucursal:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="numero_sucursal" maxlength="3" value ="{{ old('numero_sucursal') }}"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            placeholder="Número de sucursal" autocomplete="off"
                                            class="form-control" id="demo-is-inputnormal">
                                        @if ($errors->first('numero_sucursal'))
                                            <i class="text-danger">{{ $errors->first('numero_sucursal') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombre" placeholder="Nombre de la sucursal" value ="{{ old('nombre') }}"
                                            autocomplete="off" class="form-control" id="demo-is-inputnormal">
                                        @if ($errors->first('nombre'))
                                            <i class="text-danger">{{ $errors->first('nombre') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left">Teléfono:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="telefono" placeholder="Teléfono" value ="{{ old('telefono') }}" maxlength="10"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            autocomplete="off" class="form-control" id="demo-is-inputnormal">
                                        @if ($errors->first('telefono'))
                                            <i class="text-danger">{{ $errors->first('telefono') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left">Imagén:</label>
                                    <div class="col-sm-8">
                                        <div id="imagePreview"></div>
                                        <input type="file" placeholder="Coloque su fotografía" id="imagen"
                                            class="upload-box" name="imagen"
                                            accept="image/png,image/jpeg,image/jpg,image/jfif">
                                        @if ($errors->first('imagen'))
                                            <br>
                                            <i class="text-danger">{{ $errors->first('imagen') }}
                                                <label> La imagén no debe exceder los 2 Mb y solo acepta
                                                    imágenes con extensiones 'jpeg, jpg, png, jfif</label></i>
                                        @endif
                                    </div>
                                </div>

                                 <div class="panel-footer text-left">
                                    <a href="{{ route('sucursales.index') }}" class="text-right fs-6 text-secundario"><img
                                            src="{{ asset('assets/img/regresar.jpg') }}" width="30"
                                            height="30"></a>
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
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-9 control-label text-bold text-semibold is-instruccion">Los campos
                                        indicados con * son obligatorios.</label>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Estado:</label>
                                    <div class="col-sm-8">

                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="estado_id">
                                            <option value="">-- Seleccione un estado --</option>
                                            @foreach ($estados as $estado)
                                                @if(old('estado_id') == $estado->estado_id)
                                                     <option value="{{ $estado->estado_id }}" selected>{{ $estado->nombre }}
                                                @else 
                                                    <option value="{{ $estado->estado_id }}">{{ $estado->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @if ($errors->first('estado_id'))
                                            <i class="text-danger">El campo estado es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Municipio:</label>
                                    <div class="col-sm-8">

                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="municipio_id">
                                            <option value="">-- Seleccione un municipio --</option>
                                             @foreach ($municipios as $municipio)
                                                @if(old('municipio_id') == $municipio->municipio_id)
                                                     <option value="{{ $municipio->municipio_id }}" selected>{{ $municipio->nombre }}
                                                @else 
                                                    <option value="{{ $municipio->municipio_id }}">{{ $municipio->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @if ($errors->first('municipio_id'))
                                            <i class="text-danger">El campo municipio es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Localidad:</label>
                                    <div class="col-sm-8">

                                        <select data-placeholder="-- Seleccione una localidad --" id="demo-chosen-select"
                                            tabindex="2" style="width:330px" name="localidad_id">
                                            <option value="">-- Seleccione una localidad --</option>
                                             @foreach ($localidades as $localidad)
                                                @if(old('localidad_id') == $localidad->localidad_id)
                                                     <option value="{{ $localidad->localidad_id }}" selected>{{ $localidad->nombre }}
                                                @else 
                                                    <option value="{{ $localidad->localidad_id }}">{{ $localidad->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @if ($errors->first('localidad_id'))
                                            <i class="text-danger">El campo localidad es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                               

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Email:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="email" value ="{{ old('email') }}"
                                            placeholder="Correo electrónico"
                                            autocomplete="off" class="form-control" id="demo-is-inputnormal">
                                        @if ($errors->first('email'))
                                            <i class="text-danger">{{ $errors->first('email') }}</i>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-4">
                                        <button class="btn btn-success" type="submit">Guardar</button>
                                        {{-- <button class="btn btn-primary" type="reset">Reniciar</button> --}}
                                    </div>
                                </div>
                               
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
@endsection