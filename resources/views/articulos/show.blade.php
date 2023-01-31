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
        <!--Page content-->
        <div id="page-content">
            <div class="panel">
                <div class="panel-body">
                    <div class="fixed-fluid">
                        <div class="fluid">
                            <div class="panel panel-bordered panel-primary">
                                <div class="panel-heading">
                                    <div class="panel panel-primary panel-colorful media middle pad-all">
                                        <p class="text-2x mar-no text-semibold text-center">Consultar Producto en Inventario
                                        </p>
                                        <p class="text-2x mar-no text-semibold">Sucursal -
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
                                </div><br><br>
                                <div class="panel-body">
                                    <form>
                                        <div class="panel-body">
                                            @foreach ($productos as $producto)
                                                @if ($producto->producto_id == $articulo->producto_id)
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="col-sm-3">
                                                                <label class="control-label">Imagen:</label>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <img class='profile-image-createarticulo'
                                                                    src="{{ asset('imagenes/productos/' . $producto->imagen) }}"
                                                                    alt="foto">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 text-right">
                                                            <div class="form-group">
                                                                <label for="demo-is-inputnormal"
                                                                    class="col-sm-12 control-label text-bold text-semibold is-instruccion">Los
                                                                    campos
                                                                    indicados con * son obligatorios.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Código de barras:</label>
                                                                <input type="text" value="{{ $producto->codigo_barras }}"
                                                                    class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Nombre:</label>
                                                                <input type="text" value="{{ $producto->nombre }}"
                                                                    class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Descripción:</label>
                                                                <input type="text" value="{{ $producto->descripcion }}"
                                                                    class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Categoría:</label>
                                                                @foreach ($categorias as $categoria)
                                                                    @if ($producto->categoria_id == $categoria->categoria_id)
                                                                        <input type="text"
                                                                            value="{{ $categoria->nombre }}"
                                                                            class="form-control" readonly>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Marca:</label>
                                                                @foreach ($marcas as $marca)
                                                                    @if ($producto->marca_id == $marca->marca_id)
                                                                        <input type="text" placeholder="Marca"
                                                                            value="{{ $marca->nombre }}" autocomplete="off"
                                                                            class="form-control" readonly>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Temporada:</label>
                                                                @foreach ($temporadas as $temporada)
                                                                    @if ($producto->temporada_id == $temporada->temporada_id)
                                                                        <input type="text" placeholder="Temperada"
                                                                            value="{{ $temporada->nombre }}"
                                                                            autocomplete="off" class="form-control"
                                                                            readonly>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Empaque:</label>
                                                                @foreach ($empaques as $empaque)
                                                                    @if ($producto->empaque_id == $empaque->empaque_id)
                                                                        <input type="text" placeholder="Empaque"
                                                                            value="{{ $empaque->nombre }}"
                                                                            autocomplete="off" class="form-control"
                                                                            readonly>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Piezas por
                                                                    @foreach ($empaques as $empaque)
                                                                        @if ($producto->empaque_id == $empaque->empaque_id)
                                                                            {{ $empaque->nombre }}
                                                                        @endif
                                                                    @endforeach:
                                                                </label>
                                                                <input type="text" id="piezas_por_empaque"
                                                                    name="piezas_por_empaque"
                                                                    value="{{ $producto->piezas_por_empaque }}"
                                                                    autocomplete="off" onkeyup="myFunction();"
                                                                    class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                            @foreach ($articulos as $artic)
                                                @if ($artic->articulo_id == $articulo->articulo_id)
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label is-required">Precio de
                                                                    compra por
                                                                    @foreach ($empaques as $empaque)
                                                                        @if ($artic->empaque_id == $empaque->empaque_id)
                                                                            {{ $empaque->nombre }}:
                                                                        @endif
                                                                    @endforeach
                                                                </label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-dollar"></i></span>
                                                                    <input type="text"
                                                                        value="{{ $artic->precio_compra_empaque }}"
                                                                        class="form-control" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label is-required">Precio de
                                                                    venta por
                                                                    @foreach ($empaques as $empaque)
                                                                        @if ($artic->empaque_id == $empaque->empaque_id)
                                                                            {{ $empaque->nombre }}:
                                                                        @endif
                                                                    @endforeach
                                                                </label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-dollar"></i></span>
                                                                    <input type="text" readonly
                                                                        value="{{ $artic->precio_venta_empaque }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Precio de compra por
                                                                    Unidad:
                                                                </label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-dollar"></i></span>
                                                                    <input type="text" readonly class="form-control"
                                                                        value="{{ $artic->precio_compra_unidad }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @foreach ($productos as $producto)
                                                            @if ($producto->piezas_por_empaque != 1)
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label class="control-label is-required">Precio de
                                                                            venta por Unidad:
                                                                        </label>

                                                                        <div class="input-group mar-btm">
                                                                            <span class="input-group-addon"><i
                                                                                    class="fa fa-dollar"></i></span>
                                                                            <input type="text"
                                                                                value="{{ $artic->precio_venta_unidad }}"
                                                                                readonly class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label is-required">Stock
                                                                    minimo:</label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-sort-numeric-asc"></i></span>
                                                                    <input type="text" name="stock_minimo"
                                                                        value="{{ $artic->stock_minimo }}" required
                                                                        pattern="^[0-9]*$" readonly
                                                                        onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                                                        placeholder="Stock minimo" autocomplete="off"
                                                                        maxlength="3" class="form-control">
                                                                    @if ($errors->first('stock_minimo'))
                                                                        <i
                                                                            class="text-danger">{{ $errors->first('stock_minimo') }}</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label is-required">Stock
                                                                    máximo:</label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-sort-numeric-asc"></i></span>
                                                                    <input type="text" name="stock_maximo"
                                                                        value="{{ $artic->stock_maximo }}" required
                                                                        pattern="^[0-9]*$" readonly
                                                                        onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                                                        placeholder="Stock máximo" autocomplete="off"
                                                                        maxlength="5" class="form-control">
                                                                    @if ($errors->first('stock_maximo'))
                                                                        <i
                                                                            class="text-danger">{{ $errors->first('stock_maximo') }}</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label is-required">Inventario
                                                                    inicial en
                                                                    @foreach ($empaques as $empaque)
                                                                        @if ($artic->empaque_id == $empaque->empaque_id)
                                                                            {{ $empaque->nombre }}s
                                                                        @endif
                                                                    @endforeach
                                                                </label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-sort-numeric-asc"></i></span>
                                                                    <input type="text"
                                                                        name="inventario_inicial_empaque"
                                                                        value="{{ $artic->inventario_inicial_empaque }}"
                                                                        readonly
                                                                        onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                                                        placeholder="Inventario inicial"
                                                                        autocomplete="off" maxlength="6"
                                                                        class="form-control"
                                                                        id="inventario_inicial_empaque" required
                                                                        pattern="^[0-9]*$">
                                                                    @if ($errors->first('inventario_inicial_empaque'))
                                                                        <i
                                                                            class="text-danger">{{ $errors->first('inventario_inicial_empaque') }}</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if ($artic->piezas_por_empaque != 1)
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label class="control-label is-required">Inventario
                                                                        inicial en
                                                                        Unidades:
                                                                    </label>

                                                                    <div class="input-group mar-btm">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-sort-numeric-asc"></i></span>
                                                                        <input type="text"
                                                                            name="inventario_inicial_unidad" required
                                                                            value="{{ $artic->inventario_inicial_unidad }}"
                                                                            readonly
                                                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                                                            placeholder="Inventario inicial"
                                                                            autocomplete="off" maxlength="6"
                                                                            pattern="^[0-9]*$" class="form-control">
                                                                        @if ($errors->first('inventario_inicial_unidad'))
                                                                            <i
                                                                                class="text-danger">{{ $errors->first('inventario_inicial_unidad') }}</i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-3" hidden>
                                                                <div class="form-group">
                                                                    <label class="control-label is-required">Inventario
                                                                        inicial en
                                                                        Unidades:
                                                                    </label>

                                                                    <div class="input-group mar-btm">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-sort-numeric-asc"></i></span>
                                                                        <input type="text"
                                                                            name="inventario_inicial_unidad"
                                                                            value="{{ $artic->inventario_inicial_unidad }}"
                                                                            readonly
                                                                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                                                            placeholder="Inventario inicial"
                                                                            autocomplete="off" maxlength="6"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <input type="text" name="sucursal_id"
                                                            value="{{ $usuariologeado->sucursal_id }}" hidden>
                                                    </div>
                                                @endif
                                            @endforeach

                                            <a href="{{ route('articulos.index') }}"
                                                class="text-right fs-6 text-secundario add-tooltip" data-toggle="tooltip"
                                                data-container="body" data-placement="top"
                                                data-original-title="Regresar"><img
                                                    src="{{ asset('assets/img/regresar.jpg') }}" width="34"
                                                    height="34"></a>

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

    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\bootstrap-select\bootstrap-select.min.js') }}"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\chosen\chosen.jquery.min.js') }}"></script>

    <!--noUiSlider [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\noUiSlider\nouislider.min.js') }}"></script>

    <!--Form Component [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\form-component.js') }}"></script>

@endsection
