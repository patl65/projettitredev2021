<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PatriciaL</title>

    <!-- Fonts -->
    <link href="" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('js/overlay.js') }}" defer></script>

</head>


<body class="antialiased" data-spy="scroll" data-target="#navbar" data-offset="75">

    <header class="sticky-top d-flex">

        <a class="h-100 bg-light" href="{{ route('home') }}"><img class="logo"
                src={{ asset('/images/layout/LOGO_LATU.jpg') }} alt="Latu entreprise" class="img-fluid mx-2"
                width="130" height="auto"></a>


        <div class="w-100">

            <div class="phoneLatu d-flex justify-content-between">
                {{-- <div class="bg-primary d-flex justify-content-between"> --}}
                <div>
                    <h4>Téléphone : 05-62-967-067 - 65000 Tarbes</h4>
                </div>
                <div class="me-3">
                    <a href="https://www.facebook.com/LatuPeinture"><img src={{ asset('images/layout/facebook.png') }}
                            alt="Latu FaceBook" height="35" height="auto"></a>
                    <a href="https://www.instagram.com/latu_entreprise/?hl=fr"> <img
                            src={{ asset('images/layout/instagram.png') }} alt="" height="35" height="auto"></a>
                    <a href="https://www.linkedin.com/in/yannick-martin-1a29b878/detail/recent-activity/"> <img
                            src={{ asset('images/layout/linkedin.png') }} alt="yannick-martin Latu Linkedin"
                            height="35" height="auto"></a>
                    <a href="https://www.youtube.com/channel/UCe9mcUtA6tfC-YAc5NzKTYw"> <img
                            src={{ asset('images/layout/youtube.png') }} alt="" height="35" height="auto"></a>
                </div>
            </div>


            <nav class="navbar navbar-expand-lg navbar-light w-100">

                <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse flex-lg-row-reverse" id="navbarToggler">
                    <ul class="nav nav-pills flex-column flex-lg-row justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ route('home') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('Latu-Entreprise') ? 'active' : '' }}"
                                href="{{ route('latuEntreprise') }}">Entreprise Latu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('peinture') ? 'active' : '' }}"
                                href="{{ route('peinture') }}">Peinture</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('sols') ? 'active' : '' }}"
                                href="{{ route('sols') }}">Sols</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('isolation-thermique-exterieur') ? 'active' : '' }}"
                                href="{{ route('ite') }}">Isolation thermique par l'extérieur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('conseil-pro-actualites*') ? 'active' : '' }}"
                                href="{{ route('blog.index') }}">Conseils de Pro & Actualités</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('offres-emploi') ? 'active' : '' }}"
                                href="{{ route('jobs.index') }}">Emplois à pourvoir </a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>



    </header>
    <div class="container-fluid mt-2 bg-success">
        @auth {{-- quand on est connecté --}}
            Je suis connecté(e) en tant que {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}
            <a class="btn btn-outline-info btn-sm m-1" href="{{ route('logout') }}">Se déconnecter</a>
        @endauth
        @can('admin') {{-- quand on est administrateur --}}
            - Je suis Administratrice ou Administrateur
        @endcan
    </div>





    <main class="container-fluid">
        @yield('content')
    </main>



    <footer class="footer align-items-center text-center my-3 pt-3 text-light">
        {{-- <div class="h-100 align-items-center"> --}}
        <p style="color:rgb(241, 208, 20)"><i>@PatriciaLayerle - Titre développeur d’applications</i></p>
        <p><a href="{{ route('mentionsLegales') }}">Mentions légales</a>
            - <b>Ce site n'utilise pas les cookies</b></p>
        {{-- </div> --}}
    </footer>
</body>

</html>
