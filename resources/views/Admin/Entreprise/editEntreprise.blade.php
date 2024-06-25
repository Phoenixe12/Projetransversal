<div class="modal fade" id="ModalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Modification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-Entreprise') }}" data-toggle="validator" role="form"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                       <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="name">Nom au complet<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" value=""
                                        name="name" style="height:43px;" required />

                                          <input type="hidden" id="id" class="form-control" value=""
                                        name="id" />
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="email" class="form-control" value=""
                                        name="email" style="height:43px;" required />
                                </div>
                            </div>
                        </div>
                          <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="password">Mot de passe<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="password" class="form-control" value=""
                                        name="password" style="height:43px;" required />
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Basic Modal-->
