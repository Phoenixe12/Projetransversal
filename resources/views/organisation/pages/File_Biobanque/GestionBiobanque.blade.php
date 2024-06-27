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
                <h2 class="card-title text-white">Biobanques</h2>
                <div class="card-tools">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


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
                            <th data-field="contactEmail" data-sortable="true">Contact Email</th>
                            <th data-field="etablissementHote" data-sortable="true">Établissement Hôte</th>
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
 @include('organisation.pages.File_Biobanque.CarteBiobanque')
@endsection

<!-- Modal-->



@section('script')
<script>
    function actionFormatter(value, row, index) {
            return [
                '<a class="editGestionSation" style="color:blue" href="javascript:void(0)" title="Modifier">',
                '<i class="fas fa-edit" aria-hidden="true"></i>', '</a>'

            ].join('');
        }


        window.actionEvents = {
            'click .editGestionSation': function(e, value, row, index) {
                var id = row.id;
                $('#ModalEdit').modal('show');

            }
        };

    function detailFormatter(index, row) {
        var html = []

        html.push('<p><b>Nom du Contact : </b> ' + row.contactNom + '</p>');
        html.push('<p><b>Fonction du Contact : </b> ' + row.contactFonction + '</p>');
        html.push('<p><b>Téléphone du Contact : </b> ' + row.contactTelephone + '</p>');
        html.push('<p><b>Horaires d\'Ouverture : </b> ' + row.horairesOuverture + '</p>');
        html.push('<p><b>Informations d\'Accès : </b> ' + row.informationsAcces + '</p>');
        html.push('<p><b>Site Web : </b> ' + row.siteWeb + '</p>');
        html.push('<p><b>Informations Supplémentaires : </b> ' + row.informationsSupplementaires + '</p>');


        return html.join('');
    }

</script>

<script>
    // your custom ajax request here
    function ajaxRequest(params) {
        var url = '{{ route('Gestion+BioBanque+Organisation.create') }}'
        $.get(url + '?' + $.param(params.data)).then(function(res) {
            params.success(res)
        })
    }

</script>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
        // Initialisation de la carte Leaflet
        var map = L.map('map').setView([48.8566, 2.3522], 13); // Centre de Paris, zoom 13

        // Ajout des tuiles OpenStreetMap à la carte
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajout d'un marqueur à la position spécifiée
        L.marker([48.8566, 2.3522]).addTo(map)
            .bindPopup('Paris, France')
            .openPopup();
    </script>
@endsection
