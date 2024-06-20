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


<div class="container-xxl mt-lg">
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

                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="d-flex justify-content-center ">
                        <div class="app-brand-link gap-2">
                            <span class="app-brand-logo">
                                Recevoir le lien de réinitialisation
                            </span>
                        </div>
                    </div>

                    <form id="formAuthentication" class="mt-4" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mt-3 mb-4">
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
                         <div class="mb-3 d-flex justify-content-center ">

                            {!! htmlFormSnippet() !!}
                        </div>
                        <div class="mt-4 d-flex justify-content-center">
                            <button class="btn  d-grid w-50" type="submit"
                                style=" background:#5FAEF5;color:#fff; border-color:#5FAEF5;">
                                    Envoyer
                            </button>
                        </div>
                    </form>
                 <p class="text-center">

                        <a href="{{ route('login') }}" style="color:#5FAEF5;">
                            Retour à la page de connexion
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


