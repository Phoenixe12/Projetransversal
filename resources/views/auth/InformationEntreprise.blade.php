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
                                Information sur l'organisation
                            </span>
                        </div>
                    </div>

                    <form id="formAuthentication" class="mt-5" method="POST" 
                        action="{{ route('Entreprise.store') }}"  enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="idUser" value="{{ auth()->user()->id }}" name="idUser" />
                        <div class="row mt-3">
                            <div class="col">
                                <label for="nomOrganisation" class="form-label">Nom de l'organisation<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nomOrganisation') is-invalid @enderror"
                                    name="nomOrganisation" value="{{ old('nomOrganisation') }}" required
                                    autocomplete="nomOrganisation" placeholder="Nom commercial" autofocus />
                                @error('nomOrganisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="emailOrganisation" class="form-label">Email<span
                                        class="text-danger"></span></label>
                                <input type="email" class="form-control @error('emailOrganisation') is-invalid @enderror"
                                    name="emailOrganisation" value="{{ old('emailOrganisation') }}" 
                                    autocomplete="emailOrganisation	"
                                    placeholder="Si elle est différente du nom commerciale " autofocus />
                                @error('emailOrganisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="codePays" class="form-label">Numéro de telephone<span class="text-danger">
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
                                <label for="documentPdf" class="form-label">Preuve de son l'existance <span
                                        class="text-danger">*</span></label>
                                <input type="file" class="form-control @error('documentPdf') is-invalid @enderror"
                                    name="documentPdf" value="{{ old('documentPdf') }}" 
                                    autocomplete="documentPdf"
                                    placeholder="Si elle est différente du nom commerciale " autofocus />
                                @error('documentPdf')
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
                            country.flags + '">' + country.nomPays + '</option>';
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



