@include('layouts.auth-layout.auth-header')
@include('sweetalert::alert')

@if (session('status'))
    <div class="toastrDefaultSuccess" role="alert" style="display: none;">
        {{ session('status') }}
    </div>
@endif

@if (!session('status'))
    <div class="toastrDefaultError" role="alert" style="display: none;">
        Connection problem
    </div>
@endif


<style>
    .button-container {
        position: relative;
        overflow: hidden;
        width: 200px;
        /* Vous pouvez ajuster la largeur ici */
        height: 23px;
        background-color: #D8EDF9;
        border-radius: 3px;
        display: flex;
        align-items: center;
    }

    .toggle-option-container {
        width: 100px;
        /* Largeur ajustée pour chaque option */
        font-size: 12px;
        font-weight: 500;
        color: #000000;
        text-align: center;
    }

    .slide-button {
        width: 100px;
        height: 90%;
        background-color: #FFFFFF;
        border-radius: 3px;
        transition: transform 0.3s ease;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 12px;
        /* Taille de police ajustée */
        text-align: center;
        /* Texte centré */
        cursor: pointer;
        /* Curseur pointer */
        font-weight: 500;
    }

    .toggle-option {
        cursor: pointer;
        /* Curseur pointer pour le texte */
    }

    #entreprise.active {
        color: blue;
        /* Style the active option as you prefer */
    }

    #fournisseur.active {
        color: blue;
        /* Style the active option as you prefer */
    }

    .che {
        font-size: 14px;
        font-weight: none;
    }

    .img-flag {
        width: 20px;
        height: auto;
        margin-right: 10px;
    }

    .select2-container--default .select2-selection--single {
        height: 40px;
        /* Increase the height of the select box */
        padding: 6px 12px;
        font-size: 16px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 28px;
        /* Align text vertically */
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 36px;
    }

    .select2-container--default .select2-results__option {
        padding: 8px 10px;
        font-size: 16px;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #f1f1f1;
        color: #333;
    }



    .country-option {
        display: flex;
        align-items: center;
    }

    .country-option img {
        margin-right: 10px;
    }

    .select2-container--default .select2-selection--multiple {
        height: auto;
        padding: 6px 12px;
        font-size: 16px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        background-color: #fff;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        overflow: hidden;
        list-style: none;
        width: 100%;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        padding: 3px 10px;
        background-color: #e9ecef;
        color: #495057;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        margin-left: 8px;
        color: #dc3545;
        cursor: pointer;
    }

    .select2-container--default .select2-results__option {
        padding: 8px 10px;
        font-size: 16px;
        display: flex;
        align-items: center;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #e9ecef;
        color: #495057;
    }

    .select2-checkbox {
        margin-right: 8px;
    }

    .select2-container .select2-dropdown .select2-search {
        padding: 8px;
    }

    .select2-container .select2-dropdown .select2-search input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        padding: 3px 10px;
        background-color: #e9ecef;
        color: #495057;
        border: 1px solid #87ceeb;
        /* Couleur bleu ciel */
        border-radius: 0.25rem;
    }


    .select2-container--default .select2-selection--multiple .select2-search--inline {
        flex-grow: 1;
    }

    .select2-container--default .select2-selection--multiple .select2-search__field {
        width: 100% !important;
        border: none;
        outline: none;
    }

    .custom-dropdown .select2-search input {
        width: calc(100% - 20px);
        /* Largeur ajustée */
    }

    .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
        text-align: center;
        /* Centrer horizontalement */
    }
</style>


<div class="container-xxl mt-lg-5">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="d-flex justify-content-center">
                        <a href="#" class="app-brand-link gap-2">
                            <span class="app-brand-logo fw-bolder fs-3">
                                <img src="{{ asset('assetss/dist/img/logo.png') }}" width="150px"
                                    height="150px" alt="">
                            </span>
                            <span class="app-brand-text demo text-body "></span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="d-flex justify-content-center ">
                        <div class="app-brand-link gap-2">
                            <span class="app-brand-logo">
                                Information de Fournisseur
                            </span>
                        </div>
                    </div>

                    <form id="formAuthentication" class="mt-5" method="POST"
                        action="{{ route('Fournisseur.store') }}">
                        @csrf

                        <input type="hidden" id="idUser" value="{{ auth()->user()->id }}" name="idUser" />
                        <div class="row mt-3">
                            <div class="col">
                                <label for="nomCommercial" class="form-label">Nom commercial<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nomCommercial') is-invalid @enderror"
                                    name="nomCommercial" value="{{ old('nomCommercial') }}"
                                    autocomplete="nomCommercial" placeholder="Nom commercial" required autofocus />
                                @error('nomCommercial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="nomFournisseur" class="form-label">Nom de l’entreprise <span
                                        class="text-danger"></span></label>
                                <input type="text" class="form-control @error('nomFournisseur') is-invalid @enderror"
                                    name="nomFournisseur" value="{{ old('nomFournisseur') }}" 
                                    autocomplete="nomFournisseur"
                                    placeholder="Si elle est différente du nom commerciale " autofocus />
                                @error('nomFournisseur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="codePays" class="form-label">Numéro de l’entreprise<span class="text-danger">
                                    *</span></label>
                            <div class="col-3">
                                <input type="text" class="form-control @error('codePays') is-invalid @enderror"
                                    name="codePays" value="{{ old('codePays') }}" required autocomplete="codePays"
                                    placeholder="Code" autofocus />
                                @error('codePays')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                                    name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone"
                                    placeholder="Numeros de télephone " autofocus />
                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label for="adresse" class="form-label">Adresse <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror"
                                    name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse"
                                    placeholder="Entrez votre adresse" autofocus />
                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label for="selectFournisseurCategorie" class="form-label">Catégorie fournisseur <span
                                        class="text-danger">*</span></label>
                                <select id="selectFournisseurCategorie"
                                    class="form-control @error('selectFournisseurCategorie') is-invalid @enderror"
                                    name="idFournissseurCategorie[]" multiple="multiple" required></select>
                                @error('selectFournisseurCategorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label for="pays" class="form-label">Pays <span
                                        class="text-danger">*</span></label>
                                <select id="pays" class="form-control @error('pays') is-invalid @enderror"
                                    name="nomPays" required autocomplete="pays"></select>
                                @error('pays')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label for="idZone" class="form-label">Région<span
                                        class="text-danger">*</span></label>
                                <select id="idZone" class="form-control @error('idZone') is-invalid @enderror"
                                    name="idZone" required autocomplete="idZone"></select>
                                @error('idZone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="p-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="checkCondition"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <div class="che p-1" for="remember-me">
                                    Accepter les <span><a href="#" style="color:#5FAEF5;"> termes</a></span> et
                                    <span><a href="#" style="color:#5FAEF5;"> conditions
                                        </a></span>d’utilisations
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 mt-3 d-flex justify-content-center">
                            <button class="btn  d-grid w-50" type="submit"
                                style=" background:#5FAEF5;color:#fff; border-color:#5FAEF5;">
                                valider
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>


@include('layouts.auth-layout.auth-footer')

<script>
    $(function() {
        $('.toastrDefaultSuccess').each(function() {
            toastr.success($(this).text());
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
    $(document).ready(function() {
        var select = $('#pays');

        // Add the default option
        select.append('<option selected disabled>Choisissez un pays</option>');

        // Initialize Select2
        select.select2({
            templateResult: formatCountry,
            templateSelection: formatCountry,
            escapeMarkup: function(markup) {
                return markup;
            } // Let Select2 handle HTML markup
        });

        // Make the AJAX request to fetch country data
        $.ajax({
            url: 'https://admin.wholeorderz.com/api/pays',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Success callback
                select.find('option:not(:first-child)')
                    .remove(); // Remove the default loading option

                // Check if data is present and not empty
                if (response && response.status === "00" && response.data && response.data.length >
                    0) {
                    // Loop through the data and populate the dropdown menu
                    response.data.forEach(function(country) {
                        var option = '<option value="' + country.nomPays + '" data-flag="' +
                            country.flags + '" data-code="' + country.codePays + '">' +
                            country.nomPays + '</option>';
                        select.append(option);
                    });
                } else {
                    console.error('No data received from the API or data is empty');
                    // Add a placeholder option indicating no data available
                    select.append('<option disabled>No data available</option>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Error callback
                console.error('AJAX Error:', textStatus, errorThrown);
                // Add a placeholder option indicating error
                select.append('<option disabled>Error loading data</option>');
            }
        });

        // Format country options with flag
        function formatCountry(country) {
            if (!country.id) {
                return country.text;
            }
            var flagUrl = $(country.element).data('flag');
            if (flagUrl) {
                return '<span><img src="' + flagUrl + '" class="img-flag" /> ' + country.text + '</span>';
            }
            return '<span>' + country.text + '</span>';
        }

        // Event handler for when a country is selected
        select.on('change', function() {
            var selectedCountry = $(this).find('option:selected');
            var countryCode = selectedCountry.data('code');
            // Afficher le code du pays dans une alerte

        });

    });
</script>


<script>
    $(document).ready(function() {
        // Event listener for when the country selection changes
        $('#pays').on('change', function() {
            var selectedCountryId = $(this).find('option:selected').data(
                'code'); // Get the selected country ID
            // alert(selectedCountryId);

            // Make the AJAX request to fetch zones based on the selected country ID
            $.ajax({
                url: 'https://admin.wholeorderz.com/api/zone',
                type: 'POST',
                dataType: 'json',
                data: {
                    codePays: selectedCountryId
                }, // Send the selected country ID as data
                success: function(response) {
                    var selectZone = $('#idZone'); // Get the zone select element

                    // Clear existing options
                    selectZone.empty();

                    // Add default option
                    selectZone.append(
                        '<option selected disabled>Choisissez une zone</option>');

                    // Check if data is present and not empty
                    if (response && response.status === "00" && response.data && response
                        .data.length > 0) {
                        // Loop through the data and populate the zone dropdown menu
                        response.data.forEach(function(zone) {
                            // Check if the zone's country code matches the selected country code
                            if (zone.codePays === selectedCountryId) {
                                selectZone.append('<option value="' + zone.id +
                                    '">' +
                                    zone.nomZone + '</option>');
                            }
                        });
                    } else {
                        console.error('No data received from the API or data is empty');
                        // Add a placeholder option indicating no zones available
                        selectZone.append('<option disabled>No zones available</option>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Error callback
                    console.error('AJAX Error');
                    // Add a placeholder option indicating error
                    $('#idZone').append('<option disabled>Error loading zones</option>');
                }
            });
        });
    });
</script>



<script>
    // Fonction pour récupérer le code du pays de l'utilisateur
    function getCodePaysUtilisateur() {
        fetch('https://ipapi.co/json/')
            .then(response => response.json())
            .then(data => {
                const codePays = data.country_calling_code;
                // Sélection de l'élément input par son nom
                const inputCodePays = document.getElementsByName('codePays')[0];
                // Supprimer le symbole "+" du code du pays
                const codePaysSansPlus = codePays.replace('+', '');
                // Ajout automatique du code du pays dans le champ input sans le symbole "+"
                inputCodePays.value = codePaysSansPlus;
                // Mise à jour de la longueur maximale du champ de téléphone
                updatePhoneLength();
            })
            .catch(error => console.error('Erreur lors de la récupération du code du pays :', error));
    }

    // Appel de la fonction au chargement de la page
    window.onload = getCodePaysUtilisateur;

    // Fonction pour mettre à jour la longueur maximale du champ de téléphone
    function updatePhoneLength() {
        const codePays = document.getElementsByName('codePays')[0].value;
        const inputTelephone = document.getElementsByName('telephone')[0];
        let maxLength = 15; // Longueur par défaut
        if (codePays === '1') {
            maxLength = 15; // Pour les États-Unis
        } else if (codePays === '33') {
            maxLength = 12; // Pour la France
        }
        // Mettre à jour la longueur maximale du champ de téléphone
        inputTelephone.maxLength = maxLength;
    }
</script>





<script>
    $(document).ready(function() {
        var select = $('#selectFournisseurCategorie');

        // Ajouter l'option par défaut

        // Initialiser Select2 avec l'option de sélection multiple
        select.select2({
            placeholder: "Choisissez une catégorie",
            allowClear: true,
            templateResult: formatState,
            templateSelection: formatState,
            closeOnSelect: false,
            width: '100%',
            dropdownCssClass: 'custom-dropdown' // Ajouter une classe personnalisée pour styliser la liste déroulante
        });

        $.ajax({
            url: "https://admin.wholeorderz.com/api/fournisseur/categorie",
            type: "GET",
            dataType: "json",
            success: function(response) {
                // Réussite de la requête
                // Supprimer les options existantes (sauf l'option par défaut)
                select.find('option:not(:first-child)').remove();

                // Vérifier que les données sont présentes et non vides
                if (response && response.status === "00" && response.data) {
                    // Parcourir les données et ajouter chaque catégorie au menu déroulant
                    response.data.forEach(function(categorie) {
                        select.append('<option value="' + categorie.id + '">' + categorie
                            .fournisseur_categorie + '</option>');
                    });
                } else {
                    console.error('Les données de l\'API sont invalides');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Erreur lors de la requête
                console.error('Erreur lors de la récupération des catégories:', textStatus,
                    errorThrown);
                select.append('<option disabled>Erreur lors du chargement des données</option>');
            }
        });

        // Format des options avec checkbox
        function formatState(state) {
            if (!state.id) {
                return state.text;
            }

            var $state = $('<span><input type="checkbox" class="select2-checkbox" /> ' + state.text +
            '</span>');
            return $state;
        }

        // Mettre à jour les checkbox en fonction de la sélection
        select.on('select2:select select2:unselect', function(e) {
            var selectedElements = select.find('option:selected');
            $('.select2-checkbox').prop('checked', false);
            selectedElements.each(function() {
                var $element = $(".select2-results__option[aria-selected='true']");
                $element.find('.select2-checkbox').prop('checked', true);
            });
        });

        // Déplacer la barre de recherche dans la liste déroulante
        $('.custom-dropdown').on('select2:open', function() {
            var searchInput = $('.select2-search');
            $('.select2-dropdown').prepend(searchInput);
        });
    });
</script>
