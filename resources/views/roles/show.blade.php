@extends('layouts.main')
@section('title', 'Consultar rol')

@section('head')

@endsection

@section('content')

    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <br>
        <div class="col-md-12">
            <div class="panel panel-primary panel-colorful media middle pad-all">
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"> Consultar Rol</p>
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
                            <h4 class="text-main text-bold mar-no text-center">Rol</h4>
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
                                        id="demo-is-inputnormal" value ="{{ $role->nombre}}">
                                    </div>
                                </div>

                            </div>

                            <div class="panel-footer text-left">
                                <a href="{{ route('roles.index') }}" class="text-right fs-6 text-secundario"><img
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
  
@endsection
