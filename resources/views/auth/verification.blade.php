@include('layouts.auth-layout.auth-header')
@include('sweetalert::alert')
<style>
    .otp-input {
        text-align: center; /* Centrer le texte */
    }
     #resend {
        cursor: pointer;
    }
    .text-size-10 {
    font-size: 14px;
}
</style>

@if (session('status'))
    <div class="toastrDefaultSuccess" role="alert" style="display: none;">
        {{ session('status') }}
    </div>
@endif


<div class="container-xxl mt-lg-5">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="d-flex justify-content-center mb-3">
                        <span class="app-brand-logo text-success fw-bolder fs-3">OTP vérification</span>
                    </div>
                    <!-- /Logo -->
                     <!-- /Logo -->
                   <div class="d-flex justify-content-center">
                        <div class="app-brand-link gap-2 text-center">
                            <span class="text-size-10">
                                Veuillez saisir le code de vérification envoyé à votre adresse mail:
                                <span style="color:#5FAEF5;">{{ auth()->user()->email }}</span>
                            </span>
                        </div>
                    </div>

                    <form id="formAuthentication" class="m-4" method="POST" action="{{ route('verification.verify') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Champ input caché pour stocker l'e-mail de l'utilisateur -->
                        <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                        <div class="form-group row justify-content-center">
                            <div class="row">
                                <div class="col-md-3 col-3">
                                    <!-- Champ input 1 -->
                                    <input id="otp1" type="text" maxlength="1" class="form-control otp-input @error('otp1') is-invalid @enderror" name="otp1" required autocomplete="off" pattern="\d*">
                                    @error('otp1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-3">
                                    <!-- Champ input 2 -->
                                    <input id="otp2" type="text" maxlength="1" class="form-control otp-input @error('otp2') is-invalid @enderror" name="otp2" required autocomplete="off" pattern="\d*">
                                    @error('otp2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-3">
                                    <!-- Champ input 3 -->
                                    <input id="otp3" type="text" maxlength="1" class="form-control otp-input @error('otp3') is-invalid @enderror" name="otp3" required autocomplete="off" pattern="\d*">
                                    @error('otp3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 col-3">
                                    <!-- Champ input 4 -->
                                    <input id="otp4" type="text" maxlength="1" class="form-control otp-input @error('otp4') is-invalid @enderror" name="otp4" required autocomplete="off" pattern="\d*">
                                    @error('otp4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success w-md-50 w-100 mt-3">Vérifier</button>
                            </div>
                        </div>
                    </form>

                    <div class="text-center mt-5">
                        <form id="resendOpt" class="mb-3" method="POST" action="{{ route('resendOTP') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                            <div class="text-success" id="resend">Renvoyer le code OTP</div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Forgot Password -->
        </div>
    </div>
</div>




  <!-- /.modal -->
<!-- / Content -->
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
    document.addEventListener('DOMContentLoaded', function() {
        var inputs = document.querySelectorAll('.otp-input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].addEventListener('input', function(event) {
                // Vérifier si la saisie est un chiffre
                if (/^\d$/.test(this.value)) {
                    // Déplacer le focus vers le champ suivant
                    var maxLength = parseInt(this.getAttribute('maxlength'));
                    var currentLength = this.value.length;
                    if (currentLength >= maxLength) {
                        var index = Array.prototype.indexOf.call(inputs, this);
                        if (index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }
                    }
                } else {
                    // Supprimer les caractères non numériques
                    this.value = this.value.replace(/\D/g, '');
                }
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sélectionner l'élément avec l'ID resend
        var resendButton = document.getElementById('resend');
        // Ajouter un écouteur d'événement de clic
        resendButton.addEventListener('click', function() {
            // Soumettre le formulaire resendOpt
            document.getElementById('resendOpt').submit();
        });
    });
</script>

