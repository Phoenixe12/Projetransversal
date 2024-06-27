<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Ajouter un admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Gestion+BioBanque+Admin.store') }}" data-toggle="validator" role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="nom">Nom<span class="text-danger">*</span></label>
                                    <input type="text" id="nom" class="form-control" value="" name="nom" style="height:43px;" required placeholder="Entrez le nom">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="ville">Ville<span class="text-danger">*</span></label>
                                    <input type="text" id="ville" class="form-control" value="" name="ville" style="height:43px;" required placeholder="Entrez la ville">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="codePostal">Code Postal<span class="text-danger">*</span></label>
                                    <input type="text" id="codePostal" class="form-control" value="" name="codePostal" style="height:43px;" required placeholder="Entrez le code postal">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="adresseRue">Adresse<span class="text-danger">*</span></label>
                                    <input type="text" id="adresseRue" class="form-control" value="" name="adresseRue" style="height:43px;" required placeholder="Entrez l'adresse">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="region">Région<span class="text-danger">*</span></label>
                                    <input type="text" id="region" class="form-control" value="" name="region" style="height:43px;" required placeholder="Entrez la région">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="pays">Pays<span class="text-danger">*</span></label>
                                    <input type="text" id="pays" class="form-control" value="" name="pays" style="height:43px;" required placeholder="Entrez le pays">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="email">Email<span class="text-danger"></span></label>
                                    <input type="contactEmail" id="contactEmail" class="form-control" value="" name="contactEmail" style="height:43px;"  placeholder="Entrez l'email">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="latitude">Latitude<span class="text-danger">*</span></label>
                                    <input type="text" id="latitude" class="form-control" value="" name="latitude" style="height:43px;" required placeholder="Entrez la latitude">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="longitude">Longitude<span class="text-danger">*</span></label>
                                    <input type="text" id="longitude" class="form-control" value="" name="longitude" style="height:43px;" required placeholder="Entrez la longitude">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="etage">Étage<span class="text-danger">*</span></label>
                                    <input type="text" id="etage" class="form-control" value="" name="etage" style="height:43px;" required placeholder="Entrez l'étage">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="etablissementHote">Établissement Hôte<span class="text-danger">*</span></label>
                                    <input type="text" id="etablissementHote" class="form-control" value="" name="etablissementHote" style="height:43px;" required placeholder="Entrez l'établissement hôte">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="contactNom">Nom du Contact<span class="text-danger">*</span></label>
                                    <input type="text" id="contactNom" class="form-control" value="" name="contactNom" style="height:43px;" required placeholder="Entrez le nom du contact">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="contactFonction">Fonction du Contact<span class="text-danger">*</span></label>
                                    <input type="text" id="contactFonction" class="form-control" value="" name="contactFonction" style="height:43px;" required placeholder="Entrez la fonction du contact">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="contactTelephone">Téléphone du Contact<span class="text-danger">*</span></label>
                                    <input type="text" id="contactTelephone" class="form-control" value="" name="contactTelephone" style="height:43px;" required placeholder="Entrez le téléphone du contact">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="horairesOuverture">Horaires d'Ouverture<span class="text-danger">*</span></label>
                                    <input type="text" id="horairesOuverture" class="form-control" value="" name="horairesOuverture" style="height:43px;" required placeholder="Entrez les horaires d'ouverture">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="informationsAcces">Informations d'Accès<span class="text-danger">*</span></label>
                                    <input type="text" id="informationsAcces" class="form-control" value="" name="informationsAcces" style="height:43px;" required placeholder="Entrez les informations d'accès">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="siteWeb">Site Web<span class="text-danger">*</span></label>
                                    <input type="text" id="siteWeb" class="form-control" value="" name="siteWeb" style="height:43px;" required placeholder="Entrez le site web">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="control-label" for="informationsSupplementaires">Informations Supplémentaires<span class="text-danger">*</span></label>
                                    <input type="text" id="informationsSupplementaires" class="form-control" value="" name="informationsSupplementaires" style="height:43px;" required placeholder="Entrez les informations supplémentaires">
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
