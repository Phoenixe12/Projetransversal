@extends('layouts.admin-layout.main')
@section('GestionPage')
    @include('sweetalert::alert')

    <div class="pagetitle">
        <h1 class="fw-bold"><i class="bi bi-folder"></i> Entreprise</h1>

    </div><!-- End Page Title -->
    <section class="section">
        <div class="container mt-4">
            <div class="card">
                <div class="card-body mt-4">
                    <button type="button"  class="btn text-white mb-4"
                        style="background-color:#0b3544;" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fas fa-plus-circle"></i> <span>Ajouter une Entreprise</span></button>

                    <table class="table table-striped table-bordered table-hover" id="table" data-toggle="table"
                        data-ajax="ajaxRequest" data-toolbar="#btnModalFormGestionProduits" data-buttons-class="success"
                        data-show-refresh="false" data-show-toggle="false" data-show-fullscreen="false"
                        data-show-columns="false" data-show-columns-toggle-all="false" data-show-export="false"
                        data-page-list="[10, 25, 50, 100, all]" data-click-to-select="true" data-toggle="table"
                        data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                        data-page-size="10" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="name" data-sortable="true">Nom (au complet)</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="password" data-sortable="true">Password</th>
                                <th data-formatter="actionFormatter" data-events="actionEvents">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- End #main -->

    @include('Admin.Entreprise.deleteEntreprise')
    @include('Admin.Entreprise.editEntreprise')
    @include('Admin.Entreprise.addEntreprise')
@endsection
@section('script')
    <script>
        // your custom ajax request here
        function ajaxRequest(params) {
            var url = '{{ route('Gestion+Entreprise.create') }}'
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
                    url: "{{ route('gestionEntreprise.edit', ['id' => ':id']) }}".replace(':id', id),
                    success: function(response) {
                        console.log(response.Entreprise);
                        $('#name').val(response.Entreprise.name);
                        $('#email').val(response.Entreprise.email);
                        $('#id').val(response.Entreprise.id);
                    }
                   
                });
            },

            'click .deleteProviders': function(e, value, row, index) {
                var id = row.id;
                $('#ModalDelete').modal('show');
                $('#deleteing_id').val(id);
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
