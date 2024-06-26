<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aesthetic Template">
    <meta name="keywords" content="Aesthetic, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biobanque</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('biobanque/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('biobanque/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('biobanque/css/flaticon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('biobanque/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('biobanque/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('biobanque/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('biobanque/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('biobanque/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('biobanque/css/style.css')}}" type="text/css">
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Menu Hors-Canvas Début -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="{{ route('accueil.index')}}">
                <img src="{{ asset('assetss/dist/img/logo.png') }}" width="70px" height="70px" alt="">
                BIO BANQUE
            </a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__btn">
            <a href="{{ route('login')}}" class="primary-btn">Login</a>
        </div>
        <ul class="offcanvas__widget">
            <li>
                <i class="fa fa-map-marker"></i>Sénégal, Dakar
            </li>
        </ul>

    </div>
    <!-- Menu Hors-Canvas Fin -->
    <!-- Section En-tête Début -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="header__top__left">
                            <li>
                                <i class="fa fa-map-marker"></i>Sénégal, Dakar
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="header__top__right">
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{('accueil.index')}}">
                            <img src="{{ asset('assetss/dist/img/logo.png') }}" width="70px" height="70px" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__menu__option">
                        <nav class="header__menu">
                            <ul>
                                <li class="active">
                                    <a href="{{('accueil.index')}}">Accueil</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="header__btn">
                            <a href="{{('login')}}" class="primary-btn">login</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Section En-tête Fin -->
    <!-- Section Héros Début -->
    <section class="hero spad set-bg" data-setbg="{{ asset('biobanque/img/hero-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero__text">
                        <span>Eiusmod tempor incididunt</span>
                        <h2>Obtenez le meilleur traitement de qualité au monde</h2>
                        <a href="#" class="primary-btn normal-btn">Contactez-nous</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Héros Fin -->
    <!-- Section de Consultation Commence -->
    <section class="consultation">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="consultation__form">
                        <div class="section-title">
                            <span>Biobanque</span>
                        </div>
                        <a href="#" class="site-btn">Contactez-nous</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="consultation__text">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="consultation__text__item">
                                    <div class="section-title">
                                        <span>Bienvenue à Biobanque</span>
                                        <h2>Découvrez les meilleures fonctionnalités offertes par
                                            <b>Biobanque</b>
                                        </h2>
                                    </div>
                                    <p>
                                        L'objectif principal d'une biobanque est de fournir des ressources de haute qualité pour la recherche biomédicale,
                                        facilitant ainsi l'étude des maladies, le développement de nouveaux traitements, et la personnalisation des
                                        soins de santé en fonction des profils génétiques et biologiques des individus.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="consultation__video set-bg" data-setbg="{{ asset('biobanque/img/consultation-video.jpg')}}">
                                    <a href="https://youtu.be/iK-K9aGm-y0?si=xcSBK3IP1R_NsYkM" class="play-btn video-popup">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section de Consultation Termine -->
    <!-- Section Pourquoi nous choisir Commence -->
    <section class="chooseus spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Pourquoi nous choisir ?</span>
                        <h2>Offre pour vous</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                        <img src="{{ asset('biobanque/img/icons/ci-1.png')}}" alt="">
                        <h5>Équipements avancés</h5>
                        <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                        <img src="{{ asset('biobanque/img/icons/ci-2.png')}}" alt="">
                        <h5>Médecins qualifiés</h5>
                        <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                        <img src="{{ asset('biobanque/img/icons/ci-3.png')}}" alt="">
                        <h5>Services certifiés</h5>
                        <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                        <img src="{{ asset('biobanque/img/icons/ci-4.png')}}" alt="">
                        <h5>Soins d'urgence</h5>
                        <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt facilisis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Pourquoi nous choisir Termine -->
    <!-- Section Pied de Page Commence -->
    <footer class="footer">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-7">
                    <div class="footer__widget">
                        <h5>Membres du groupe SSI</h5>
                        <ul>
                            <li>
                                <a href="#">-------------</a>
                            </li>
                            <li>
                                <a href="#">------------</a>
                            </li>
                            <li>
                                <a href="#">------------</a>
                            </li>
                            <li>
                                <a href="#">-------------</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-7">
                    <div class="footer__widget">
                        <h5>Membres du groupe GLSI</h5>
                        <ul>
                            <li>
                                <a href="#">Mohamed El Anewar A.A. DAMALA</a>
                            </li>
                            <li>
                                <a href="#">Memoue KONE</a>
                            </li>
                            <li>
                                <a href="#">Bacar IMANE</a>
                            </li>
                            <li>
                                <a href="#">Mamya Samane AIDARA</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-6">
                    <div class="footer__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d61741.745675912665!2d-17.522479522028593!3d14.720556661837831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1719386239034!5m2!1sen!2sbd" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <!-- Le lien vers Colorlib ne peut pas être supprimé. Le modèle est sous licence CC BY 3.0. -->
                        <div class="footer__copyright__text">
                            <p>Droits d'auteur &copy;
                                <script>
                                    document.write(new Date().getFullYear());

                                </script> Tous droits réservés
                                <i class="fa fa-heart" aria-hidden="true"></i> aux
                                <a href="https://colorlib.com" target="_blank">Etudiants de l'ESP ,de la GLSI & SSI </a>
                            </p>
                        </div>
                        <!-- Le lien vers Colorlib ne peut pas être supprimé. Le modèle est sous licence CC BY 3.0. -->
                    </div>
                    <div class="col-lg-5">
                        <ul>
                            <li>Tous droits réservés</li>
                            <li>Conditions d'utilisation</li>
                            <li>Politique de confidentialité</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Section Pied de Page Termine -->
    <!-- Js Plugins -->
    <script src="{{ asset('biobanque/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('biobanque/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('biobanque/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('biobanque/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{ asset('biobanque/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('biobanque/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('biobanque/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('biobanque/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('biobanque/js/main.js')}}"></script>
</body>
</html>
