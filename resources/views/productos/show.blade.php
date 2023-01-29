@extends('layouts.main')
@section('title', 'Consultar producto')

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
                    <p class="text-2x mar-no text-semibold"> Consultar Producto</p>
                    <p></p>
                </div>
            </div>
        </div><br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="row">
                <form class="form-horizontal">
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading"><br>
                                <h4 class="text-main text-bold mar-no text-center">Producto</h4>
                            </div>

                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold text-left"></label>
                                    <div class="col-sm-8">
                                        <div id="imagePreview"></div>
                                        <img class='profile-image-show'
                                            src="{{ asset('imagenes/productos/' . $producto->imagen) }}" alt="foto">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Código de
                                        barras:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="codigo_barras" maxlength="14"
                                            value="{{ $producto->codigo_barras }}"
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            placeholder="Código de barras" autocomplete="off" disabled class="form-control"
                                            >

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombre" placeholder="Nombre del producto"
                                            value="{{ $producto->nombre }}" autocomplete="off" class="form-control"
                                             disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Descripción:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="descripcion"
                                            placeholder="Descripción"value="{{ $producto->descripcion }}" autocomplete="off"
                                            class="form-control"  disabled>
                                        @if ($errors->first('descripcion'))
                                            <i class="text-danger">{{ $errors->first('descripcion') }}</i>
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

                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Categoría:</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="categoria_id" disabled>
                                            @foreach ($categorias as $categoria)
                                                @if ($producto->categoria_id == $categoria->categoria_id)
                                                    <option value="{{ $categoria->categoria_id }}" selected>
                                                        {{ $categoria->nombre }}
                                                @endif
                                            @endforeach
                                            @foreach ($categoriasd as $categoria)
                                                @if ($producto->categoria_id == $categoria->categoria_id)
                                                    <option value="{{ $categoria->categoria_id }}" selected>
                                                        {{ $categoria->nombre }}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Marca:</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="marca_id" disabled>
                                            @foreach ($marcas as $marca)
                                                @if ($producto->marca_id == $marca->marca_id)
                                                    <option value="{{ $marca->marca_id }}" selected>
                                                        {{ $marca->nombre }}
                                                @endif
                                            @endforeach
                                            @foreach ($marcasd as $marca)
                                                @if ($producto->marca_id == $marca->marca_id)
                                                    <option value="{{ $marca->marca_id }}" selected>
                                                        {{ $marca->nombre }}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Temporada:</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="marca_id" disabled>
                                            @foreach ($temporadas as $temporada)
                                                @if ($producto->temporada_id == $temporada->temporada_id)
                                                    <option value="{{ $temporada->temporada_id }}" selected>
                                                        {{ $temporada->nombre }}
                                                @endif
                                            @endforeach
                                            @foreach ($temporadasd as $temporada)
                                                @if ($producto->temporada_id == $temporada->temporada_id)
                                                    <option value="{{ $temporada->temporada_id }}" selected>
                                                        {{ $temporada->nombre }}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Empaque:</label>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" data-live-search="true" data-width="100%"
                                            name="temporada_id" disabled>
                                            @foreach ($empaques as $empaque)
                                                @if ($producto->empaque_id == $empaque->empaque_id)
                                                    <option value="{{ $empaque->empaque_id }}" selected>
                                                        {{ $empaque->nombre }}
                                                @endif
                                            @endforeach
                                            @foreach ($empaquesd as $empaque)
                                                @if ($producto->empaque_id == $empaque->empaque_id)
                                                    <option value="{{ $empaque->empaque_id }}" selected>
                                                        {{ $empaque->nombre }}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-4 control-label text-bold text-semibold  text-left">Piezas
                                        por empaque:</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="piezas_por_empaque"
                                            value="{{ $producto->piezas_por_empaque }}"
                                            placeholder="Número de piezas que trae el empaque" maxlength="3" disabled
                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                            autocomplete="off" class="form-control" >
                                    </div>
                                </div><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
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

@endsection
