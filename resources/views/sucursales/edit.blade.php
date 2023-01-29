@extends('layouts.main')
@section('title', 'Actualizar sucursal')

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
                    <p class="text-2x mar-no text-semibold"> Actualizar Sucursal</p>
                    <p></p>
                </div>
            </div>
        </div><br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="row">
                <form action="{{ route('sucursales.update', $sucursale) }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading"><br>
                                <h4 class="text-main text-bold mar-no text-center">Sucursal</h4>
                            </div>

                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Número
                                        de Sucursal:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="numero_sucursal" maxlength="3"
                                            value="{{ $sucursale->numero_sucursal }}"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            placeholder="Número de sucursal" autocomplete="off" class="form-control">
                                        @if ($errors->first('numero_sucursal'))
                                            <i class="text-danger">{{ $errors->first('numero_sucursal') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombre" placeholder="Nombre de la sucursal"
                                            value="{{ $sucursale->nombre }}" autocomplete="off" class="form-control">
                                        @if ($errors->first('nombre'))
                                            <i class="text-danger">{{ $errors->first('nombre') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left">Teléfono:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="telefono" placeholder="Teléfono"
                                            value="{{ $sucursale->telefono }}" maxlength="10"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            autocomplete="off" class="form-control">
                                        @if ($errors->first('telefono'))
                                            <i class="text-danger">{{ $errors->first('telefono') }}</i>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left">Imagén:</label>
                                    <div class="col-sm-8">

                                        <div id="imagePreview">
                                            <img class='fotoperfil'
                                                src="{{ asset('imagenes/sucursales/' . $sucursale->imagen) }}"
                                                alt="" width="200px">
                                        </div>

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
                                    <a href="{{ route('sucursales.index') }}"
                                        class="text-right fs-6 text-secundario add-tooltip" data-toggle="tooltip"
                                        data-container="body" data-placement="top" data-original-title="Regresar"><img
                                            src="{{ asset('assets/img/regresar.jpg') }}" width="34" height="34"></a>
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
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Estado:</label>
                                    <div class="col-sm-8">

                                        <select style="width:100%" name="estado_id" id="estado" class="selectpicker"
                                            data-live-search="true" data-width="80%">
                                            <option selected disabled>--Seleccione un estado--</option>
                                            @foreach ($estados as $estado)
                                                <option value="{{ $estado->estado_id }}">{{ $estado->nombre }}
                                                </option>
                                            @endforeach

                                        </select><br>
                                        @if ($errors->first('estado_id'))
                                            <i class="text-danger">El campo estado es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Municipio:</label>
                                    <div class="col-sm-8">
                                        <div class="select">
                                            <select style="width:100%" id="municipio" name="municipio_id"></select>

                                        </div>
                                        @if ($errors->first('municipio_id'))
                                            <i class="text-danger">El campo municipio es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left">Localidad:</label>
                                    <div class="col-sm-8">
                                        <div class="select">
                                            <select style="width:100%" id="localidad" name="localidad_id"></select>
                                        </div>
                                        @if ($errors->first('localidad_id'))
                                            <i class="text-danger">El campo localidad es obligatorio</i>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Email:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="email" value="{{ $sucursale->email }}"
                                            placeholder="Correo electrónico" autocomplete="off" class="form-control">
                                        @if ($errors->first('email'))
                                            <i class="text-danger">{{ $errors->first('email') }}</i>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <button class="buttonp" type="submit">Actualizar</button>
                                    </div>
                                </div>
                            </div><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#estado').on('change', function() {
                var estadoId = this.value;
                $('#municipio').html('');
                $.ajax({
                    url: '{{ route('getMunicipios') }}?estado_id=' + estadoId,
                    type: 'get',
                    success: function(res) {
                        $('#municipio').html(
                            '<option value="">--Seleccione un municipio--</option>');
                        $.each(res, function(key, value) {
                            $('#municipio').append('<option value="' + value
                                .municipio_id + '" >' + value.nombre + '</option>');
                        });
                        $('#localidad').html(
                            '<option value="">--Seleccione una ocalidad--</option>');
                    }
                });
            });

            $('#municipio').on('change', function() {
                var municipioId = this.value;
                $('#localidad').html('');
                $.ajax({
                    url: '{{ route('getLocalidades') }}?municipio_id=' + municipioId,
                    type: 'get',
                    success: function(res) {
                        $('#localidad').html(
                            '<option value="">-- Seleccione una localidad--    </option>');
                        $.each(res, function(key, value) {
                            $('#localidad').append('<option value="' + value
                                .localidad_id + '">' + value.nombre + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#estado').on('change', function() {
                var estadoId = this.value;
                $('#municipio').html('');
                $.ajax({
                    url: '{{ route('getMunicipios') }}?estado_id=' + estadoId,
                    type: 'get',
                    success: function(res) {
                        $('#municipio').html(
                            '<option value="">--Seleccione un municipio--</option>');
                        $.each(res, function(key, value) {
                            $('#municipio').append('<option value="' + value
                                .municipio_id + '" >' + value.nombre + '</option>');
                        });
                        $('#localidad').html(
                            '<option value="">--Seleccione una ocalidad--</option>');
                    }
                });
            });

            $('#municipio').on('change', function() {
                var municipioId = this.value;
                $('#localidad').html('');
                $.ajax({
                    url: '{{ route('getLocalidades') }}?municipio_id=' + municipioId,
                    type: 'get',
                    success: function(res) {
                        $('#localidad').html(
                            '<option value="">-- Seleccione una localidad--    </option>');
                        $.each(res, function(key, value) {
                            $('#localidad').append('<option value="' + value
                                .localidad_id + '">' + value.nombre + '</option>');
                        });
                    }
                });
            });
        });
    </script>

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
@endsection
