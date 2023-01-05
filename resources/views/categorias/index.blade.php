@extends('layouts.app')
  @section('title', 'Categoría')

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
		color: #121f3e !important;
        cursor:pointer;
    }

	
 	</style>
	@endsection

    @section('content')
     <!--CONTENT CONTAINER-->
            <div id="content-container">
                <br>
				     <div class="col-md-12">
					     <div class="panel panel-info panel-colorful media middle pad-all" style="background-color:#783449">
					     <div class="media-body">
					         <p class="text-2x mar-no text-semibold">Categorías</p><p></p>
					     </div>
					 </div>
		   </div>
		   <br><br><br>
		   
                <!--Page content-->
                <div id="page-content">
                    
					<!-- Basic Data Tables -->
					<div class="panel">

						<div class="content">
							@include('layouts.partials.alerts')
						</div>

					   	 <div class="panel-heading">
							<a href="{{ route('categorias.create') }}"> <button class="btn btn-success"><i class="ion-plus-circled lg"></i> Agregar nueva categoría</button></a>
					    </div>
					    <div class="panel-body">
					        <table id="marcas" class="table table-striped table-bordered" cellspacing="0" width="100%">
					            <thead>
					                <tr>
					                    <th>Nombre</th>
					                    <th class="min-tablet">Estado</th>
					                    <th class="min-tablet">Acciones</th>
					                </tr>
					            </thead>
					            <tbody>

                                    @foreach($categorias as $categoria)
					                <tr>
					                    <td>{{ $categoria->nombre }}</td>
					                    <td>activo</td>
					                    <td>	
											<button class="btn btn-sm btn-info btn-icon"><i class="ion-eye icon-lg"></i>
											</button>
											
											<a href="{{ route('categorias.edit',$categoria) }}">
												<button class="btn btn-sm btn-primary btn-icon"><i class="demo-psi-pen-5 icon-sm"></i></button>
											</a>
											
											<button class="btn btn-sm btn-success btn-icon"><i class="ion-toggle-filled icon-lg"></i></button>
											
											<form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display: inline-block" >
												@csrf
												@method('DELETE')
											<button type="submit" class="btn btn-sm btn-danger btn-icon"><i class="demo-psi-recycling icon-sm"></i></button>
											</form>
									    </td>
					                </tr>
                                    @endforeach
					               
					               
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

	  <script type="text/javascript">
         $(document).ready(function() {
             $('#demo-dt-basic').DataTable({
            language:{
                url:"{{ asset('assets/js/spanish.json') }}"
            }
        });
            } );


			$(document).ready(function() {
   			 $('#marcas').DataTable( {
    	    "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de  _MAX_ registros totales)",
			'search': 'Buscar:',
			'paginate': {
				'next': 'Siguiente',
				'previous': 'Anterior'
			}
       		 }
    		} );
			} );
     </script>

		<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				$(".content").fadeOut(1500);
			},3000);
		});
		</script>
    @endsection