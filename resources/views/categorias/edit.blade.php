@extends('layouts.main')
@section('title', 'Actualizar categoría')

@section('head')

@endsection

@section('content')

    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <br>
        <div class="col-md-12">
            <div class="panel panel-primary panel-colorful media middle pad-all">
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"> Actualizar Categoría</p>
                    <p></p>
                </div>
            </div>
        </div>

        <!--Page content-->
        <div id="page-content">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading"><br>
                            <h4 class="text-main text-bold mar-no text-center">Categoría</h4>
                        </div>
                        <section id="content">
                            <form action="{{ route('categorias.update', $categoria) }}" method="post"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label for="demo-is-inputnormal"
                                            class="col-sm-3 control-label text-bold text-semibold is-required">Nombre:</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="nombre" autocomplete="off" class="form-control"
                                                id="demo-is-inputnormal" value="{{ $categoria->nombre }}" maxlength="40">
                                            @if ($errors->first('nombre'))
                                                <i class="text-danger">{{ $errors->first('nombre') }}</i>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="demo-is-inputnormal"
                                            class="col-sm-3 control-label text-bold text-semibold">Imagén:</label>
                                        <div class="col-sm-9">

                                            <div id="imagePreview">
                                                <img class='fotoperfil'
                                                    src="{{ asset('imagenes/categorias/' . $categoria->imagen) }}"
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

                                </div>

                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <button type="submit">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                               <div class="panel-footer text-left">
                                    <a href="{{ route('categorias.index') }}"
                                        class="text-right fs-6 text-secundario add-tooltip" data-toggle="tooltip"
                                        data-container="body" data-placement="top" data-original-title="Regresar"><img
                                            src="{{ asset('assets/img/regresar.jpg') }}" width="34" height="34"></a>
                                </div>
                            </form>
                        </section>

                    </div>
                </div>
            </div>
        </div>
        <!--End page content-->
    </div>
    <!--END CONTENT CONTAINER-->

@endsection

@section('script')

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

    {{-- input nombre --}}
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
@endsection
