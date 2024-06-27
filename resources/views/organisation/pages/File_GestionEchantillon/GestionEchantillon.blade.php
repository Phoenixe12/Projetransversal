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
                <h2 class="card-title text-white">Echantillons</h2>
                <div class="card-tools">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">


                     <table class="table table-striped table-bordered table-hover" data-toolbar="#btnModalFormGestionStation"
                        id="table" data-toggle="table" data-search="true" data-pagination="true"
                        data-ajax="ajaxRequest" data-buttons-class="cronos" data-show-refresh="true" data-show-toggle="true" data-show-footer="false"
                        data-footer-style="footerStyle" data-show-fullscreen="true" data-show-columns="true"
                        data-show-columns-toggle-all="true" data-show-export="true" data-click-to-select="true"
                        data-select-item-name="toolbar" data-export-types="['csv','excel','pdf']" data-sort-name="name" data-page-list="[10, 25, 50, 100, all]"
                        data-page-size="20" data-sort-order="desc"  data-detail-view="true"  data-detail-formatter="detailFormatter">
                    <thead>
                        <tr>
                            <th data-field="numeroIdentification" data-sortable="true">Numéro Identification</th>
                            <th data-field="datePrelevement" data-sortable="true">Date Prélèvement</th>
                            <th data-field="nomPatient" data-sortable="true">Nom Patient</th>
                            <th data-field="typeEchantillon" data-sortable="true">Type Échantillon</th>
                            <th data-field="quantiteVolume" data-sortable="true">Quantité/Volume</th>
                            <th data-field="methodePrelevement" data-sortable="true">Méthode Prélèvement</th>
                            <th data-field="nomPreleveur" data-sortable="true">Nom Préleveur</th>
                            <th data-field="qualificationsPreleveur" data-sortable="true">Qualifications Préleveur</th>
                            <th data-field="temperatureConservation" data-sortable="true">Température Conservation</th>
                            <th data-field="tempsTransport" data-sortable="true">Temps Transport</th>
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

@endsection

<!-- Modal-->



@section('script')
<script>




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
        var url = '{{ route('getAll.index') }}'
        $.get(url + '?' + $.param(params.data)).then(function(res) {
            params.success(res)
        })
    }

</script>
@endsection
