@extends('organisation.pages.layout.header')
@section('GestionStation')
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
                    <h2 class="card-title text-white">Gestion des stations</h2>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a id="btnModalFormGestionStation" href="#modalFormGestionSation" class="btn btn-cronos text-white add"
                        data-toggle="modal" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus-circle"></i>
                        <span>Ajouter une station</span></a>

                    <table class="table table-striped table-bordered table-hover" data-toolbar="#btnModalFormGestionStation"
                        id="table" data-toggle="table" data-ajax="ajaxRequest" data-search="true"
                         data-pagination="true" data-buttons-class="cronos"
                        data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="true"
                        data-show-columns="true" data-show-columns-toggle-all="true" data-show-export="false"
                        data-click-to-select="true" data-toggle="table" data-select-item-name="toolbar1" data-page-list="[10, 25, 50, 100, all]"
                        data-sort-name="name" data-page-size="10" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="CodeStation" data-sortable="true">Code Station</th>
                                <th data-field="DesignationStation" data-sortable="true">Désignation</th>
                                <th data-field="LocalisationStation" data-sortable="true">Localisation</th>
                                <th data-field="ContactStation" data-sortable="true">Contacts</th>
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
                '<a class="editGestionSation" style="color:blue" href="javascript:void(0)" title="Modifier">',
                '<i class="fas fa-edit" aria-hidden="true"></i>',
                '</a>',
                '&nbsp;&nbsp;', // Ajout d'un espace supplémentaire
                '<a class="deleteGestionSation" style="color:red" href="javascript:void(0)" title="Supprimer">',
                '<i class="fas fa-trash" aria-hidden="true"></i>',
                '</a>'
            ].join('');
        }

        window.actionEvents = {
            'click .editGestionSation': function(e, value, row, index) {
                var id = row.id;
                $('#ModalEdit').modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('gestionstation.edit', ['id' => ':id']) }}".replace(':id', id),
                    success: function(response) {
                        console.log(response);
                        $('#CodeStation').val(response.Station.CodeStation);
                        $('#DesignationStation').val(response.Station.DesignationStation);
                        $('#LocalisationStation').val(response.Station.LocalisationStation);
                        $('#ContactStation').val(response.Station.ContactStation);
                        $('#id').val(response.Station.id);
                    }
                });
            },

            'click .deleteGestionSation': function(e, value, row, index) {
                var id = row.id;
                $('#ModalDelete').modal('show');
                $('#deleteing_id').val(id);
            }
        };
    </script>

    <script>
        // your custom ajax request here
        function ajaxRequest(params) {
            var url = '{{ route('Gestion+Station.create') }}'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }
    </script>
@endsection
