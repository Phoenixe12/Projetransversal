<div class="modal fade" id="ModalEdit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
            <form action="{{ route('update-utilisateur') }}" data-toggle="validator" role="form" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header py-1" style="background-color:#0b3544;">
                    <h4 class="modal-title text-white">Modification</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" id="email" class="form-control" value=""
                                        name="email" style="height:43px;" required />
                                        <input type="hidden" id="id" name="id" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="password">Password <span class="text-danger">(Optionnel)</span></label>
                                    <input type="text" id="password" class="form-control" value=""
                                        name="password" style="height:43px;" placeholder=".............."  />
                                </div>
                            </div>
                        </div>
                    <div class="row ">
                        <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="role">Role  <span class="text-danger">(Optionnel)</span></label>
                                    <select class="form-control" id="role" value="" name="role"
                                        style="height:43px;" >
                                        <option selected>Choisir un rôle</option>
                                        @foreach ($statut as $key)
                                            <option value="{{ $key->id }}">{{ $key->Nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn  btn-primary" id="btnFormEnreg">Modification</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
