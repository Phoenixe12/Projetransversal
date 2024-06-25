@include('layouts.admin-layout.header')
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="row logo align-items-center">
            <div class="col-2">
                <img src="{{ asset('assets/dist/img/logo/logo.png') }}" alt="">
            </div>
            <div class="col-10">
                <span class="fs-6 d-lg-block">Biobanque</span><span class=""
                    style="font-size:12px; font-weight:none;">Administrateur</span>
            </div>
        </a>

        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-success badge-number">4</span>
                </a><!-- End Notification Icon -->



            </li><!-- End Notification Nav -->



            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">


                    @if (empty(auth()->user()->images))
                        <img src="{{ asset('assets/dist/img/logo/logo.png') }}" alt="Profile" class="rounded-circle"
                            width="50" height="50">
                    @else
                        <img src="{{ asset('img/' . auth()->user()->images) }}" alt="Profile" class="rounded-circle"
                            width="50" height="50">
                    @endif
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li class="dropdown-header">

                        <h6>{{ auth()->user()->name }}</h6>
                        <span>Administrateur</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('Gestion+Profil.index') }}">
                            <i class="bi bi-person-circle"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Aide support</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bi bi-box-arrow-right"></i> Se
                            déconnecter</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                        @csrf
                    </form>
            </li>



        </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('home.index') }}">
                <i class="bi bi-columns-gap"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#information-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-archive"></i><span>Informations</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="information-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('Information+Entreprise.index') }}">
                        <i class="bi bi-circle"></i><span>KYC Entreprise</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Information+Fournisseur.index') }}">
                        <i class="bi bi-circle"></i><span>KYV Fournsseur</span>
                    </a>
                </li>
            </ul>

        </li><!-- End Facture Nav -->

        </li><!-- End Commande Nav -->

        </li><!-- End Commande Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-folder"></i></i><span>Catégories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('Categorie+Produit.index') }}">
                        <i class="bi bi-circle"></i><span>Produit</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Categorie+Mesure.index') }}">
                        <i class="bi bi-circle"></i><span>Mesure</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Categorie+Entreprise.index') }}">
                        <i class="bi bi-circle"></i><span>Entreprise</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Categorie+Fournisseur.index') }}">
                        <i class="bi bi-circle"></i><span>Fournisseur</span>
                    </a>
                </li>

            </ul>

        </li><!-- End Facture Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#Flags-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-flag"></i><span>Territoires</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="Flags-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('Gestion+Country.index') }}">
                        <i class="bi bi-circle"></i><span>Pays</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Gestion+Region.index') }}">
                        <i class="bi bi-circle"></i><span>Région</span>
                    </a>
                </li>
            </ul>

        </li><!-- End Facture Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Galerie+Produit.index') }}">
                <i class="bi bi-images"></i><span>Galerie</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-file-text"></i><span>Commande <span
                        class="badge bg-success badge-number">4</span></span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('Gestion+Profil.index') }}">
                <i class="bi bi-person-circle"></i><span>Profile</span>
            </a>
        </li><!-- End Messagerie Nav -->
        @php
            // Convertir la chaîne en tableau et supprimer les espaces blancs autour des valeurs
            $userTasks = array_map('trim', explode(',', auth()->user()->task));
        @endphp

        @if (in_array('Administrateur', $userTasks))
            <li class="nav-item">

                <a class="nav-link collapsed" href="{{ route('Gestion+Utilisateurs.index') }}">
                    <i class="bi bi-building-add"></i><span>Entreprise</span>
                </a>

            </li><!-- End Messagerie Nav -->
        @endif



        <li class="nav-item">
            <a class="nav-link collapsed text-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right text-danger"></i> Se
                déconnecter</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                @csrf
            </form>


        </li><!-- End Messagerie Nav -->
    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">
    @yield('GestionPage')
</main>

@include('layouts.admin-layout.footer')
@yield('script')
