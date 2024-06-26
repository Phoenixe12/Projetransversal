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
        // your custom ajax request here
        function ajaxRequest(params) {
            var url = '{{ route('Gestion+Echantillon.create') }}'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }
    </script>
@endsection
