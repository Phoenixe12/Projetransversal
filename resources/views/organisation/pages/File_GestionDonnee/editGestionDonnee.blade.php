<div class="modal fade" id="ModalEdit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content ">
            <form action="{{ route('update-Echantillon') }}" data-toggle="validator" role="form" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header py-1" style="background-color:#0b3544;">
                    <h4 class="modal-title text-white">Modification</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md mt-2">
                                <label class="mb-1">Biobanque</label>

                                <select class="form-control" id="idBiobanque" name="idBiobanque" required>
                                    <option selected disabled>Sélectionnez le nom du biobanque</option>
                                    @foreach ( $biobanques as $biobanque )
                                    <option value="{{$biobanque->id}}">{{$biobanque->nom}}</option>
                                    <!-- Ajoutez autant d'options que nécessaire -->
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-1">Numéro d'identification</label>
                                <input type="text" class="form-control" id="numeroIdentification" name="" value="" placeholder="Numéro d'identification" required disabled>
                                <input type="hidden" id="id" name="id" />
                            </div>
                            <div class="col-md-6">
                                <label class="mb-1">Date de prélèvement</label>
                                <input type="datetime-local" class="form-control" id="datePrelevement" name="datePrelevement" value="" placeholder="Date de prélèvement" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Nom du patient</label>
                                <input type="text" class="form-control" id="nomPatient" name="nomPatient" value="" placeholder="Nom du patient" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Type d'échantillon</label>
                                <input type="text" class="form-control" id="typeEchantillon" name="typeEchantillon" value="" placeholder="Type d'échantillon" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Quantité / Volume</label>
                                <input type="text" class="form-control" id="quantiteVolume" name="quantiteVolume" value="" placeholder="Quantité / Volume" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Méthode de prélèvement</label>
                                <input type="text" class="form-control" id="methodePrelevement" name="methodePrelevement" value="" placeholder="Méthode de prélèvement" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Conditions de prélèvement</label>
                                <input type="text" class="form-control" id="conditionsPrelevement" name="conditionsPrelevement" value="" placeholder="Conditions de prélèvement" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Priorité d'urgence</label>
                                <input type="text" class="form-control" id="prioriteUrgence" name="prioriteUrgence" value="" placeholder="Priorité d'urgence" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Qualifications du préleveur</label>
                                <input type="text" class="form-control" id="qualificationsPreleveur" name="qualificationsPreleveur" value="" placeholder="Qualifications du préleveur" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Température de conservation</label>
                                <input type="text" class="form-control" id="temperatureConservation" name="temperatureConservation" value="" placeholder="Température de conservation" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Temps de transport</label>
                                <input type="text" class="form-control" id="tempsTransport" name="tempsTransport" value="" placeholder="Temps de transport" required>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Traitement préalable</label>
                                <input type="text" class="form-control" id="traitementPrealable" name="traitementPrealable" value="" placeholder="Traitement préalable" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Contexte clinique</label>
                                <textarea class="form-control" id="contexteClinique" name="contexteClinique" rows="3" placeholder="Contexte clinique" required></textarea>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="mb-1">Traitements en cours</label>
                                <textarea class="form-control" id="traitementsEnCours" name="traitementsEnCours" rows="3" placeholder="Traitements en cours" required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mt-2 mb-3">
                                <label class="mb-1">Antécédents médicaux</label>
                                <textarea class="form-control" id="antecedentsMedicaux" name="antecedentsMedicaux" rows="3" placeholder="Antécédents médicaux" required></textarea>
                            </div>
                            <div class="col-md mt-2 mb-3">
                                <label class="mb-1">Analyses demandées</label>
                                <textarea class="form-control" id="analysesDemandees" name="analysesDemandees" rows="3" placeholder="Analyses demandées" required></textarea>
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
