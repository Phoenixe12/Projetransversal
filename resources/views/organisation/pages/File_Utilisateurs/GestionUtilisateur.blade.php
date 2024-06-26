@extends('Admin.pages.layout.header')
@section('GestionCommande')
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
                    @include('sweetalert::alert')
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
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
                    <h2 class="card-title text-white">Gestion des utilisateurs système</h2>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  

                    <table class="table table-striped table-bordered table-hover"
                        data-toolbar="#btnModalFormGestionCiternes" id="table" data-toggle="table"
                        data-ajax="ajaxRequest" data-buttons-class="cronos" data-show-refresh="true" data-show-toggle="true"
                        data-show-fullscreen="true" data-show-columns="true" data-show-columns-toggle-all="true"
                        data-show-export="false" data-click-to-select="true" data-toggle="table" data-search="true"
                        data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-page-size="10"
                        data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="employee_nom" data-sortable="true">Nom</th>
                                   <th data-field="employee_prenoms" data-sortable="true">Prenom</th>
                                <th data-field="user_email" data-sortable="true">Email</th>
                                <th data-field="statut_nom" data-sortable="true">Role</th>
                                <th data-field="station_designation" data-sortable="true">station</th>
                                <th data-field="" data-sortable="true">Mot de passe</th>
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
    @include('organisation.pages.File_Utilisateurs.editUtilisateur')
@endsection

<!-- Modal-->



@section('script')
    <script>
        function actionFormatter(value, row, index) {
            return [
                '<a class="editUtilisateur" style="color:blue" href="javascript:void(0)" title="Modifier">',
                '<i class="fas fa-edit" aria-hidden="true"></i>',
                '</a>'

            ].join('');
        }

        window.actionEvents = {
            'click .editUtilisateur': function(e, value, row, index) {
                var id = row.id;

                $('#ModalEdit').modal('show');
                $.ajax({
                    type: "GET",
                    url: "{{ route('gestionUtilisateurs.edit', ['id' => ':id']) }}".replace(':id', id),
                    success: function(response) {
                        console.log(response.User);
                        $('#email').val(response.User.email);
                        $('#password').val(response.User.password);
                        $('#id').val(response.User.id);
                    }
                });
            },

            'click .deleteUtilisateur': function(e, value, row, index) {
                var id = row.id;
                $('#ModalDelete').modal('show');
                $('#deleteing_id').val(id);
            }
        };
    </script>

    <script>
        // your custom ajax request here
        function ajaxRequest(params) {
            var url = '{{ route('Gestion+Utilisateurs.create') }}'
            $.get(url + '?' + $.param(params.data)).then(function(res) {
                params.success(res)
            })
        }
    </script>
    <script>



        $('#station_id').change(function() {
    var station_id = $(this).val(); // Obtenez la valeur sélectionnée
    // Effectuez une requête AJAX pour récupérer les utilisateurs en fonction de la station sélectionnée
    $.ajax({
        type: 'GET',
        url: '/getUtilisateurs',
        data: { station_id: station_id }, // Assurez-vous d'inclure le paramètre "station_id"
        success: function(response) {
            // Mettez à jour le champ de sélection "nom" avec les options récupérées
            $('#nom').html(response.options);
        },
        error: function(xhr, textStatus, errorThrown) {
            // Gérez les erreurs ici
            console.error('Erreur AJAX: ' + textStatus);
        }
    });
});
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fonction pour mettre à jour le champ de sélection des produits
            function updateProductSelect(options) {
                var stationSelected = document.getElementById("station_id");
                if (stationSelected) {
                    stationSelected.innerHTML = options;
                }
            }

            // Lorsque la sélection du type de produit change
            $("#nom").change(function() {
                var selectedValue = $(this).val();

                // Effectuer une requête AJAX POST vers Laravel
                $.ajax({
                    url: '/getUtilisateurs', // Remplacez par l'URL de votre route Laravel
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        selectedValue: selectedValue,
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Récupère le jeton CSRF
                    },

                    success: function(response) {
                        var stationSelected = document.getElementById("Produit");
                        if (stationSelected) {
                            stationSelected.innerHTML = response;
                        }
                    },

                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
