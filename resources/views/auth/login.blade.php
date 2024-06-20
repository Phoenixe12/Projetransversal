@include('layouts.auth-layout.auth-header')
@include('sweetalert::alert')
<!-- Rest of your code -->

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


                    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Entrez votre e-mail" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Mot de passe</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        <small style="color:#5FAEF5">Mot de passe oublié?</small>
                                    </a>
                                @endif
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-text cursor-pointer">
                                    <i class="bx bx-hide"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember-me">
                                    Se souvenir de moi</label>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center ">

                            {!! htmlFormSnippet() !!}
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button class="btn  d-grid w-50" type="submit"
                                style=" background:#5FAEF5;color:#fff; border-color:#5FAEF5;">
                                Se connecter
                            </button>
                        </div>
                    </form>
                    <p class="text-center ">
                        <span>Pour vous inscrire,</span>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">
                                <small  style="color:#5FAEF5">Cliquez ici.</small>
                            </a>
                        @endif
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
