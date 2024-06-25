@extends('layouts.admin-layout.main')
@section('GestionPage')
    @include('sweetalert::alert')

    <div class="pagetitle">
        <h1 class="fw-bold"><i class="bi bi-folder"></i>Entreprises</h1>
        <nav class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Informations</a></li>
                <li class="breadcrumb-item">Entreprise</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="container mt-4">
            <div class="card">
                <div class="card-body mt-4">
                    @php
                        // Convertir la chaîne en tableau et supprimer les espaces blancs autour des valeurs
                        $userTasks = array_map('trim', explode(',', auth()->user()->task));
                    @endphp




                    <table class="table table-striped table-bordered table-hover" id="table" data-toggle="table"
                        data-ajax="ajaxRequest" data-toolbar="#btnModalFormGestionProduits" data-buttons-class="success"
                        data-show-refresh="false" data-show-toggle="false" data-show-fullscreen="false"
                        data-show-columns="false" data-show-columns-toggle-all="false" data-show-export="false"
                        data-page-list="[10, 25, 50, 100, all]" data-click-to-select="true" data-toggle="table"
                        data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                        data-page-size="10" data-sort-order="desc">
                        <thead>
                            <tr>
                                @if (in_array('Lecture', $userTasks))
                                    <th data-field="matricule" data-sortable="true">Entreprise ID</th>
                                    <th data-field="name" data-sortable="true">Nom créateur du compte</th>
                                    <th data-field="first_name" data-sortable="true">Prénoms créateur du compte</th>
                                    <th data-field="email" data-sortable="true">Email</th>
                                    <th data-field="nomOrganisation" data-sortable="true">Nom Organisme</th>
                                    <th data-field="emailOrganisation" data-sortable="true">Email Organisation</th>
                                    <th data-formatter="documentPdf">Document Pdf</th>
                                    <th data-field="nomPays" data-sortable="true">Pays </th>
                                    <th data-field="adresse" data-sortable="true">Adresse</th>
                                    <th data-field="codePays" data-sortable="true">Code pays</th>
                                    <th data-field="telephone" data-sortable="true">Téléphone</th>
                                @endif
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- End #main -->
@endsection
@section('script')
    <script>
        // your custom ajax request here
        function ajaxRequest(params) {
            var url = '{{ route('Information+Entreprise.create') }}'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }
    </script>
    <script>
        function documentPdf(value, row, index) {
    if (row.documentPdf) {
        // Si le document PDF existe, affichez une image avec un lien vers le document
        return '<a href="documentPdf/' + row.documentPdf + '" target="_blank"><img src="assets/dist/img/logo/biopdf.png"" alt="" height="75" width="75"></a>';
    } else {
        // Si le document PDF n'existe pas, affichez une image par défaut
        return '<img src="assets/dist/img/logo/logo.png" alt="" height="75" width="75"></img>';
    }
};



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
@endsection
