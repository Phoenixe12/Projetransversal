@extends('layouts.admin-layout.main')
@section('GestionPage')
    @include('sweetalert::alert')
    <style>
        .bg-cronos {
            background-color: #4c5863;
        }

        .btn-cronos {
            background-color: #4c5863;
            color: #ffffff;
        }
    </style>

    <section class="section profile">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if (empty(auth()->user()->image))
                                <img class="rounded-circle" src="{{ asset('assetss/dist/img/logo/logo.png') }}"
                                    alt="User profile picture">
                            @else
                                <img class="rounded-circle" src="{{ asset('img/' . auth()->user()->image) }}"
                                    alt="User profile picture" width="100px" height="100px">
                            @endif
                            <h2>{{ auth()->user()->name }}</h2>
                            <h3>Administrateur système</h3>
                            <div class="social-links mt-2">
                                <!-- Add social links here if needed -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-edit">Editer le Profil</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Changer le mot de passe</button>




                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('user-profile-information.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <!-- Profile image -->
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                @if (empty(auth()->user()->image))
                                                    <img class="rounded-circle"
                                                        src="{{ asset('assetss/dist/img/logo/logo.png') }}"
                                                        alt="User profile picture">
                                                @else
                                                    <img class="rounded-circle"
                                                        src="{{ asset('img/' . auth()->user()->image) }}"
                                                        alt="User profile picture" width="100px" height="100px">
                                                @endif
                                                <div class="pt-2">
                                                    <div class="mt-2">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="document.getElementById('fileInput').click();"><i
                                                                class="bi bi-upload"></i> Choisir une image</button>
                                                    </div>
                                                    <input type="file" id="fileInput" name="image" class="d-none"
                                                        accept="image/*" onchange="handleFiles(event)" >
                                                    <div class="mt-2">
                                                        <span class="text-primary" id="fileCount">Aucune image
                                                            sélectionnée</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Full Name -->
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom au
                                                complet</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="hidden" class="form-control" id="id" name="id"
                                                    value="{{ auth()->user()->id }}">
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') ?? auth()->user()->name }}" required
                                                    autocomplete="name" autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') ?? auth()->user()->email }}" required
                                                    autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('user-password.update') }}">
                                        @csrf
                                        @method('PUT')

                                        <!-- Current Password -->
                                        <div class="row mb-3">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                                    value="{{ auth()->user()->id }}">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de
                                                passe actuel</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password"
                                                    class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                                    name="current_password" required autofocus>
                                                @error('current_password', 'updatePassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- New Password -->
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot
                                                de
                                                passe</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password"
                                                    class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">
                                                @error('password', 'updatePassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Changer le mot de
                                                passe</button>
                                        </div>
                                    </form><!-- End Change Password Form -->
                                </div>
                            </div><!-- End Tab Content -->
                        </div>
                    </div>
                </div>
            </div><!-- End Row -->
        </div><!-- End Container-fluid -->
    </section><!-- End Profile Section -->
@endsection
@section('script')
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
    function handleFiles(event) {
        const files = event.target.files;
        const fileCount = files.length;

        if (fileCount !== 1) {
            alert('Veuillez sélectionner une seule image.');
            event.target.value = ''; // Clear the input
            document.getElementById('fileCount').innerText = 'Aucune image sélectionnée';
            return;
        }

        const file = files[0];
        if (file.size > 100 * 1024) { // 100 Ko
            alert('Chaque image doit être inférieure à 100 Ko.');
            event.target.value = ''; // Clear the input
            document.getElementById('fileCount').innerText = 'Aucune image sélectionnée';
            return;
        }

        document.getElementById('fileCount').innerText = `${fileCount} image(s) sélectionnée(s)`;
    }
</script>

@endsection
