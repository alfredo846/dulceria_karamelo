@extends('layouts.app')
  @section('title', 'Consultas')

    @section('head')
     <!--DataTables [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\datatables\media\css\dataTables.bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('assets\plugins\datatables\extensions\Responsive\css\responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\ionicons\css\ionicons.min.css') }}" rel="stylesheet">

	<style>
    table th{
        background-color: #f1f2f7 !important;
        color: #121f3e;
        font-size: 15px;
    }
    table tr{
        border: inset 0pt !important;
        font-size: 14px;
        cursor:pointer:
    }

 	</style>
	@endsection

    @section('content')
     <!--CONTENT CONTAINER-->
            <div id="content-container">
                <div id="page-head">
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Marcas</h1>
                    </div>
                </div>

                <!--Page content-->
                <div id="page-content">
                    
					<!-- Basic Data Tables -->
					<!--===================================================-->
					<div class="panel">
					   	 <div class="panel-heading">
							<button class="btn btn-success"><i class="ion-plus-circled lg"></i> Agregar nueva marca</button>
					    </div>
					    <div class="panel-body">
					        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
					            <thead>
					                <tr>
					                    <th>Nombre</th>
					                    <th>Descripción</th>
					                    <th class="min-tablet">Estado</th>
					                    <th class="min-tablet">Opciones</th>
					                </tr>
					            </thead>
					            <tbody>
					                <tr>
					                    <td>Tiger Nixon</td>
					                    <td>System Architect</td>
					                    <td>Edinburgh</td>
					                    <td>	
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-success btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="demo-psi-recycling icon-sm"></i></button>
										</td>
					                </tr>
					                <tr>
					                    <td>Garrett Winters</td>
					                    <td>Accountant</td>
					                    <td>Tokyo</td>
					                     <td>
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
										</td>
					                </tr>
									 <tr>
					                    <td>Tiger Nixon</td>
					                    <td>System Architect</td>
					                    <td>Edinburgh</td>
					                    <td>	
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-success btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="demo-psi-recycling icon-sm"></i></button>
										</td>
					                </tr>
					                <tr>
					                    <td>Garrett Winters</td>
					                    <td>Accountant</td>
					                    <td>Tokyo</td>
					                     <td>
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
										</td>
					                </tr>
									 <tr>
					                    <td>Tiger Nixon</td>
					                    <td>System Architect</td>
					                    <td>Edinburgh</td>
					                    <td>	
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-success btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="demo-psi-recycling icon-sm"></i></button>
										</td>
					                </tr>
					                <tr>
					                    <td>Garrett Winters</td>
					                    <td>Accountant</td>
					                    <td>Tokyo</td>
					                     <td>
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
										</td>
					                </tr>
									 <tr>
					                    <td>Tiger Nixon</td>
					                    <td>System Architect</td>
					                    <td>Edinburgh</td>
					                    <td>	
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-success btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="demo-psi-recycling icon-sm"></i></button>
										</td>
					                </tr>
					                <tr>
					                    <td>Garrett Winters</td>
					                    <td>Accountant</td>
					                    <td>Tokyo</td>
					                     <td>
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
										</td>
					                </tr>
									 <tr>
					                    <td>Tiger Nixon</td>
					                    <td>System Architect</td>
					                    <td>Edinburgh</td>
					                    <td>	
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-success btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="demo-psi-recycling icon-sm"></i></button>
										</td>
					                </tr>
					                <tr>
					                    <td>Garrett Winters</td>
					                    <td>Accountant</td>
					                    <td>Tokyo</td>
					                     <td>
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
										</td>
					                </tr>
									 <tr>
					                    <td>Tiger Nixon</td>
					                    <td>System Architect</td>
					                    <td>Edinburgh</td>
					                    <td>	
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-success btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="demo-psi-recycling icon-sm"></i></button>
										</td>
					                </tr>
					                <tr>
					                    <td>Garrett Winters</td>
					                    <td>Accountant</td>
					                    <td>Tokyo</td>
					                     <td>
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i></button>
											<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											<button class="btn btn-sm btn-danger btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
										</td>
					                </tr>
					               
					               
					            </tbody>
					        </table>
					    </div>
					</div>
					<!--===================================================-->
					<!-- End Striped Table -->
				
                </div>
                <!--End page content-->

            </div>
            <!--END CONTENT CONTAINER-->
    @endsection
    

    @section('script')
      <!--DataTables [ OPTIONAL ]-->
    <script src="{{ asset('assets\plugins\datatables\media\js\jquery.dataTables.js') }}"></script>
	<script src="{{ asset('assets\plugins\datatables\media\js\dataTables.bootstrap.js') }}"></script>
	<script src="{{ asset('assets\plugins\datatables\extensions\Responsive\js\dataTables.responsive.min.js') }}"></script>


    <!--DataTables Sample [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\tables-datatables.js') }}"></script>
    <script src="{{ asset('assets\js\demo\ui-buttons.js') }}"></script>

	 <!--Icons [ SAMPLE ]-->
    <script src="{{ asset('assets\js\demo\icons.js') }}"></script>
    @endsection