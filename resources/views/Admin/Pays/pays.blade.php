@extends('layouts.admin-layout.main')
@section('GestionPage')
    @include('sweetalert::alert')

    <div class="pagetitle">
        <h1 class="fw-bold"><i class="bi bi-flag"></i> Pays</h1>
        <nav class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Territoires d'intervention</a></li>
                <li class="breadcrumb-item">Pays</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="container mt-4">
            <div class="card">
                <div class="card-body mt-4">
                    <button type="button" class="btn text-white mb-4 bg-primary"
                        data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fas fa-plus-circle"></i> <span>Ajouter
                            un pays</span></button>
                    @php
                        // Convertir la chaîne en tableau et supprimer les espaces blancs autour des valeurs
                        $userTasks = array_map('trim', explode(',', auth()->user()->task));
                    @endphp


                    <table class="table table-striped table-bordered table-hover" id="table" data-toggle="table"
                        data-ajax="ajaxRequest" data-toolbar="#btnModalFormGestionProduits" data-buttons-class="primary"
                        data-show-refresh="false" data-show-toggle="false" data-show-fullscreen="false"
                        data-show-columns="false" data-show-columns-toggle-all="false" data-show-export="false"
                        data-page-list="[10, 25, 50, 100, all]" data-click-to-select="true" data-toggle="table"
                        data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                        data-page-size="10" data-sort-order="desc">
                        <thead>
                            <tr>
                                @if (in_array('Lecture', $userTasks))
                                    <th data-formatter="formatterImg">Drapeau</th>
                                    <th data-field="nomPays" data-sortable="true">Nom pays</th>
                                    <th data-field="codePays" data-sortable="true">Code pays</th>
                                @endif
                                @if (in_array('Ecriture', $userTasks))
                                    <th data-formatter="actionFormatter" data-events="actionEvents">Action</th>
                                @endif
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

    @if (in_array('Ecriture', $userTasks))
        @include('Admin.Pays.editPays')
        @include('Admin.Pays.addPays')
    @endif
    @if (in_array('Suppression', $userTasks))
        @include('Admin.Pays.deletePays')
    @endif
@endsection
@section('script')
    <script>
        // your custom ajax request here
        function ajaxRequest(params) {
            var url = '{{ route('Gestion+Country.create') }}'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }
    </script>
    <script>
        function actionFormatter(value, row, index) {
            return [
                '<a class="editProviders" style="color:blue" href="javascript:void(0)" title="Modifier">',
                '<i class="fas fa-edit" aria-hidden="true"></i>',
                '</a>',
                ' &nbsp &nbsp',
                '<a class="deleteProviders" style="color:red" href="javascript:void(0)" title="Supprimer">',
                '<i class="fas fa-trash" aria-hidden="true"></i>',
                '</a>'

            ].join('');
        }
        window.actionEvents = {
            'click .editProviders': function(e, value, row, index) {
                var id = row.id;

                $('#ModalEdit').modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('gestionCountry.edit', ['id' => ':id']) }}".replace(':id', id),
                    success: function(response) {
                        console.log(response.Country);
                        $('#codePays').val(response.Country.codePays);
                        $('#nomPays').val(response.Country.nomPays);
                        $('#id').val(response.Country.id);
                    }

                });
            },

            'click .deleteProviders': function(e, value, row, index) {
                var id = row.id;
                $('#ModalDelete').modal('show');
                $('#deleteing_id').val(id);
            }
        };

        function formatterImg(value, row, index) {
            if (row.flags) {
                // Si l'image existe, retournez l'élément img avec le chemin de l'image spécifié
                return '<img src="flags/' + row.flags + '" alt=""  height="75" width="75"></img>';
            } else {
                // Si l'image n'existe pas, retournez un élément img avec un chemin par défaut
                return '<img src="assets/dist/img/flags.png" alt=""  height="75" width="75"></img>';
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
