  <form action="{{ route('categorias.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                     @method('POST')
					                <div class="panel-body">
					                    <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Nombre</label>
					                        <div class="col-sm-6">
					                            <input type="text" name="nombre" placeholder="Nombre categoría" autocomplete="off" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
					                </div>
                                    
					                <div class="panel-footer">
					                    <div class="row">
					                        <div class="col-sm-9 col-sm-offset-3">
					                            <button class="btn btn-success" type="submit">Guardar</button>
					                            <button class="btn btn-primary" type="reset">Riniciar</button>
					                        </div>
					                    </div>
					                </div>
                                    <div class="panel-footer text-right">
                                        <a title="Regresar" href="{{ route('categorias.index') }}" class="text-right fs-6 text-secundario"><img src="{{ asset('assets/img/regresar.jpg')}}" width="30" height="30"></a>
					                </div>
					            </form>