@foreach ($productos as $producto)
    @if ($producto->producto_id == $id)
        <div class="col-sm-6">
            <div class="col-sm-2">
                <label class="control-label">Imagen:</label>
            </div>
            <div class="col-sm-3">
                <img class='profile-image-createarticulo' src="{{ asset('imagenes/productos/' . $producto->imagen) }}"
                    alt="foto">
            </div>
            <div class="col-sm-7 text-right">
                <div class="form-group">
                    <label for="demo-is-inputnormal"
                        class="col-sm-12 control-label text-bold text-semibold is-instruccion">Los campos
                        indicados con * son obligatorios.</label>
                </div>
            </div>
        </div>
        </div><br>&nbsp;
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Código de barras:</label>
                    <input type="text" name="codigo_barras" maxlength="14" value="{{ $producto->codigo_barras }}"
                        onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                        placeholder="Código de barras" autocomplete="off" class="form-control" readonly>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Nombre:</label>
                    <input type="text" placeholder="Nombre del producto" value="{{ $producto->nombre }}"
                        autocomplete="off" class="form-control" readonly>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Descripción:</label>
                    <input type="text" placeholder="Descripción" value="{{ $producto->descripcion }}"
                        autocomplete="off" class="form-control" readonly>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Categoría:</label>
                    @foreach ($categorias as $categoria)
                        @if ($producto->categoria_id == $categoria->categoria_id)
                            <input type="text" placeholder="Categoría" value="{{ $categoria->nombre }}"
                                autocomplete="off" class="form-control" readonly>
                        @endif
                    @endforeach
                    @foreach ($categoriasd as $categoria)
                        @if ($producto->categoria_id == $categoria->categoria_id)
                            <input type="text" placeholder="Categoría" value="{{ $categoria->nombre }}"
                                autocomplete="off" class="form-control" readonly>
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
                            <input type="text" placeholder="Marca" value="{{ $marca->nombre }}" autocomplete="off"
                                class="form-control" readonly>
                        @endif
                    @endforeach
                    @foreach ($marcasd as $marca)
                        @if ($producto->marca_id == $marca->marca_id)
                            <input type="text" placeholder="Marca" value="{{ $marca->nombre }}" autocomplete="off"
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
                            <input type="text" placeholder="Temperada" value="{{ $temporada->nombre }}"
                                autocomplete="off" class="form-control" readonly>
                        @endif
                    @endforeach
                    @foreach ($temporadasd as $temporada)
                        @if ($producto->temporada_id == $temporada->temporada_id)
                            <input type="text" placeholder="Temperada" value="{{ $temporada->nombre }}"
                                autocomplete="off" class="form-control" readonly>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Empaque:</label>
                    @foreach ($empaques as $empaque)
                        @if ($producto->empaque_id == $empaque->empaque_id)
                            <input type="text" placeholder="Empaque" value="{{ $empaque->nombre }}"
                                autocomplete="off" class="form-control" readonly>
                        @endif
                    @endforeach
                    @foreach ($empaquesd as $empaque)
                        @if ($producto->empaque_id == $empaque->empaque_id)
                            <input type="text" placeholder="Empaque" value="{{ $empaque->nombre }}"
                                autocomplete="off" class="form-control" readonly>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Piezas por
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
                    <input type="text" id="piezas_por_empaque" name="piezas_por_empaque"
                        value="{{ $producto->piezas_por_empaque }}" autocomplete="off" onkeyup="myFunction();"
                        class="form-control" readonly>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label is-required">Precio de compra por
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
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="text" name="precio_compra_empaque" maxlength="8" id="precio_compra_empaque"
                            onkeyup="myFunction();" value="{{ old('precio_compra_empaque') }}"
                            placeholder="Ejemplo: 99.99" autocomplete="off" class="form-control"
                            onkeypress="return filterFloat(event,this);" required pattern="^[0-9,.]*$">
                        @if ($errors->first('precio_compra_empaque'))
                            <i class="text-danger">{{ $errors->first('precio_compra_empaque') }}</i>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label is-required">Precio de venta por
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
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="text" name="precio_venta_empaque" maxlength="8" id="precio_venta_empaque"
                            onkeyup="PasarValor();" value="{{ old('precio_venta_empaque') }}"
                            placeholder="Ejemplo: 99.99" autocomplete="off" class="form-control"
                            onkeypress="return filterFloat(event,this);" required pattern="^[0-9,.]*$">
                        @if ($errors->first('precio_venta_empaque'))
                            <i class="text-danger">{{ $errors->first('precio_venta_empaque') }}</i>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label">Precio de compra por Unidad:
                    </label>

                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="text" name="precio_compra_unidad" maxlength="8" id="precio_compra_unidad"
                            readonly autocomplete="off" class="form-control" pattern="^[0-9,.]*$"
                            onkeypress="return filterFloat(event,this);">
                    </div>
                </div>
            </div>

            @if ($producto->piezas_por_empaque != 1)
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label is-required">Precio de venta por Unidad:
                        </label>

                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <input type="text" name="precio_venta_unidad" maxlength="8" required
                                pattern="^[0-9,.]*$" value="{{ old('precio_venta_unidad') }}"
                                placeholder="Ejemplo: 99.99" autocomplete="off" class="form-control"
                                onkeypress="return filterFloat(event,this);">
                            @if ($errors->first('precio_venta_unidad'))
                                <i class="text-danger">{{ $errors->first('precio_venta_unidad') }}</i>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="col-sm-3" hidden>
                    <div class="form-group">
                        <label class="control-label is-required">Precio de venta por Unidad:
                        </label>

                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <input type="text" name="precio_venta_unidad" maxlength="8" id="precio_venta_unidad"
                                value="{{ old('precio_venta_unidad') }}" placeholder="Ejemplo: 99.99"
                                autocomplete="off" class="form-control" onkeypress="return filterFloat(event,this);">
                            @if ($errors->first('precio_venta_unidad'))
                                <i class="text-danger">{{ $errors->first('precio_venta_unidad') }}</i>
                            @endif
                        </div>
                    </div>
                </div>
            @endif



        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label is-required">Stock minimo:</label>

                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                        <input type="text" name="stock_minimo" value="{{ old('stock_minimo') }}" required
                            pattern="^[0-9]*$"
                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                            placeholder="Stock minimo" autocomplete="off" maxlength="3" class="form-control">
                        @if ($errors->first('stock_minimo'))
                            <i class="text-danger">{{ $errors->first('stock_minimo') }}</i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label is-required">Stock máximo:</label>

                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                        <input type="text" name="stock_maximo" value="{{ old('stock_maximo') }}" required
                            pattern="^[0-9]*$"
                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                            placeholder="Stock máximo" autocomplete="off" maxlength="5" class="form-control">
                        @if ($errors->first('stock_maximo'))
                            <i class="text-danger">{{ $errors->first('stock_maximo') }}</i>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label class="control-label is-required">Inventario inicial en
                        @foreach ($empaques as $empaque)
                            @if ($producto->empaque_id == $empaque->empaque_id)
                                {{ $empaque->nombre }}s
                            @endif
                        @endforeach
                    </label>

                    <div class="input-group mar-btm">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                        <input type="text" name="inventario_inicial_empaque"
                            value="{{ old('inventario_inicial_empaque') }}"
                            onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                            placeholder="Inventario inicial" autocomplete="off" maxlength="6" class="form-control"
                            id="inventario_inicial_empaque" required pattern="^[0-9]*$">
                        @if ($errors->first('inventario_inicial_empaque'))
                            <i class="text-danger">{{ $errors->first('inventario_inicial_empaque') }}</i>
                        @endif
                    </div>
                </div>
            </div>

            @if ($producto->piezas_por_empaque != 1)
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="control-label is-required">Inventario inicial en Unidades:
                        </label>

                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                            <input type="text" name="inventario_inicial_unidad"
                                value="{{ old('stock_eunidad') }}" required
                                onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                placeholder="Inventario inicial" autocomplete="off" maxlength="6"
                                pattern="^[0-9]*$" class="form-control">
                            @if ($errors->first('inventario_inicial_unidad'))
                                <i class="text-danger">{{ $errors->first('inventario_inicial_unidad') }}</i>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="col-sm-3" hidden>
                    <div class="form-group">
                        <label class="control-label is-required">Inventario inicial en Unidades:
                        </label>

                        <div class="input-group mar-btm">
                            <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                            <input type="text" name="inventario_inicial_unidad" value="0"
                                onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;"
                                placeholder="Inventario inicial" autocomplete="off" maxlength="6"
                                class="form-control">
                        </div>
                    </div>
                </div>
            @endif

            <input type="text" name="sucursal_id" value="{{ $usuariologeado->sucursal_id }}" hidden>
        </div>
    @endif
@endforeach
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <button class="buttonp" type="submit">Guardar</button>
    </div>
</div><br>&nbsp;
<a href="{{ route('articulos.index') }}" class="text-right fs-6 text-secundario add-tooltip" data-toggle="tooltip"
    data-container="body" data-placement="top" data-original-title="Regresar"><img
        src="{{ asset('assets/img/regresar.jpg') }}" width="34" height="34"></a>

<script type="text/javascript">
    function filterFloat(evt, input) {
        // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
        var key = window.Event ? evt.which : evt.keyCode;
        var chark = String.fromCharCode(key);
        var tempValue = input.value + chark;
        if (key >= 48 && key <= 57) {
            if (filter(tempValue) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            if (key == 8 || key == 13 || key == 0) {
                return true;
            } else if (key == 46) {
                if (filter(tempValue) === false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    function filter(__val__) {
        var preg = /^([0-9]+\.?[0-9]{0,2})$/;
        if (preg.test(__val__) === true) {
            return true;
        } else {
            return false;
        }

    }
</script>




{{-- Precio de compra por unidad --}}
<script type="text/JavaScript">
    function myFunction() 
    {
    var precio = document.getElementById("precio_compra_empaque").value;
    var piezas = document.getElementById("piezas_por_empaque").value;
    var datos = precio /piezas;
    document.formulario_01.precio_compra_unidad.value = datos;
    // alert(datos);
    // document.getElementById("aux").innerHTML = datos;
   }
   </script>


<script type="text/JavaScript">
    function PasarValor()
     {
      document.getElementById("precio_venta_unidad").value = document.getElementById("precio_venta_empaque").value;
     }
</script>
