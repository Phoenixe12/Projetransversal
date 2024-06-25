<div class="modal fade" id="ModalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Modification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-Country') }}" data-toggle="validator" role="form"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container">
                          <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="flags">Image drapeau<span
                                            class="text-danger"></span></label>
                                    <input type="file" id="flags" class="form-control" value=""
                                        name="flags" style="height:43px;" />
                                        <input type="hidden" id="id" name="id" />
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="nomPays">Nom pays<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="nomPays" class="form-control" value=""
                                        name="nomPays" style="height:43px;" required />
                                </div>
                            </div>
                        </div>
                          <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="codePays">Code pays<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="codePays" class="form-control" value=""
                                        name="codePays" style="height:43px;" required />
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>
            </form>
        </div>
    </div>
</div><!-- End Basic Modal-->
