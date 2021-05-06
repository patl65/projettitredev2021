<!DOCTYPE html>
<html lang="fr">
 <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CoreUI CSS -->
 <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">

 <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://onesignal.github.io/emoji-picker/lib/css/emoji.css">
     <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>
     <script src="https://onesignal.github.io/emoji-picker/lib/js/config.js" defer></script>
 <script src="https://onesignal.github.io/emoji-picker/lib/js/util.js" defer></script>
 <script src="https://onesignal.github.io/emoji-picker/lib/js/jquery.emojiarea.js" defer></script>
 <script src="https://onesignal.github.io/emoji-picker/lib/js/emoji-picker.js" defer></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
 <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
 <script src="{{ asset('js/appAdmin.js') }}" defer></script>
 

 <title>Latu</title>
 </head>
 <body class="c-app">


 {{-- SIDEBAR --}}
 <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav ps">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('dashboard') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href=""></use>
                </svg> Tableau de bord</a></li>

                <li class="c-sidebar-nav-title">Articles</li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('post.index') }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href=""></use>
                            
                        </svg> Articles</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('post.index') }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href=""></use>
                        </svg> Catégories</a></li>
                <li class="c-sidebar-nav-title">Notifications</li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('category.index') }}">
                        <svg class="c-sidebar-nav-icon">
                            {{-- <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use> --}}
                        </svg> Formulaires</a></li>
                </li>
            </ul>
            <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
                data-class="c-sidebar-minimized"></button>
        </div>




        <div class="c-wrapper c-fixed-components">
            {{-- HEADER MENU --}}
            <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
                {{-- TODO: A supprimer ?? --}}
                {{-- <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
                    data-class="c-sidebar-show">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button><a class="c-header-brand d-lg-none" href="{{ route('dashboard') }}">
                    <svg width="118" height="46" alt="CoreUI Logo">
                        <use xlink:href="assets/brand/coreui.svg#full"></use>
                    </svg></a>
                <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
                    data-class="c-sidebar-lg-show" responsive="true">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button>
 --}}
                <ul class="c-header-nav d-md-down-none">
                    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('admin.user') }}">Utilisateurs</a></li>
                    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('post.index') }}">Articles</a></li>
                    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('home') }}">Accueil Site Latu</a></li>
                    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{ route('blog.index') }}">Conseils de Pro & Actualités</a></li>
                </ul>
                <ul class="c-header-nav ml-auto mr-4">
                    <h5 class="authentification"> {{ auth()->user()->name }} est connecté(e)</h5>
                    <li class="c-header-nav-item dropdown show"><a class="c-header-nav-link" data-toggle="dropdown" href="#"
                            role="button" aria-haspopup="true" aria-expanded="true">
                            <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/6.jpg" alt=""></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pt-0 show">
                            <div class="dropdown-header bg-light py-2"><strong>Compte</strong></div><a class="dropdown-item"
                                href="{{route('logout')}}">  Déconnection</a>
                        </div>
                    </li>
                </ul>
                <div class="c-subheader px-3">

                    <ol class="breadcrumb border-0 m-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    
                    </ol>
                    </div>
            </header>




    <div class="container-fluid">
        @yield('content')
    </div>




 <!-- Optional JavaScript -->
 <!-- Popper.js first, then CoreUI JS -->
 <script src="https://unpkg.com/@popperjs/core@2"></script>
 <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
 </body>
</html>
