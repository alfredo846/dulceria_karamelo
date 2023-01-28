<div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="editPasswordLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPasswordLabel">Cambiar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <p class="text-2x mar-no text-semibold"><span aria-hidden="true">&times;</span></p>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updatepassword', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="col-12 col-lg-11 my-1">
                            <h6>Ingresa tu nueva contraseña:</h6>
                            <div class="form-floating my-0">
                                <input type="password" placeholder="Contraseña" id="demo-hor-inputpass"
                                    class="form-control" name="password">

                                @if ($errors->first('password'))
                                    <i class="text-danger">{{ $errors->first('password') }}</i>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="col-12 col-lg-11 my-1">
                            <h6>Repite tu nueva contraseña:</h6>
                            <div class="form-floating my-0">
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    placeholder="Contraseña" data-index="6" autocomplete="off" class="form-control">

                                @if ($errors->first('password'))
                                    <i class="text-danger">{{ $errors->first('password') }}</i>
                                @endif
                            </div>
                        </div>
                    </div><br>&nbsp;<br>&nbsp;<br>&nbsp;
                   <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                            <button class="button">Cambiar contraseña</button>
                        </div>
                    </div>
                </form><br>&nbsp;<br>&nbsp;
            </div>
        </div>
    </div>
</div>
