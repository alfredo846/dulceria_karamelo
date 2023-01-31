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
        <!--Page content-->
        <div id="page-content">
            <div class="panel">
                <div class="panel-body">
                    <div class="fixed-fluid">
                        <div class="fluid">
                            <div class="panel panel-bordered panel-primary">
                                <div class="panel-heading">
                                    <div class="panel panel-primary panel-colorful media middle pad-all">
                                        <p class="text-2x mar-no text-semibold text-center">Actualizar Producto en
                                            Inventario</p>
                                        <p class="text-2x mar-no text-semibold">Sucursal -
                                            @if ($usuariologeado != '1')
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
                                    <form action="{{ route('articulos.update', $articulo) }}" method="post"
                                        enctype="multipart/form-data" name="formulario_01">
                                        @csrf
                                        @method('PUT')
                                        <div class="panel-body">
                                            @foreach ($productos as $producto)
                                                @if ($producto->producto_id == $articulo->producto_id)
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="col-sm-2">
                                                                <label class="control-label">Imagen:</label>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <img class='profile-image-createarticulo'
                                                                    src="{{ asset('imagenes/productos/' . $producto->imagen) }}"
                                                                    alt="foto">
                                                            </div>
                                                            <div class="col-sm-7 text-right">
                                                                <div class="form-group">
                                                                    <label for="demo-is-inputnormal"
                                                                        class="col-sm-12 control-label text-bold text-semibold is-instruccion">Los
                                                                        campos
                                                                        indicados con * son obligatorios.</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>&nbsp;
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Código de barras:</label>
                                                                <input type="text" name="codigo_barras" maxlength="14"
                                                                    value="{{ $producto->codigo_barras }}"
                                                                    onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                                                    placeholder="Código de barras" autocomplete="off"
                                                                    class="form-control" readonly>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Nombre:</label>
                                                                <input type="text" placeholder="Nombre del producto"
                                                                    value="{{ $producto->nombre }}" autocomplete="off"
                                                                    class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Descripción:</label>
                                                                <input type="text" placeholder="Descripción"
                                                                    value="{{ $producto->descripcion }}" autocomplete="off"
                                                                    class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Categoría:</label>
                                                                @foreach ($categorias as $categoria)
                                                                    @if ($producto->categoria_id == $categoria->categoria_id)
                                                                        <input type="text" placeholder="Categoría"
                                                                            value="{{ $categoria->nombre }}"
                                                                            autocomplete="off" class="form-control"
                                                                            readonly>
                                                                    @endif
                                                                @endforeach
                                                                @foreach ($categoriasd as $categoria)
                                                                    @if ($producto->categoria_id == $categoria->categoria_id)
                                                                        <input type="text" placeholder="Categoría"
                                                                            value="{{ $categoria->nombre }}"
                                                                            autocomplete="off" class="form-control"
                                                                            readonly>
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
                                                                @foreach ($marcasd as $marca)
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
                                                                @foreach ($temporadasd as $temporada)
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
                                                                @foreach ($empaquesd as $empaque)
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



                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label is-required">Precio de compra
                                                                    por
                                                                    @foreach ($empaques as $empaque)
                                                                        @if ($producto->empaque_id == $empaque->empaque_id)
                                                                            {{ $empaque->nombre }}:
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ($empaquesd as $empaque)
                                                                        @if ($producto->empaque_id == $empaque->empaque_id)
                                                                            {{ $empaque->nombre }}:
                                                                        @endif
                                                                    @endforeach
                                                                </label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-dollar"></i></span>
                                                                    <input type="text" name="precio_compra_empaque"
                                                                        maxlength="8" id="precio_compra_empaque"
                                                                        onkeyup="myFunction();"
                                                                       value="{{ $articulo->precio_compra_empaque }}"
                                                                        placeholder="Ejemplo: 99.99" autocomplete="off"
                                                                        class="form-control"
                                                                        onkeypress="return filterFloat(event,this);"
                                                                        required pattern="^[0-9,.]*$">
                                                                    @if ($errors->first('precio_compra_empaque'))
                                                                        <i
                                                                            class="text-danger">{{ $errors->first('precio_compra_empaque') }}</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label is-required">Precio de venta
                                                                    por
                                                                    @foreach ($empaques as $empaque)
                                                                        @if ($producto->empaque_id == $empaque->empaque_id)
                                                                            {{ $empaque->nombre }}:
                                                                        @endif
                                                                    @endforeach
                                                                </label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-dollar"></i></span>
                                                                    <input type="text" name="precio_venta_empaque"
                                                                        maxlength="8" id="precio_venta_empaque"
                                                                        onkeyup="PasarValor();"
                                                                       value="{{ $articulo->precio_venta_empaque }}"
                                                                        placeholder="Ejemplo: 99.99" autocomplete="off"
                                                                        class="form-control"
                                                                        onkeypress="return filterFloat(event,this);"
                                                                        required pattern="^[0-9,.]*$">
                                                                    @if ($errors->first('precio_venta_empaque'))
                                                                        <i
                                                                            class="text-danger">{{ $errors->first('precio_venta_empaque') }}</i>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label class="control-label">Precio de compra por Unidad:
                                                                </label>

                                                                <div class="input-group mar-btm">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-dollar"></i></span>
                                                                    <input type="text" name="precio_compra_unidad"
                                                                        maxlength="8" id="precio_compra_unidad" readonly
                                                                        autocomplete="off" class="form-control"
                                                                        pattern="^[0-9,.]*$"
                                                                        onkeypress="return filterFloat(event,this);">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if ($producto->piezas_por_empaque != 1)
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label class="control-label is-required">Precio de
                                                                        venta por Unidad:
                                                                    </label>

                                                                    <div class="input-group mar-btm">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-dollar"></i></span>
                                                                        <input type="text" name="precio_venta_unidad"
                                                                            maxlength="8" required pattern="^[0-9,.]*$"
                                                                            value="{{ old('precio_venta_unidad') }}"
                                                                            placeholder="Ejemplo: 99.99"
                                                                            autocomplete="off" class="form-control"
                                                                            onkeypress="return filterFloat(event,this);">
                                                                        @if ($errors->first('precio_venta_unidad'))
                                                                            <i
                                                                                class="text-danger">{{ $errors->first('precio_venta_unidad') }}</i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-3" hidden>
                                                                <div class="form-group">
                                                                    <label class="control-label is-required">Precio de
                                                                        venta por Unidad:
                                                                    </label>

                                                                    <div class="input-group mar-btm">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-dollar"></i></span>
                                                                        <input type="text" name="precio_venta_unidad"
                                                                            maxlength="8" id="precio_venta_unidad"
                                                                            value="{{ old('precio_venta_unidad') }}"
                                                                            placeholder="Ejemplo: 99.99"
                                                                            autocomplete="off" class="form-control"
                                                                            onkeypress="return filterFloat(event,this);">
                                                                        @if ($errors->first('precio_venta_unidad'))
                                                                            <i
                                                                                class="text-danger">{{ $errors->first('precio_venta_unidad') }}</i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                @endif
                                            @endforeach
                                        </div>



                                    </form>
                                    <a href="{{ route('articulos.index') }}"
                                        class="text-right fs-6 text-secundario add-tooltip" data-toggle="tooltip"
                                        data-container="body" data-placement="top" data-original-title="Regresar"><img
                                            src="{{ asset('assets/img/regresar.jpg') }}" width="34"
                                            height="34"></a>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $("#productos").change(function() {
                var valproducto = $("#productos").val();
                if (valproducto != "") {
                    $("#resultado1").load("{{ route('datos1') }}?id=" + valproducto).serialize();
                } else {
                    $("#resultad+1").text("----");
                }
            });
        });
    </script>


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
