@extends('organisation.pages.layout.header')
@section('GestionPage')
<style>
    .bg-cronos {
        background-color: #0b3544;
    }

    .btn-cronos {
        background-color: #0b3544;
        color: #ffff;
    }

</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @include('sweetalert::alert')
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card ">
            <div class="card-header bg-cronos">
                <h2 class="card-title text-white">Gestion des échantillons</h2>
                <div class="card-tools">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a id="btnModalFormGestionStation" href="#modalFormGestionSation" class="btn btn-cronos text-white add" data-toggle="modal" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus-circle"></i>
                    <span>Ajouter un échantillon</span></a>

                <table class="table table-striped table-bordered table-hover" data-toolbar="#btnModalFormGestionStation" id="table" data-toggle="table" data-search="true" data-pagination="true" data-ajax="ajaxRequest" data-buttons-class="cronos" data-show-refresh="true" data-show-toggle="true" data-show-footer="false" data-footer-style="footerStyle" data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true" data-show-export="true" data-click-to-select="true" data-select-item-name="toolbar" data-export-types="['csv','excel','pdf']" data-sort-name="name" data-page-list="[10, 25, 50, 100, all]" data-page-size="20" data-sort-order="desc" data-detail-view="true" data-detail-formatter="detailFormatter">
                    <thead>
                        <tr>
                            <th data-field="nom" data-sortable="true">Nom</th>
                            <th data-field="adresseRue" data-sortable="true">Adresse Rue</th>
                            <th data-field="codePostal" data-sortable="true">Code Postal</th>
                            <th data-field="ville" data-sortable="true">Ville</th>
                            <th data-field="region" data-sortable="true">Région</th>
                            <th data-field="pays" data-sortable="true">Pays</th>
                            <th data-field="latitude" data-sortable="true">Latitude</th>
                            <th data-field="longitude" data-sortable="true">Longitude</th>
                            <th data-field="etage" data-sortable="true">Étage</th>
                            <th data-field="etablissementHote" data-sortable="true">Établissement Hôte</th>
                            <th data-field="contactNom" data-sortable="true">Nom du Contact</th>
                            <th data-field="contactFonction" data-sortable="true">Fonction du Contact</th>
                            <th data-field="contactTelephone" data-sortable="true">Téléphone du Contact</th>
                            <th data-field="contactEmail" data-sortable="true">Email du Contact</th>
                            <th data-field="horairesOuverture" data-sortable="true">Horaires d'Ouverture</th>
                            <th data-field="informationsAcces" data-sortable="true">Informations d'Accès</th>
                            <th data-field="siteWeb" data-sortable="true">Site Web</th>
                            <th data-field="informationsSupplementaires" data-sortable="true">Informations Supplémentaires</th>
                            <th data-formatter="actionFormatter" data-events="actionEvents">Action</th>
                        </tr>
                    </thead>
                </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
        </div>
        <!-- /.card -->


    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@include('organisation.pages.File_GestionDonnee.deleteGestionDonnee')
@include('organisation.pages.File_GestionDonnee.editGestionDonnee')
@include('organisation.pages.File_GestionDonnee.addGestionDonnee')
@endsection

<!-- Modal-->



@section('script')
<script>
    function actionFormatter(value, row, index) {
        return [
            '<a class="editGestionSation" style="color:blue" href="javascript:void(0)" title="Modifier">'
            , '<i class="fas fa-edit" aria-hidden="true"></i>', '</a>'
            , '&nbsp;&nbsp;', // Ajout d'un espace supplémentaire
            '<a class="deleteGestionSation" style="color:red" href="javascript:void(0)" title="Supprimer">'
            , '<i class="fas fa-trash" aria-hidden="true"></i>', '</a>'
        ].join('');
    }

    window.actionEvents = {
        'click .editGestionSation': function(e, value, row, index) {
            var id = row.id;
            $('#ModalEdit').modal('show');
            $.ajax({
                type: "GET"
                , url: "{{ route('gestionEchantillon.edit', ['id' => ':id']) }}".replace(':id', id)
                , success: function(response) {
                    console.log(response);
                    $('#numeroIdentification').val(response.Echantillon.numeroIdentification);
                    $('#datePrelevement').val(response.Echantillon.datePrelevement);
                    $('#nomPatient').val(response.Echantillon.nomPatient);
                    $('#nomPreleveur').val(response.Echantillon.nomPreleveur);
                    $('#typeEchantillon').val(response.Echantillon.typeEchantillon);
                    $('#methodePrelevement').val(response.Echantillon.methodePrelevement);
                    $('#conditionsPrelevement').val(response.Echantillon.conditionsPrelevement);
                    $('#tempsTransport').val(response.Echantillon.nomPreleveur);
                    $('#qualificationsPreleveur').val(response.Echantillon.qualificationsPreleveur);
                    $('#temperatureConservation').val(response.Echantillon.temperatureConservation);
                    $('#tempsTransport').val(response.Echantillon.tempsTransport);
                    $('#traitementPrealable').val(response.Echantillon.traitementPrealable);
                    $('#contexteClinique').val(response.Echantillon.contexteClinique);
                    $('#traitementsEnCours').val(response.Echantillon.traitementsEnCours);
                    $('#quantiteVolume').val(response.Echantillon.quantiteVolume);
                    $('#antecedentsMedicaux').val(response.Echantillon.antecedentsMedicaux);
                    $('#analysesDemandees').val(response.Echantillon.analysesDemandees);
                    $('#prioriteUrgence').val(response.Echantillon.prioriteUrgence);
                    $('#id').val(response.Echantillon.id);

                }
            });
        },

        'click .deleteGestionSation': function(e, value, row, index) {
            var id = row.id;
            $('#ModalDelete').modal('show');
            $('#deleteing_id').val(id);
        }
    };

    function detailFormatter(index, row) {
        var html = []

        html.push('<p><b>Conditions de Prélèvement : </b> ' + row.conditionsPrelevement + '</p>')
        html.push('<p><b>Traitement Préalable : </b> ' + row.traitementPrealable + '</p>')
        html.push('<p><b>Contexte Clinique : </b> ' + row.contexteClinique + '</p>')
        html.push('<p><b>Traitements en Cours : </b> ' + row.traitementsEnCours + '</p>')
        html.push('<p><b>Antécédents Médicaux : </b> ' + row.antecedentsMedicaux + '</p>')
        html.push('<p><b>Analyses Demandées : </b> ' + row.analysesDemandees + '</p>')
        html.push('<p><b>Priorité/Urgence : </b> ' + row.prioriteUrgence + '</p>')

        return html.join('');
    }

</script>

<script>
    // your custom ajax request here
    function ajaxRequest(params) {
        var url = '{{ route('
        Gestion + Echantillon.create ') }}'
        $.get(url + '?' + $.param(params.data)).then(function(res) {
            params.success(res)
        })
    }

</script>
@endsection
