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
            width: 200px; /* Vous pouvez ajuster la largeur ici */
            height: 23px;
            background-color: #D8EDF9;
            border-radius: 3px;
            display: flex;
            align-items: center;
        }

        .toggle-option-container {
            width: 100px; /* Largeur ajustée pour chaque option */
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
            font-size: 12px; /* Taille de police ajustée */
            text-align: center; /* Texte centré */
            cursor: pointer; /* Curseur pointer */
            font-weight: 500;
        }

        .toggle-option {
            cursor: pointer; /* Curseur pointer pour le texte */
        }

        #entreprise.active {
            color: blue; /* Style the active option as you prefer */
        }

        #fournisseur.active {
            color: blue; /* Style the active option as you prefer */
        }

</style>


<div class="container-xxl mt-lg-5">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="">
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
                                S'inscrire avec un compte
                            </span>
                        </div>
                    </div>

                    <form id="formAuthentication" class="mt-3" method="POST" action="{{ route('register') }}">
                        @csrf

                     
                   
                     <input type="hidden" name="role" id="role" value="2" />
                       <div class="row mt-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name"
                                    placeholder="Entrez votre nom " autofocus />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="first_name" class="form-label">Prenom <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name"
                                    placeholder="Entrez vos prenoms " autofocus />
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label for="email" class="form-label">E-mail <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Entrez votre e-mail " autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col form-password-toggle">

                                <label for="adresse" class="form-label">Mot de passe <span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />

                                    <span class="input-group-text cursor-pointer">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-password-toggle">

                                <label for="adresse" class="form-label">Confirmation <span
                                        class="text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-confirm"
                                        class="form-control @error('password-confirm') is-invalid @enderror"
                                        name="password_confirmation" required autocomplete="current-password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password-confirm" />

                                    <span class="input-group-text cursor-pointer">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                         <div class="mb-3 d-flex justify-content-center ">

                            {!! htmlFormSnippet() !!}
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button class="btn  d-grid w-50" type="submit"
                                style=" background:#5FAEF5;color:#fff; border-color:#5FAEF5;">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                    <p class="text-center">
                        Vous avez déjà un compte ?
                        <a href="{{ route('login') }}" style="color:#5FAEF5;">
                            Se connecter
                        </a>
                    </p>
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
    // Fonction pour charger les pays via AJAX
    function chargerPays() {
        $.ajax({
            url: 'https://takaback.com/api/GetPays', // L'URL où se trouve la fonction pour récupérer les pays
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Parcourir les données et ajouter chaque pays à la liste déroulante
                $.each(data, function(key, value) {
                    $('#pays').append('<option value="' + value.nomPays + '">' + value.nomPays +
                        '</option>');
                });
            }
        });
    }

    // Appeler la fonction pour charger les pays lorsque le document est prêt
    $(document).ready(function() {
        chargerPays();
    });
</script>


