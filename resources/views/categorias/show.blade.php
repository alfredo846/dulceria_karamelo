@extends('layouts.app')
@section('title', 'Show categoría')

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
                    <p class="text-2x mar-no text-semibold"> Consultar Categoría</p>
                    <p></p>
                </div>
            </div>
        </div><br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading"><br>
                            <h4 class="text-main text-bold mar-no text-center">Categoría</h4>
                        </div>
                        <form class="form-horizontal">
                          
                            <div class="panel-body">

                                <div class="form-group">
                                    <div class="col-sm-3">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold">Nombre:</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nombre" readonly class="form-control" 
                                        id="demo-is-inputnormal" value ="{{ $categoria->nombre}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="demo-is-inputnormal"
                                        class="col-sm-3 control-label text-bold text-semibold">Imagén:</label>
                                    <div class="col-sm-9">
                                       <img class='profile-image-show' src="{{ asset('imagenes/categorias/' . $categoria->imagen) }}" alt="foto">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="panel-footer text-right">
                                <a href="{{ route('categorias.index') }}" class="text-right fs-6 text-secundario"><img
                                        src="{{ asset('assets/img/regresar.jpg') }}" width="30" height="30"></a>
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
