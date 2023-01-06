@extends('layouts.app')
  @section('title', 'Edit categoría')

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

    @endsection

    @section('content')

    <!--CONTENT CONTAINER-->
            <div id="content-container">
                <br>
				     <div class="col-md-12">
					     <div class="panel panel-info panel-colorful media middle pad-all" style="background-color:#783449">
					     <div class="media-body">
					         <p class="text-2x mar-no text-semibold"> Actualizar Categoría</p><p></p>
					     </div>
					 </div>
		    </div><br><br><br>

                <!--Page content-->
                <div id="page-content">
					<div class="row">
					    <div class="col-lg-3"></div>
					    <div class="col-lg-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Categoría</h3>
					            </div>
                                 <form action="{{ route('categorias.update', $categoria) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                         @csrf
                                        @method('PUT')
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="demo-is-inputnormal" class="col-sm-3 control-label text-bold text-semibold">Nombre:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="nombre" value="{{ $categoria->nombre }}"placeholder="Nombre categoría" autocomplete="off" class="form-control" id="demo-is-inputnormal">
                                                        @if($errors->first('nombre'))
                                                            <i class="text-danger">{{ $errors->first('nombre') }}</i>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>

                                            <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-9 col-sm-offset-3">
                                                    <button class="btn btn-success" type="submit">Actualizar</button>
                                                    <button class="btn btn-primary" type="reset">Reiniciar</button>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer text-right">
                                                <a title="Regresar" href="{{ route('categorias.index') }}" class="text-right fs-6 text-secundario"><img src="{{ asset('assets/img/regresar.jpg')}}" width="30" height="30"></a>
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
    @endsection