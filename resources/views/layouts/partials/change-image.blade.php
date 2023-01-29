<div class="modal fade" id="editPhoto" tabindex="-1" role="dialog" aria-labelledby="editPhotoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPhotoLabel">Cambiar Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <p class="text-2x mar-no text-semibold"><span aria-hidden="true">&times;</span></p>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updatefoto', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="col-12 col-lg-11 my-1">
                            <div class="col-lg-2">
                                <h6>Foto:</h6>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-floating my-0">
                                    <div id="imagePreviewCambiarfoto"></div><br>
                                    <input type="file" placeholder="Coloque su fotografía" id="cambiarimagen"
                                        class="upload-box" name="foto"
                                        accept="image/png,image/jpeg,image/jpg,image/jfif">
                                    @if ($errors->first('foto'))
                                        <br>
                                        <i class="text-danger">{{ $errors->first('foto') }}
                                            <label> La imagén no debe exceder los 2 Mb y solo acepta
                                                imágenes con extensiones 'jpeg, jpg, png, jfif</label></i>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div><br>&nbsp;<br>&nbsp;<br>&nbsp;
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                         <button class="button">Cambiar foto</button>
                        </div>
                    </div><br>&nbsp;<br>&nbsp;
                </form>
            </div>
        </div>
    </div>
</div>
