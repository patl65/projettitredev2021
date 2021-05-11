<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AdminPatriciaL</title>

    <!-- Fonts -->
    <link href="" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://onesignal.github.io/emoji-picker/lib/css/emoji.css">
    <link rel="stylesheet" href="{{ asset('css/appAdmin.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
    <script src="https://onesignal.github.io/emoji-picker/lib/js/config.js" defer></script>
    <script src="https://onesignal.github.io/emoji-picker/lib/js/util.js" defer></script>
    <script src="https://onesignal.github.io/emoji-picker/lib/js/jquery.emojiarea.js" defer></script>
    <script src="https://onesignal.github.io/emoji-picker/lib/js/emoji-picker.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="{{ asset('js/appAdmin.js') }}" defer></script>

    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">



</head>


<body class="antialiased" data-spy="scroll" data-target="#navbar" data-offset="75">

    <div class="sticky-top d-flex mb-5">

        <img class="logo me-2" src={{ asset('/images/layout/LOGO_LATU.jpg') }} alt="Latu entreprise"
            class="img-fluid mx-2" width="150" height="150">



        <div class="w-100">

            <h2>Administration du site</h2>
            <h2>Projet Titre Développeuse web</h2>
            <h2>Patricia Layerle</h2>

            <div class="mb-2">
                <a class="btn btn-secondary" href="{{ route('login') }}">Se connecter</a>
                <a class="btn btn-secondary" href="{{ route('logout') }}">Se déconnecter</a>
                {{-- quand on est connecté --}}
                @auth
                    Je suis connecté(e) en tant que {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}
                @endauth
            </div>

            {{-- si on n'est pas connecté --}}
            @guest
                <h2 class="mt-4">Pour accéder au Menu, vous devez vous connecter</h2>
            @endguest

            {{-- quand on est connecté --}}
            @auth
                <nav class="navbar navbar-expand-lg navbar-light bg-dark w-100">

                    <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse flex-lg-row me-3" id="navbarToggler">
                        <ul class="nav nav-pills flex-column flex-lg-row">
                            {{-- <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}"
                                    href="{{ route('dashboard') }}">Tableau de bord</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/post/experience') ? 'active' : '' }}"
                                    href="{{ route('post.indexExperience') }}">Expériences</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/post') ? 'active' : '' }}"
                                    href="{{ route('post.index') }}">Articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/job') ? 'active' : '' }}"
                                    href="{{ route('job.index') }}">Offres d'emploi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}"
                                    href="{{ route('admin.user') }}">Utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                    href="{{ route('home') }}">Accueil Site Latu</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            @endauth



        </div>

    </div>







    <div class="container-fluid">
        @yield('content')
    </div>



    <!-- Optional JavaScript -->
    <!-- Popper.js first, then CoreUI JS -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>

</body>

</html>
