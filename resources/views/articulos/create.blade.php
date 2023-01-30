@extends('layouts.main')
@section('title', 'Agregar articulo')

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
                                        <p class="text-2x mar-no text-semibold text-center">Agregar Producto</p>
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
                                    <form action="{{ route('articulos.store') }}" method="post"
                                        enctype="multipart/form-data" name="formulario_01">
                                        @csrf
                                        @method('POST')
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label is-required">Seleccione un
                                                            producto</label>
                                                        <select class="selectpicker" data-live-search="true"
                                                            data-width="100%" name="producto_id" id="productos">
                                                            <option value="">Búsqueda de producto por nombre ó por
                                                                código de
                                                                barras</option>
                                                            @foreach ($productos as $producto)
                                                                @if (old('producto_id') == $producto->producto_id)
                                                                    <option value="{{ $producto->producto_id }}" selected>
                                                                        {{ $producto->codigo_barras }} -
                                                                        {{ $producto->nombre }}
                                                                    @else
                                                                    <option value="{{ $producto->producto_id }}">
                                                                        {{ $producto->codigo_barras }} -
                                                                        {{ $producto->nombre }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->first('producto_id'))
                                                            <i class="text-danger">El campo producto es obligatorio</i>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div id="resultado1">
                                                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
                                                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
                                                    <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
                                                    <br>&nbsp;
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
