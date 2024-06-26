<div class="modal fade" id="modalFormUtilisateur">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
            <form id="formOrg" action="{{ route('Gestion+Utilisateurs.store') }}" data-toggle="validator" role="form"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header py-1" style="background-color:#0b3544;">
                    <h4 class="modal-title text-white">Utilisateur</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="station_id">Station</label>
                                    <select class="form-control" id="station_id" value="" name="station_id" required>
                                        <option value=""></option>
                                        @foreach ($station as $key)
                                            <option value="{{ $key->id }}">{{ $key->DesignationStation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="nom">Nom</label>
                                    <select class="form-control" id="nom" value="" name="employees_id"
                                        style="height:43px;" required>
                                         <option value=""></option>
                                        @foreach ($employee as $key)
                                            <option value="{{ $key->id }}">{{ $key->Nom }} {{ $key->Prenoms }}</option>
                                        @endforeach


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="text" id="email" class="form-control" value=""
                                        name="email" style="height:43px;" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="Role_id">Role</label>
                                    <select class="form-control" id="Role_id" value="" name="role"
                                        style="height:43px;" required>
                                        <option selected>Choisir un rôle</option>
                                        @foreach ($statut as $key)
                                            <option value="{{ $key->id }}">{{ $key->Nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control" value=""
                                        name="password" style="height:43px;" required />
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn  btn-primary" id="btnFormEnreg">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
