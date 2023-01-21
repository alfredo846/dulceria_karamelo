@extends('layouts.main')
  @section('title', 'Marcas papelera')

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
					         <p class="text-2x mar-no text-semibold">Marcas | Papelera</p><p></p>
					     </div>
					 </div>
		   </div>
		   <br><br><br>
		   
                <!--Page content-->
                <div id="page-content">
                    
					<!-- Basic Data Tables -->
					<div class="panel">

                          <div class="panel-footer text-left">
                             <a href="{{ route('marcas.index') }}" class="text-right fs-6 text-secundario add-tooltip" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Regresar"><img src="{{ asset('assets/img/regresar.jpg')}}" width="30" height="30"></a>
                          </div>
						<div class="content">
							@include('layouts.partials.alerts')
						</div>

					    <div class="panel-body">
					        <table id="marcas" class="table table-striped table-bordered" cellspacing="0" width="100%">
					            <thead>
					                <tr>
					                    <th>Nombre</th>
					                    <th>Imagén</th>
					                    <th class="min-tablet">Estado</th>
					                    <th class="min-tablet">Acciones</th>
					                </tr>
					            </thead>
					            <tbody>

                                    @foreach($marcas as $marca)
					                <tr>
					                    <td>{{ $marca->nombre }}</td>
										<td><img class='profile-image' src="{{ asset('imagenes/marcas/' . $marca->imagen) }}" alt="foto"></td>
					                    <td><span class="label label-danger">Inactivo</span></td>
					                    <td>

										<form action="{{ route('marcas.activar', $marca) }}" method="POST"  style="display: inline-block" class="formulario-activar" >
											@csrf
											@method('DELETE')
												<button type="submit" class="btn btn-sm btn-success btn-icon">Activar</button>
											</form>

											<form action="{{ route('marcas.borrar', $marca) }}" method="POST" style="display: inline-block" class="formulario-borrar" >
												@csrf
												@method('DELETE')
												<button id="deleteItem" type="submit" class="btn btn-sm btn-danger btn-icon">Borrar</button>
											</form>

									    </td>
					                </tr>
                                    @endforeach
					               
					               
					            </tbody>
					        </table>
					    </div>
					</div>
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

	@if(session('activar') == 'ok')
	<script>
		Swal.fire(
		'¡Activado!',
		'El registro se ha activado exitosamente.',
		'success'
				)
	</script>
	@endif

	@if(session('borrar') == 'ok')
	<script>
		Swal.fire(
		'¡Eliminado!',
		'El registro se ha eliminado exitosamente.',
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

		<script>
			$('.formulario-borrar').submit(function(e){
				e.preventDefault();

			Swal.fire({
			title: '¿Estás seguro?',
			text: "¡Este registro se eliminará permanentemente!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
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

		<script>
			$('.formulario-activar').submit(function(e){
				e.preventDefault();

			Swal.fire({
			title: '¿Estás seguro que deseas activar el registro?',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: '¡Si, activar!',
			cancelButtonText: 'Cancelar'
			}).then((result) => {
			if (result.isConfirmed) {
				
				this.submit();
			}
			})
			});
		</script>

		
    @endsection