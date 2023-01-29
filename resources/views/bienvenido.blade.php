@extends('layouts.main')
@section('title', 'Bienvenido')

@section('head')

    <!--DataTables [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\datatables\media\css\dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets\plugins\datatables\extensions\Responsive\css\responsive.dataTables.min.css') }}"
        rel="stylesheet">

    <!--Ion Icons [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\ionicons\css\ionicons.min.css') }}" rel="stylesheet">

@endsection

@section('content')
    <!--CONTENT CONTAINER-->
    <div id="content-container">
        <br>
        <div class="col-md-12">
            <div class="panel panel-primary panel-colorful media middle pad-all">
                <div class="media-body">
                    <p class="text-2x text-center mar-no text-semibold">Bienvenido a tu sucursal - 
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
                    <p class="text-1x mar-no text-semibold"> ¡Hola {{ Auth::user()->username }} !</p>
                </div>
            </div>
        </div>
        <br><br><br>

        <!--Page content-->
        <div id="page-content">
            <div class="row">

                <div class="col-md-3">
                    <div class="panel panel-mint panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="fa fa-bandcamp fa-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">{{ $categoria }}</p>
                            <p class="mar-no">Categorias</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-info panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="fa fa-ravelry fa-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">{{ $temporada }}</p>
                            <p class="mar-no">Temporadas</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="panel panel-success panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="fa fa-superpowers fa-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">{{ $marca }}</p>
                            <p class="mar-no">Marcas</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="panel panel-primary panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="fa fa-archive fa-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">{{ $empaque }}</p>
                            <p class="mar-no">Empaques</p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-lg-7">
                    <!--Network Line Chart-->
                    <!--===================================================-->
                    <div id="demo-panel-network" class="panel">
                        <div class="panel-heading">
                            <div class="panel-control">
                                <button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary"
                                    data-toggle="panel-overlay" data-target="#demo-panel-network"><i
                                        class="demo-psi-repeat-2"></i></button>
                                <div class="dropdown">
                                    <button class="dropdown-toggle btn btn-default btn-active-primary"
                                        data-toggle="dropdown" aria-expanded="false"><i
                                            class="demo-psi-dot-vertical"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h3 class="panel-title">Ventas</h3>
                        </div>


                        <!--chart placeholder-->
                        <div class="pad-all">
                            <div id="demo-chart-network" style="height: 200px"></div>
                        </div>


                        <!--Chart information-->
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-8">
                                    <p class="text-semibold text-uppercase text-main">CPU Temperature</p>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="media">
                                                <div class="media-left">
                                                    <span class="text-3x text-thin text-main">43.7</span>
                                                </div>
                                                <div class="media-body">
                                                    <p class="mar-no">°C</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-7 text-sm">
                                            <p>
                                                <span>Min Values</span>
                                                <span class="pad-lft text-semibold">
                                                    <span class="text-lg">27°</span>
                                                    <span class="labellabel-success mar-lft">
                                                        <i class="pci-caret-down text-success"></i>
                                                        <smal>- 20</smal>
                                                    </span>
                                                </span>
                                            </p>
                                            <p>
                                                <span>Max Values</span>
                                                <span class="pad-lft text-semibold">
                                                    <span class="text-lg">69°</span>
                                                    <span class="labellabel-danger mar-lft">
                                                        <i class="pci-caret-up text-danger"></i>
                                                        <smal>+ 57</smal>
                                                    </span>
                                                </span>
                                            </p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="pad-rgt">
                                        <p class="text-semibold text-uppercase text-main">Today Tips</p>
                                        <p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                            elit, sed diam nonummy nibh euismod tincidunt.</p>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <p class="text-uppercase text-semibold text-main">Bandwidth Usage</p>
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="media pad-btm">
                                                <div class="media-left">
                                                    <span class="text-2x text-thin text-main">754.9</span>
                                                </div>
                                                <div class="media-body">
                                                    <p class="mar-no">Mbps</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="pad-btm">
                                            <div class="clearfix">
                                                <p class="pull-left mar-no">Income</p>
                                                <p class="pull-right mar-no">70%</p>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar progress-bar-info" style="width: 70%;">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="clearfix">
                                                <p class="pull-left mar-no">Outcome</p>
                                                <p class="pull-right mar-no">10%</p>
                                            </div>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar progress-bar-primary" style="width: 10%;">
                                                    <span class="sr-only">10% Complete</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--===================================================-->
                    <!--End network line chart-->
                </div>
                <div class="col-lg-5">

                    <div class="col-sm-6 col-lg-6">
                        <div class="panel panel-mint panel-colorful">
                            <div class="pad-all text-center">
                                <span class="text-3x text-thin">{{ $sucursal }}</span>
                                <p>Sucursales</p>
                                <i class="fa fa-institution fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="panel panel-info panel-colorful">
                            <div class="pad-all text-center">
                                <span class="text-3x text-thin">{{ $producto }}</span>
                                <p>Productos</p>
                                <i class="fa fa-star fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="panel panel-success panel-colorful">
                            <div class="pad-all text-center">
                                <span class="text-3x text-thin">0</span>
                                <p>Ventas</p>
                                <i class="fa fa-shopping-bag fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="panel panel-primary panel-colorful">
                            <div class="pad-all text-center">
                                <span class="text-3x text-thin">{{ $usuario }}</span>
                                <p>Usuarios</p>
                                <i class="fa fa-user-circle-o fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="panel panel-mint panel-colorful">
                            <div class="pad-all text-center">
                                <span class="text-3x text-thin">0</span>
                                <p>Compras</p>
                                <i class="fa fa-cc-diners-club fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="panel panel-info panel-colorful">
                            <div class="pad-all text-center">
                                <span class="text-3x text-thin">0</span>
                                <p>Articulos caducados</p>
                                <i class="fa fa-hand-stop-o fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Order Status</h3>
                        </div>

                        <!--Data Table-->
                        <!--===================================================-->
                        <div class="panel-body">
                            <div class="pad-btm form-inline">
                                <div class="row">
                                    <div class="col-sm-6 table-toolbar-left">
                                        <button class="btn btn-purple"><i class="demo-pli-add icon-fw"></i>Add</button>
                                        <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-default"><i
                                                    class="demo-pli-information icon-lg"></i></button>
                                            <button class="btn btn-default"><i
                                                    class="demo-pli-trash icon-lg"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 table-toolbar-right">
                                        <div class="form-group">
                                            <input type="text" autocomplete="off" class="form-control"
                                                placeholder="Search" id="demo-input-search2">
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-default"><i
                                                    class="demo-pli-download-from-cloud icon-lg"></i></button>
                                            <div class="btn-group dropdown">
                                                <button class="btn btn-default btn-active-primary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                    <i class="demo-pli-dot-vertical icon-lg"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>User</th>
                                            <th>Order date</th>
                                            <th>Amount</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Tracking Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#" class="btn-link"> Order #53431</a></td>
                                            <td>Steve N. Horton</td>
                                            <td><span class="text-muted">Oct 22, 2014</span></td>
                                            <td>$45.00</td>
                                            <td class="text-center">
                                                <div class="label label-table label-success">Paid</div>
                                            </td>
                                            <td class="text-center">-</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="btn-link"> Order #53432</a></td>
                                            <td>Charles S Boyle</td>
                                            <td><span class="text-muted">Oct 24, 2014</span></td>
                                            <td>$245.30</td>
                                            <td class="text-center">
                                                <div class="label label-table label-info">Shipped</div>
                                            </td>
                                            <td class="text-center">CGX0089734531</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="btn-link"> Order #53433</a></td>
                                            <td>Lucy Doe</td>
                                            <td><span class="text-muted">Oct 24, 2014</span></td>
                                            <td>$38.00</td>
                                            <td class="text-center">
                                                <div class="label label-table label-info">Shipped</div>
                                            </td>
                                            <td class="text-center">CGX0089934571</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="btn-link"> Order #53434</a></td>
                                            <td>Teresa L. Doe</td>
                                            <td><span class="text-muted">Oct 15, 2014</span></td>
                                            <td>$77.99</td>
                                            <td class="text-center">
                                                <div class="label label-table label-info">Shipped</div>
                                            </td>
                                            <td class="text-center">CGX0089734574</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="btn-link"> Order #53435</a></td>
                                            <td>Teresa L. Doe</td>
                                            <td><span class="text-muted">Oct 12, 2014</span></td>
                                            <td>$18.00</td>
                                            <td class="text-center">
                                                <div class="label label-table label-success">Paid</div>
                                            </td>
                                            <td class="text-center">-</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="btn-link">Order #53437</a></td>
                                            <td>Charles S Boyle</td>
                                            <td><span class="text-muted">Oct 17, 2014</span></td>
                                            <td>$658.00</td>
                                            <td class="text-center">
                                                <div class="label label-table label-danger">Refunded</div>
                                            </td>
                                            <td class="text-center">-</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="btn-link">Order #536584</a></td>
                                            <td>Scott S. Calabrese</td>
                                            <td><span class="text-muted">Oct 19, 2014</span></td>
                                            <td>$45.58</td>
                                            <td class="text-center">
                                                <div class="label label-table label-warning">Unpaid</div>
                                            </td>
                                            <td class="text-center">-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr class="new-section-xs">
                            <div class="pull-right">
                                <ul class="pagination text-nowrap mar-no">
                                    <li class="page-pre disabled">
                                        <a href="#">&lt;</a>
                                    </li>
                                    <li class="page-number active">
                                        <span>1</span>
                                    </li>
                                    <li class="page-number">
                                        <a href="#">2</a>
                                    </li>
                                    <li class="page-number">
                                        <a href="#">3</a>
                                    </li>
                                    <li>
                                        <span>...</span>
                                    </li>
                                    <li class="page-number">
                                        <a href="#">9</a>
                                    </li>
                                    <li class="page-next">
                                        <a href="#">&gt;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--===================================================-->
                        <!--End Data Table-->

                    </div>
                </div>
            </div>



        </div>
        <!--End page content-->

    </div>
    <!--END CONTENT CONTAINER-->
@endsection


@section('script')

    <!--Icons [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\icons.js') }}"></script>
    <script src="{{ asset('assets\js\sweetalert2@11.js') }}"></script>

    <!--Flot Chart [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\flot-charts\jquery.flot.min.js') }}"></script>
    <script src="{{ asset('assets\plugins\flot-charts\jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('assets\plugins\flot-charts\jquery.flot.tooltip.min.js') }}"></script>


    <!--Sparkline [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\sparkline\jquery.sparkline.min.js') }}"></script>

    <!--Specify page [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\dashboard.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".content").fadeOut(1500);
            }, 3000);
        });
    </script>

    @if (session('passwordincorrecto') == 'ok')
        <script>
            Swal.fire({
                icon: 'error',
                text: '¡El campo contraseña es obligatorio y/o la confirmación de contraseña no coinciden!',
            })
        </script>
    @endif

    @if (session('fotoincorrecto') == 'ok')
        <script>
            Swal.fire({
                icon: 'error',
                text: '¡La imagén no debe exceder los 2 Mb y solo acepta imágenes con extensiones jpeg, jpg, png, jfif !',
            })
        </script>
    @endif
@endsection
