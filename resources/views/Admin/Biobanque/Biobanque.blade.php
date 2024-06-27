@extends('layouts.admin-layout.main')
@section('GestionPage')
@include('sweetalert::alert')

<div class="pagetitle">
    <h1 class="fw-bold"><i class="bi bi-folder"></i> Biobanque</h1>

</div><!-- End Page Title -->
<section class="section">
    <div class="container mt-4">
        <div class="card">
            <div class="card-body mt-4">
                @php
                // Convertir la chaîne en tableau et supprimer les espaces blancs autour des valeurs
                $userTasks = array_map('trim', explode(',', auth()->user()->task));
                @endphp
                @if (in_array('Ecriture', $userTasks))
                <button type="button" class="btn text-white mb-4 bg-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fas fa-plus-circle"></i>
                    <span>Ajouter une Biobanque</span></button>
                @endif
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
        </div>
    </div>
</section>

<!-- End #main -->



@php
// Convertir la chaîne en tableau et supprimer les espaces blancs autour des valeurs
$userTasks = array_map('trim', explode(',', auth()->user()->task));
@endphp
@if (in_array('Suppression', $userTasks))
@include('Admin.Biobanque.deleteBiobanque')
@endif

@if (in_array('Ecriture', $userTasks))
@include('Admin.Biobanque.editBiobanque')
@endif

@if (in_array('Ecriture', $userTasks))
@include('Admin.Biobanque.addBiobanque')
@endif
@endsection
@section('script')
<script>
    // your custom ajax request here
    function ajaxRequest(params) {
        var url = '{{ route('Gestion+BioBanque+Admin.create') }}'
        $.get(url + '?' + $.param(params.data)).then(function(res) {
            params.success(res)
        })
    }

</script>
<script>
    function actionFormatter(value, row, index) {
        return [
            '<a class="editProviders" style="color:blue" href="javascript:void(0)" title="Modifier">'
            , '<i class="fas fa-edit" aria-hidden="true"></i>'
            , '</a>'
            , ' &nbsp &nbsp'
            , '<a class="deleteProviders" style="color:red" href="javascript:void(0)" title="Supprimer">'
            , '<i class="fas fa-trash" aria-hidden="true"></i>'
            , '</a>'

        ].join('');
    }
    window.actionEvents = {
        'click .editProviders': function(e, value, row, index) {
            var id = row.id;

            $('#ModalEdit').modal('show');
            $.ajax({
                type: "GET"
                , url: "{{ route('gestionBioBanque.edit', ['id' => ':id']) }}".replace(':id', id)
                , success: function(response) {
                    console.log(response.BioBanque);
                    $('#nom').val(response.BioBanque.nom);
                    $('#ville').val(response.BioBanque.ville);
                    $('#codePostal').val(response.BioBanque.codePostal);
                    $('#adresseRue').val(response.BioBanque.adresseRue);
                    $('#region').val(response.BioBanque.region);
                    $('#pays').val(response.BioBanque.pays);
                    $('#email').val(response.BioBanque.email);
                    $('#latitude').val(response.BioBanque.latitude);
                    $('#longitude').val(response.BioBanque.longitude);
                    $('#etage').val(response.BioBanque.etage);
                    $('#etablissementHote').val(response.BioBanque.etablissementHote);
                    $('#contactNom').val(response.BioBanque.contactNom);
                    $('#contactFonction').val(response.BioBanque.contactFonction);
                    $('#contactTelephone').val(response.BioBanque.contactTelephone);
                    $('#contactEmail').val(response.BioBanque.contactEmail);
                    $('#horairesOuverture').val(response.BioBanque.horairesOuverture);
                    $('#informationsAcces').val(response.BioBanque.informationsAcces);
                    $('#siteWeb').val(response.BioBanque.siteWeb);
                    $('#informationsSupplementaires').val(response.BioBanque.informationsSupplementaires);
                    $('#id').val(response.BioBanque.id);
                }

            });
        },

        'click .deleteProviders': function(e, value, row, index) {
            var id = row.id;
            $('#ModalDelete').modal('show');
            $('#deleteing_id').val(id);
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
    $(function() {
        $('.toastrDefaultSuccess').each(function() {
            toastr.success($(this).text());
        });
        $('.toastrDefaultWarning').each(function() {
            toastr.warning($(this).text());
        });
        $('.toastrDefaultError').each(function() {
            toastr.error($(this).text());
        });
    });

</script>

<script>
    window.addEventListener('online', function() {
        toastr.success('Internet connection restored.');
    });

    window.addEventListener('offline', function() {
        toastr.error('Internet connection lost.');
    });

</script>

<script>
    $('#multiple-select-field').select2({
        theme: "bootstrap-5"
        , width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
        , placeholder: $(this).data('placeholder')
        , closeOnSelect: false,

    });

    $('.multiple-select-fiel').select2({
        theme: "bootstrap-5"
        , width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
        , placeholder: $(this).data('placeholder')
        , closeOnSelect: false,

    });

</script>
@endsection
