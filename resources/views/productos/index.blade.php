@extends('layouts.app')
  @section('title', 'Producto')

    @section('head')
     <!--DataTables [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\datatables\media\css\dataTables.bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('assets\plugins\datatables\extensions\Responsive\css\responsive.dataTables.min.css') }}" rel="stylesheet">
    
	<!--Ion Icons [ OPTIONAL ]-->
    <link href="{{ asset('assets\plugins\ionicons\css\ionicons.min.css') }}" rel="stylesheet">

	
	@endsection

    @section('content')
     <!--CONTENT CONTAINER-->
            <div id="content-container">
                <br>
				     <div class="col-md-12">
					     <div class="panel panel-info panel-colorful media middle pad-all" style="background-color:#783449">
					     <div class="media-body">
					         <p class="text-2x mar-no text-semibold">Productos</p><p></p>
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

					   	<div class="panel-heading demo-icon"> 
						<br>&nbsp;	
						<a href="{{ route('productos.papelera') }}">
							<button id="deleteItem" type="submit" class="btn btn-circle btn-danger btn-icon add-tooltip"
							data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Papelera"><i class="demo-psi-recycling icon-lg"></i></button>
						</a>
						<a href="{{ route('productos.export') }}">
						<button id="deleteItem" type="submit" class="btn btn-circle btn-success btn-icon add-tooltip"
							data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Exportar"><i class="fa fa-file-excel-o fa-lg"></i></button>
						</a>
							<a href="{{ route('productos.create') }}"> <button class="btn btn-success"><i class="ion-plus-circled lg"></i> Agregar nueva producto</button></a>
					    </div><br>
					    <div class="panel-body">
					        <table id="productos" class="table table-striped table-bordered" cellspacing="0" width="100%">
					            <thead>
					                <tr>
					                    <th>Nombre</th>
					                    <th>Imagén</th>
					                    <th class="min-tablet">Estado</th>
					                    <th class="min-tablet">Acciones</th>
					                </tr>
					            </thead>
					            <tbody>

                                    @foreach($productos as $producto)
					                <tr>
					                    <td>{{ $producto->descripcion }}</td>
					                    <td><img class='profile-image' src="{{ asset('imagenes/productos/' . $producto->imagen) }}" alt="foto"></td>
					                    <td><span class="label label-success">Activo</span></td>
					                    <td>
											<a href="{{ route('productos.show',$producto) }}">	
											<button type="button" class="btn btn-sm btn-success btn-icon add-tooltip"
											data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Consultar"><i class="ion-eye icon-lg"></i>
											</button>
										    </a>
											
											<a href="{{ route('productos.edit',$producto) }}">
												<button class="btn btn-sm btn-primary btn-icon add-tooltip"
												data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Actalizar"><i class="demo-psi-pen-5 icon-sm"></i></button>
											</a>
											
											
											<form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display: inline-block" class="formulario-eliminar" >
												@csrf
												@method('DELETE')
												<button id="deleteItem" type="submit" class="btn btn-sm btn-danger btn-icon add-tooltip"
												data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Eliminar"><i class="demo-psi-recycling icon-sm"></i></button>
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
    <script src="{{ asset('assets\js\sweetalert2@11.js') }}"></script>
	

	@if(session('eliminar') == 'ok')
	<script>
		Swal.fire(
		'¡Eliminado!',
		'El registro se elimino exitosamente.',
		'success'
				)
	</script>
	@endif

	  <script type="text/javascript">
         $(document).ready(function() {
             $('#demo-dt-basic').DataTable({
            language:{
                url:"{{ asset('assets/js/spanish.json') }}"
            }
        });
            } );


			$(document).ready(function() {
   			 $('#productos').DataTable( {
			 order: [[1, 'desc']],
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

		<script>
			$('.formulario-eliminar').submit(function(e){
				e.preventDefault();

			Swal.fire({
			title: '¿Estás seguro?',
			text: "¡Este registro se eliminará!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3f7a4a',
			cancelButtonColor: '#d33',
			confirmButtonText: '¡Si, eliminar!',
			cancelButtonText: 'Cancelar'
			}).then((result) => {
			if (result.isConfirmed) {
				
				this.submit();
			}
			})
			});

		</script>
    @endsection