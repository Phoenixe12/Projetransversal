<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Ajouter un admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Gestion+Compte.store') }}" data-toggle="validator" role="form"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="name">Nom au complet<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control" value=""
                                        name="name" style="height:43px;" required />
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
                                    <label class="control-label" for="permission">Permission<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="multiple-select-field" name="task[]"
                                        data-placeholder="Choose anything" multiple>
                                        @foreach ($permission as $key)
                                            <option value="{{ $key->nomAcces }}">{{ $key->nomAcces }}</option>
                                        @endforeach
                                    </select>
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
