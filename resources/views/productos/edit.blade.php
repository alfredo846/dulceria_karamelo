@extends('layouts.main')
@section('title', 'Actualizar producto')

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
                    <p class="text-2x mar-no text-semibold"> Actualizar Producto</p>
                    <p></p>
                </div>
            </div>
        </div><br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="row">
                <form action="{{ route('productos.update', $producto) }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading"><br>
                                <h4 class="text-main text-bold mar-no text-center">Producto</h4>
                            </div>

                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Código
                                        de barras:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="codigo_barras" maxlength="14"
                                            value="{{ $producto->codigo_barras }}"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            placeholder="Código de barras" autocomplete="off" class="form-control"
                                            id="demo-is-inputnormal">
                                        @if ($errors->first('codigo_barras'))
                                            <i class="text-danger">{{ $errors->first('codigo_barras') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombre" placeholder="Nombre del producto"
                                            value="{{ $producto->nombre }}" autocomplete="off" class="form-control"
                                            id="demo-is-inputnormal">
                                        @if ($errors->first('nombre'))
                                            <i class="text-danger">{{ $errors->first('nombre') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Descripción:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="descripcion" placeholder="Descripción"
                                            value="{{ $producto->descripcion }}" autocomplete="off" class="form-control"
                                            id="demo-is-inputnormal">
                                        @if ($errors->first('descripcion'))
                                            <i class="text-danger">{{ $errors->first('descripcion') }}</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left">Imagén:</label>
                                    <div class="col-sm-8">

                                        <div id="imagePreview">
                                            <img class='fotoperfil'
                                                src="{{ asset('imagenes/productos/' . $producto->imagen) }}" alt=""
                                                width="200px">
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
                                    <a href="{{ route('productos.index') }}"
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
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Categoría:</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="categoria_id">
                                            <option value="">-- Seleccione una categoria --</option>
                                            @foreach ($categorias as $categoria)
                                                @if ($producto->categoria_id == $categoria->categoria_id)
                                                    <option value={{ $categoria->categoria_id }} selected>
                                                        {{ $categoria->nombre }}</option>
                                                @endif
                                                @if ($producto->categoria_id != $categoria->categoria_id)
                                                    <option value={{ $categoria->categoria_id }}>{{ $categoria->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach

                                            @foreach ($categoriasd as $categoria)
                                                @if ($producto->categoria_id == $categoria->categoria_id)
                                                    <option value={{ $categoria->categoria_id }} selected>
                                                        {{ $categoria->nombre }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                        @if ($errors->first('categoria_id'))
                                            <i class="text-danger">El campo categoría es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Marca:</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="marca_id">
                                            <option value="">-- Seleccione una marca --</option>
                                            @foreach ($marcas as $marca)
                                                @if ($producto->marca_id == $marca->marca_id)
                                                    <option value={{ $marca->marca_id }} selected>{{ $marca->nombre }}
                                                    </option>
                                                @endif
                                                @if ($producto->marca_id != $marca->marca_id)
                                                    <option value={{ $marca->marca_id }}>{{ $marca->nombre }}</option>
                                                @endif
                                            @endforeach

                                            @foreach ($marcasd as $marca)
                                                @if ($producto->marca_id == $marca->marca_id)
                                                    <option value={{ $marca->marca_id }} selected>{{ $marca->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->first('marca_id'))
                                            <i class="text-danger">El campo categoría es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Temporada:</label>
                                    <div class="col-sm-8">
                                        <select data-placeholder="-- Seleccione una temporada --" id="demo-chosen-select"
                                            tabindex="2" style="width:330px" name="temporada_id">
                                            <option value="">-- Seleccione una temporada --</option>
                                            @foreach ($temporadas as $temporada)
                                                @if ($producto->temporada_id == $temporada->temporada_id)
                                                    <option value={{ $temporada->temporada_id }} selected>
                                                        {{ $temporada->nombre }}</option>
                                                @endif
                                                @if ($producto->temporada_id != $temporada->temporada_id)
                                                    <option value={{ $temporada->temporada_id }}>{{ $temporada->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach

                                            @foreach ($temporadasd as $temporada)
                                                @if ($producto->temporada_id == $temporada->temporada_id)
                                                    <option value={{ $temporada->temporada_id }} selected>
                                                        {{ $temporada->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->first('temporada_id'))
                                            <i class="text-danger">El campo temporada es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Empaque:</label>
                                    <div class="col-sm-8">
                                        <select data-placeholder="-- Seleccione un empaque --" style="width:830px"
                                            class="selectpicker" name="empaque_id">
                                            <option value="">-- Seleccione una empaque --</option>
                                            @foreach ($empaques as $empaque)
                                                @if ($producto->empaque_id == $empaque->empaque_id)
                                                    <option value={{ $empaque->empaque_id }} selected>
                                                        {{ $empaque->nombre }}</option>
                                                @endif
                                                @if ($producto->empaque_id != $empaque->empaque_id)
                                                    <option value={{ $empaque->empaque_id }}>{{ $empaque->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach

                                            @foreach ($empaquesd as $empaque)
                                                @if ($producto->empaque_id == $empaque->empaque_id)
                                                    <option value={{ $empaque->empaque_id }} selected>
                                                        {{ $empaque->nombre }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->first('empaque_id'))
                                            <br>
                                            <i class="text-danger">El campo empaque es obligatorio</i>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold is-required text-left">Piezas
                                        por empaque:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="piezas_por_empaque"
                                            value="{{ $producto->piezas_por_empaque }}"
                                            placeholder="Número de piezas que trae el empaque" maxlength="3"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            autocomplete="off" class="form-control" id="demo-is-inputnormal">
                                        @if ($errors->first('piezas_por_empaque'))
                                            <i class="text-danger">{{ $errors->first('piezas_por_empaque') }}</i>
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
                            </div>
                            <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
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
