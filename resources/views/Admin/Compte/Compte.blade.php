@extends('layouts.admin-layout.main')
@section('GestionPage')
    @include('sweetalert::alert')

    <div class="pagetitle">
        <h1 class="fw-bold"><i class="bi bi-folder"></i> Compte</h1>

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
                        <button type="button" class="btn text-white mb-4 bg-primary"
                            data-bs-toggle="modal" data-bs-target="#basicModal"><i class="fas fa-plus-circle"></i>
                            <span>Ajouter une Compte</span></button>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="table" data-toggle="table"
                        data-ajax="ajaxRequest" data-toolbar="#btnModalFormGestionProduits" data-buttons-class="primary"
                        data-show-refresh="false" data-show-toggle="false" data-show-fullscreen="false"
                        data-show-columns="false" data-show-columns-toggle-all="false" data-show-export="false"
                        data-page-list="[10, 25, 50, 100, all]" data-click-to-select="true" data-toggle="table"
                        data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name"
                        data-page-size="10" data-sort-order="desc">
                        <thead>
                            <tr>
                                <th data-field="name" data-sortable="true">Nom (au complet)</th>
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="task" data-sortable="true">Permission</th>
                                <th data-field="password" data-sortable="true">Password</th>
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
    @if (in_array('Suppression', $userTasks))
        @include('Admin.Compte.deleteCompte')
    @endif

    @if (in_array('Ecriture', $userTasks))
        @include('Admin.Compte.editCompte')
    @endif

    @if (in_array('Ecriture', $userTasks))
        @include('Admin.Compte.addCompte')
    @endif
@endsection
@section('script')
    <script>
        // your custom ajax request here
        function ajaxRequest(params) {
            var url = '{{ route('Gestion+Compte.create') }}'
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
                    url: "{{ route('gestionCompte.edit', ['id' => ':id']) }}".replace(':id', id),
                    success: function(response) {
                        console.log(response.Compte);
                        $('#name').val(response.Compte.name);
                        $('#email').val(response.Compte.email);
                        var tasks = response.Compte.task.split(',');
                        console.log(
                            tasks); // Vérifiez si les tâches sont correctement divisées en un tableau

                        var
                            existingOptions = []; // Tableau pour stocker les valeurs des options récupérées via AJAX

                        $('#task').empty();

                        tasks.forEach(function(task) {
                            console.log(task.trim()); // Vérifiez chaque tâche
                            var trimmedTask = task.trim();
                            $('#task').append('<option value="' + trimmedTask + '" selected>' +
                                trimmedTask + '</option>');
                            existingOptions.push(
                                trimmedTask
                            ); // Ajoutez la tâche au tableau des options existantes
                        });

                        // Ajoutez les options générées par la boucle Blade uniquement si elles n'existent pas déjà
                        @foreach ($permission as $key)
                            var optionValue = "{{ $key->nomAcces }}";
                            var optionName = "{{ $key->nomAcces }}";
                            if (!existingOptions.includes(optionValue)) {
                                $('#task').append('<option value="' + optionValue + '">' + optionName +
                                    '</option>');
                            }
                        @endforeach
                        $('#id').val(response.Compte.id);
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
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,

        });

        $('.multiple-select-fiel').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,

        });
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
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,

        });

        $('.multiple-select-fiel').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,

        });
    </script>
@endsection
