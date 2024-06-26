<div class="modal fade" id="ModalEdit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
             <form  action="{{ route('update-station') }}" data-toggle="validator" role="form" method="POST">
               @csrf
               @method('PUT')

                <div class="modal-header py-1" style="background-color:#0b3544;">
                    <h4 class="modal-title text-white">Modification</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="CodeStation">Code Station </label>
                                    <input type="text" id="CodeStation" class="form-control" value=""
                                        name="CodeStation" style=" height:43px;" required />
                                    <input type="hidden" id="id" name="id" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="DesignationStation">Désignation</label>
                                    <input type="text" id="DesignationStation" class="form-control" value=""
                                        name="DesignationStation" style=" height:43px;" required />
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="LocalisationStation">Localistion</label>
                                    <input type="text" id="LocalisationStation" class="form-control" value=""
                                        name="LocalisationStation" style=" height:43px;" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="ContactStation">Contacts</label>
                                    <input type="text" id="ContactStation" class="form-control" value=""
                                        name="ContactStation" style=" height:43px;" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn  btn-primary" id="btnFormEnreg">Modifier</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
