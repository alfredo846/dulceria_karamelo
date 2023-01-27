@extends('layouts.main')
@section('title', 'Actualizar empaque')

@section('head')

@endsection

@section('content')

    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <br>
        <div class="col-md-12">
            <div class="panel panel-primary panel-colorful media middle pad-all">
                <div class="media-body">
                    <p class="text-2x mar-no text-semibold"> Actualizar Empaque</p>
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
                            <h4 class="text-main text-bold mar-no text-center">Empaque</h4>
                        </div>
                        <section id="content">
                            <form action="{{ route('empaques.update', $empaque) }}" method="post"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label for="demo-is-inputnormal"
                                            class="col-sm-3 control-label text-bold text-semibold is-required">Nombre:</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="nombre" autocomplete="off" class="form-control"
                                                id="demo-is-inputnormal" value="{{ $empaque->nombre }}" maxlength="40">
                                            @if ($errors->first('nombre'))
                                                <i class="text-danger">{{ $errors->first('nombre') }}</i>
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
                                    <a href="{{ route('empaques.index') }}" class="text-right fs-6 text-secundario"><img
                                            src="{{ asset('assets/img/regresar.jpg') }}" width="30" height="30"></a>
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
