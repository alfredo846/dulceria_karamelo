@extends('layouts.main')
  @section('title', 'Bienvenido')

    @section('head')
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    @endsection

    @section('content')
      <!--CONTENT CONTAINER-->
            <div id="content-container">
                <br>
				     <div class="col-md-12">
					     <div class="panel panel-primary panel-colorful media middle pad-all">
					     <div class="media-body">
					         <p class="text-3x mar-no text-semibold">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
								&nbsp; &nbsp;  Bienvenido </p><p><h4 style="color:white">!HOLA {{ Auth::user()->username }}!</h4></p> 
					     </div>
					 </div>
		   </div>
		   <br><br><br>
                <!--Page content-->
                <div id="page-content">
					
					    <div class="row">
							 <div class="col-md-3">
					            <div class="panel panel-info panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-file-zip icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Productos</p>
					                </div>
					            </div>
					        </div>

					        <div class="col-md-3">
					            <div class="panel panel-mint panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-file-word icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Sucursales</p>
					                </div>
					            </div>
					        </div>
					       
					        <div class="col-md-3">
					            <div class="panel panel-white panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-camera-2 icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Usuarios</p>
					                </div>
					            </div>
					        </div>
					        <div class="col-md-3">
					            <div class="panel panel-primary panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-video icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Ventas</p>
					                </div>
					            </div>
					        </div>
					
					    </div>
					    <div class="row">
							 <div class="col-md-3">
					            <div class="panel panel-info panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-file-zip icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Categorías</p>
					                </div>
					            </div>
					        </div>

					        <div class="col-md-3">
					            <div class="panel panel-mint panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-file-word icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Marcas</p>
					                </div>
					            </div>
					        </div>
					       
					        <div class="col-md-3">
					            <div class="panel panel-white panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-camera-2 icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Temporadas</p>
					                </div>
					            </div>
					        </div>
					        <div class="col-md-3">
					            <div class="panel panel-primary panel-colorful media middle pad-all">
					                <div class="media-left">
					                    <div class="pad-hor">
					                        <i class="demo-pli-video icon-3x"></i>
					                    </div>
					                </div>
					                <div class="media-body">
					                    <p class="text-2x mar-no text-semibold">241</p>
					                    <p class="mar-no">Empaques</p>
					                </div>
					            </div>
					        </div>
					
					    </div>

						<div class="row">
					        <div class="col-lg-12">
					
					            <!--Network Line Chart-->
					            <!--===================================================-->
					            <div id="demo-panel-network" class="panel">
					                <div class="panel-heading">
					                    <div class="panel-control">
					                        <button id="demo-panel-network-refresh" class="btn btn-default btn-active-primary" data-toggle="panel-overlay" data-target="#demo-panel-network"><i class="demo-psi-repeat-2"></i></button>
					                        <div class="dropdown">
					                            <button class="dropdown-toggle btn btn-default btn-active-primary" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical"></i></button>
					                            <ul class="dropdown-menu dropdown-menu-right">
					                                <li><a href="#">Action</a></li>
					                                <li><a href="#">Another action</a></li>
					                                <li><a href="#">Something else here</a></li>
					                                <li class="divider"></li>
					                                <li><a href="#">Separated link</a></li>
					                            </ul>
					                        </div>
					                    </div>
					                    <h3 class="panel-title">Network</h3>
					                </div>
					
					
					                <!--chart placeholder-->
					                <div class="pad-all">
					                    <div id="demo-chart-network" style="height: 255px"></div>
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
					                                <p class="text-muted mar-top">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
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
					        
					    </div>
					
					   
					
					   
					
					
					    
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
    
    @endsection

    @section('scrpt')
	<!--Demo script [ DEMONSTRATION ]-->
    <script src="{{ asset('assets\js\demo\nifty-demo.min.js') }}"></script>

    
    <!--Flot Chart [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\flot-charts\jquery.flot.min.js') }}"></script>
	<script src="{{ asset('assets\plugins\flot-charts\jquery.flot.resize.min.js') }}"></script>
	<script src="{{ asset('assets\plugins\flot-charts\jquery.flot.tooltip.min.js') }}"></script>


    <!--Sparkline [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\sparkline\jquery.sparkline.min.js') }}"></script>


    <!--Specify page [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\dashboard.js') }}"></script>
	@endsection