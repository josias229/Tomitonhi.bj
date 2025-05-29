<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tomitɔnhi - Artisanat Local du Bénin</title>
    <meta name="description" content="Plateforme d'artisanat et produits locaux du Bénin">

    <!-- Police Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">

    <!-- Bootstrap + Icônes Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('favicon_io/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"/>



    <!-- Style -->
    <style>
        .rotating-promos {
            position: relative;
            height: 24px;
            /* Ajustez selon votre contenu */
            overflow: hidden;
        }

        .promo-item {
            position: absolute;
            width: 100%;
            transition: all 0.5s ease;
            opacity: 0;
            transform: translateY(-10px);
        }

        .promo-item.active {
            opacity: 1;
            transform: translateY(0);
        }

        .step-indicator {
            position: relative;
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            padding: 0 20px;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 20px;
            right: 20px;
            height: 2px;
            background-color: #e9ecef;
            z-index: 1;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 2;
            position: relative;
        }

        .step-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border: 2px solid #dee2e6;
            margin-bottom: 5px;
            transition: all 0.3s ease;
        }

        .step.active .step-circle {
            background-color: #008751;
            color: white;
            border-color: #008751;
        }

        .step-label {
            font-size: 0.8rem;
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .step.active .step-label {
            color: #008751;
            font-weight: bold;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .registration-step {
            animation: fadeIn 0.3s ease-out;
        }

        /* Hover effects */
        .dropzone {
            transition: all 0.2s;
            cursor: pointer;
        }

        .dropzone:hover {
            background-color: #f8f9fa;
            border-color: #008751 !important;
        }

        /* Style pour les zones de dépôt de fichiers invalides */
        .dropzone.invalid {
            border-color: #dc3545 !important;
            background-color: rgba(220, 53, 69, 0.05);
        }

        /* Style pour les prévisualisations d'images */
        #imagePreview .col-4 {
            transition: all 0.3s ease;
        }

        #imagePreview .col-4:hover {
            transform: scale(1.05);
            z-index: 1;
        }

        /* Animation pour les messages d'erreur */
        .alert-danger {
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Upload feedback */
        .upload-progress {
            height: 4px;
            background-color: #e9ecef;
            margin-top: 5px;
        }

        .upload-progress-bar {
            height: 100%;
            background-color: #008751;
            width: 0%;
            transition: width 0.3s;
        }

        /* Dans votre fichier CSS */
        /* input:invalid,
        select:invalid {
            border-color: #dc3545 !important;
        } */

        input:invalid:focus,
        select:invalid:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }

        /* Style pour le badge du panier */
        .cart-badge {
            transition: all 0.3s ease;
            font-size: 0.6rem;
            min-width: 1.2rem;
            height: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #008751;
            color: white;
            border-radius: 50%;
        }

        /* Style pour le bouton ajouter au panier */
        .add-to-cart {
            transition: all 0.2s ease;
        }

        .add-to-cart:hover {
            background-color: #006a40 !important;
            transform: translateY(-2px);
        }

        .add-to-cart.added {
            background-color: #28a745 !important;
        }

        .add-to-cart.added::after {
            content: "✓";
            margin-left: 5px;
        }
    </style>

    {{-- @vite(['resources/css/legal.css', 'resources/js/legal.js']) --}}
    @vite(['resources/css/legal.css'])
    {{-- @vite(['resources/css/style.css', 'resources/js/script.js']) --}}
    @vite(['resources/css/style.css'])



</head>

<body>
    <!-- Barre supérieure avec emplacements rotatifs (LIGNE 1) -->
    <div class="top-bar py-2 border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <!-- Zone des messages rotatifs (remplace la livraison/artisans) -->
                <div class="col-md-6">
                    <div class="rotating-promos">
                        <!-- Message normal (par défaut) -->
                        <div class="promo-item active">
                            <div class="d-flex flex-wrap gap-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-truck service-icon me-2"></i>
                                    <span>Livraison locale</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle service-icon me-2"></i>
                                    <span>Artisans vérifiés</span>
                                </div>
                            </div>
                        </div>

                        <!-- Message promo 1 -->
                        <div class="promo-item">
                            <div class="d-flex align-items-center text-vert-benin fw-bold">
                                <i class="fas fa-fire me-2"></i>
                                <span>Promo du mois : -30% sur les textiles</span>
                                <a href="/promotions" class="ms-2 text-decoration-underline">Voir</a>
                            </div>
                        </div>

                        <!-- Message promo 2 -->
                        <div class="promo-item">
                            <div class="d-flex align-items-center text-danger fw-bold">
                                <i class="fas fa-bolt me-2"></i>
                                <span>Nouveaux artisans ajoutés !</span>
                                <a href="/nouveautes" class="ms-2 text-decoration-underline">Découvrir</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partie droite inchangée -->
                <div class="col-md-6 text-md-end">
                    <div class="d-flex justify-content-md-end gap-3">
                        <div class="d-flex justify-content-md-end gap-3 align-items-center">
                            <a href="#" class="text-dark text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#languageModal">
                                <img src="https://flagcdn.com/w20/fr.png" alt="Français" width="20" class="me-1">
                                <span class="d-none d-sm-inline">FR</span>
                            </a>

                            @auth
                                <span class="text-muted small d-none d-md-inline">
                                    Bienvenue, {{ Str::limit(Auth::user()->name, 15) }}
                                </span>
                            @else
                                <a class='text-dark text-decoration-none' href="/contact">
                                    <i class="fas fa-headset me-1"></i> Assistance
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation principale (LIGNE 2) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top" id="main-nav">
        <div class="container">
            <a class='navbar-brand' href="{{ route('acceuil') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Tomitɔnhi" height="40">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse">
                <form class="d-flex mx-lg-4 flex-grow-1">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher...">
                        <button class="btn btn-vert" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <div class="d-flex align-items-center gap-3">
                    @auth
                        {{-- <a href="{{ route('account') }}" class="text-dark"> --}}
                        {{-- <a href="#" class="text-dark">
                            <i class="far fa-user fa-lg"></i>
                        </a> --}}
                        <div class="d-flex align-items-center gap-3">
                            <a class='text-dark position-relative' href="{{ route('wishlist') }}">
                                <i class="far fa-heart fa-lg"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-vert-benin"
                                    style="font-size: 0.5rem;">2</span>
                            </a>
                            <a class='text-dark position-relative' href="{{ route('cart') }}">
                                <i class="fas fa-shopping-cart fa-lg"></i>
                                <span class="cart-badge"
                                    style="{{ count(session('cart', [])) > 0 ? 'display: flex;' : 'display: none;' }}">
                                    {{ array_sum(array_column(session('cart', []), 'quantity')) }}
                                </span>
                            </a>
                        </div>
                    @else
                        <a href="#" class="btn btn-vert-benin rounded-pill px-3 py-2" data-bs-toggle="modal"
                            data-bs-target="#userAuthModal">
                            <i class="fas fa-user-circle me-2"></i> Espace Client
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Barre de navigation principale (LIGNE 3) -->
    <div class="primary-navbar bg-vert-benin text-white py-2 d-none d-lg-block">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <!-- Liens principaux -->
                <div class="main-navigation">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white px-2 py-1 {{ request()->routeIs('acceuil') ? 'active border-bottom border-2' : '' }}"
                                href="{{ route('acceuil') }}">Accueil</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white px-2 py-1 {{ request()->routeIs('produits') || request()->is('categories/*') ? 'active border-bottom border-2' : '' }}"
                                href="{{ route('produits') }}">Produits</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white px-2 py-1 position-relative {{ request()->routeIs('nouveautes') ? 'active border-bottom border-2' : '' }}"
                                href="{{ route('nouveautes') }}">
                                Nouveautés
                                <span class="badge bg-danger badge-notification">New</span>
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white px-2 py-1 {{ request()->routeIs('blog*') ? 'active border-bottom border-2' : '' }}"
                                href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white px-2 py-1 {{ request()->routeIs('promotions') ? 'active border-bottom border-2' : '' }}"
                                href="{{ route('promotions') }}">Promotions</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white px-2 py-1 {{ request()->routeIs('artisan*') ? 'active border-bottom border-2' : '' }}"
                                href="{{ route('artisan') }}">Artisans</a>
                        </li>
                    </ul>
                </div>

                <!-- Partie droite conditionnée par l'état de connexion -->
                <div class="d-flex align-items-center ms-auto" style="z-index: 1000;">
                    @auth
                        <!-- Si utilisateur connecté -->
                        <div class="dropdown">
                            <a href="#"
                                class="text-white text-decoration-none dropdown-toggle d-flex align-items-center"
                                id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-2"></i>
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                {{-- <li><a class="dropdown-item" href="{{ route('account') }}"><i class="fas fa-user me-2"></i>Mon compte</a></li> --}}
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Mon
                                        compte</a></li>
                                {{-- <li><a class="dropdown-item" href="{{ route('account.orders') }}"><i class="fas fa-box-open me-2"></i>Mes commandes</a></li> --}}
                                <li><a class="dropdown-item" href="#"><i class="fas fa-box-open me-2"></i>Mes
                                        commandes</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>Déconnexion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <!-- Si utilisateur non connecté -->
                        <div class="me-4">
                            <a href="#" class="btn btn-outline-light border-0" data-bs-toggle="modal"
                                data-bs-target="#artisanAuthModal">
                                <i class="fas fa-hammer me-2"></i>Espace Artisan
                            </a>
                        </div>
                        <div class="support-section">
                            <a class='text-white text-decoration-none d-flex align-items-center'
                                href="{{ route('contact') }}">
                                <i class="fas fa-headset me-2"></i>
                                <div class="d-flex flex-column small">
                                    <span>Assistance</span>
                                    <strong>+229 12 34 56 78</strong>
                                </div>
                            </a>
                        </div>
                    @endauth
                </div>
            </nav>
        </div>
    </div>

    <!-- Menu mobile - Version stylée avec votre vert -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" style="background-color: #008751;">
        <div class="offcanvas-header border-bottom border-white">
            <h5 class="offcanvas-title text-white">
                <img src="{{ asset('images/Logo-Blanc.png') }}" alt="Tomitɔnhi" height="30">
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-0 d-flex flex-column">
            <!-- Barre de recherche -->
            {{-- <form class="p-3 border-bottom border-white" action="{{ route('recherche') }}" method="GET"> --}}
            <form class="p-3 border-bottom border-white" action="#" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control rounded-start" name="q"
                        placeholder="Rechercher...">
                    <button class="btn bg-white text-vert-benin" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>

            <!-- Menu principal mobile -->
            <div class="flex-grow-1 overflow-auto">
                <ul class="nav flex-column">
                    <li class="nav-item border-bottom border-white">
                        <a class="nav-link py-3 text-white {{ request()->routeIs('acceuil') ? 'active bg-vert-benin-dark' : '' }}"
                            href="{{ route('acceuil') }}">
                            <i class="fas fa-home me-2"></i>Accueil
                        </a>
                    </li>
                    <li class="nav-item border-bottom border-white">
                        <a class="nav-link py-3 text-white {{ request()->routeIs('produits') ? 'active bg-vert-benin-dark' : '' }}"
                            href="{{ route('produits') }}">
                            <i class="fas fa-shopping-bag me-2"></i>Produits
                        </a>
                    </li>
                    <li class="nav-item border-bottom border-white">
                        <a class='nav-link py-3 text-white d-flex justify-content-between align-items-center {{ request()->routeIs('nouveautes') ? 'active bg-vert-benin-dark' : '' }}'
                            href='{{ route('nouveautes') }}'>
                            <span><i class="fas fa-star me-2"></i>Nouveautés</span>
                            <span class="badge bg-danger">New</span>
                        </a>
                    </li>
                    <li class="nav-item border-bottom border-white">
                        <a class='nav-link py-3 text-white {{ request()->routeIs('blog*') ? 'active bg-vert-benin-dark' : '' }}'
                            href='{{ route('blog') }}'>
                            <i class="fas fa-blog me-2"></i>Blog
                        </a>
                    </li>
                    <li class="nav-item border-bottom border-white">
                        <a class='nav-link py-3 text-white {{ request()->routeIs('artisan*') ? 'active bg-vert-benin-dark' : '' }}'
                            href='{{ route('artisan') }}'>
                            <i class="fas fa-users me-2"></i>Artisans
                        </a>
                    </li>
                    <li class="nav-item border-bottom border-white">
                        <a class='nav-link py-3 text-white {{ request()->routeIs('promotions') ? 'active bg-vert-benin-dark' : '' }}'
                            href='{{ route('promotions') }}'>
                            <i class="fas fa-percentage me-2"></i>Promotions
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Pied de menu mobile -->
            <div class="border-top border-white">
                @auth
                    <!-- Section utilisateur connecté -->
                    <div class="p-3 border-bottom border-white">
                        <div class="d-flex align-items-center text-white">
                            <i class="fas fa-user-circle me-3 fs-5"></i>
                            <div>
                                <div class="fw-bold">{{ Auth::user()->name }}</div>
                                <small class="text-white-50">{{ Auth::user()->email }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border-bottom border-white">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                {{-- <a class="nav-link text-white py-2 ps-0" href="{{ route('account') }}"> --}}
                                <a class="nav-link text-white py-2 ps-0" href="#">
                                    <i class="fas fa-user me-2"></i>Mon compte
                                </a>
                            </li>
                            <li class="nav-item">
                                {{-- <a class="nav-link text-white py-2 ps-0" href="{{ route('account.orders') }}"> --}}
                                <a class="nav-link text-white py-2 ps-0" href="#">
                                    <i class="fas fa-box-open me-2"></i>Mes commandes
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Espace Artisan (visible seulement si déconnecté) -->
                    <div class="p-3 border-bottom border-white">
                        <a href="#" class="btn bg-white text-vert-benin w-100" data-bs-toggle="modal"
                            data-bs-target="#artisanAuthModal">
                            <i class="fas fa-user-cog me-2"></i>Espace Artisan
                        </a>
                    </div>
                @endauth

                <!-- Langue et assistance -->
                <div class="p-3 border-bottom border-white">
                    <div class="d-flex justify-content-between text-white">
                        <a href="#" class="text-white text-decoration-none d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#languageModal">
                            <img src="https://flagcdn.com/w20/fr.png" alt="Français" width="20" class="me-2">
                            <span>Français</span>
                        </a>
                        <a class='text-white text-decoration-none d-flex align-items-center'
                            href='{{ route('contact') }}'>
                            <i class="fas fa-headset me-2"></i>
                            <span>Assistance</span>
                        </a>
                    </div>
                </div>

                <!-- Gestion de connexion/déconnexion -->
                <div class="p-3">
                    @auth
                        <a class="d-flex align-items-center text-white text-decoration-none" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            <span>Déconnexion</span>
                        </a>
                        <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none"
                            data-bs-toggle="modal" data-bs-target="#userAuthModal">
                            <i class="far fa-user me-2"></i>
                            <span>Connexion/Inscription</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>


    <!-- LES MODALS -->
    <!-- Modal des langues -->
    <div class="modal fade" id="languageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Choisir la langue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-6 col-sm-4">
                            <a href="#"
                                class="d-flex align-items-center text-decoration-none text-dark p-2 rounded hover-bg">
                                <img src="https://flagcdn.com/w20/fr.png" alt="FR" width="20"
                                    class="me-2">
                                Français
                            </a>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="d-flex align-items-center text-muted p-2 rounded" style="cursor: not-allowed; opacity: 0.6;">
                                <img src="https://flagcdn.com/w20/gb.png" alt="EN" width="20" class="me-2">
                                English
                                <small class="ms-2 fst-italic">(Bientôt disponible)</small>
                            </div>
                        </div>                        
                        <!-- Ajoutez d'autres langues ici -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de visualisation produit -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="modal-product-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="" id="modal-product-image" class="img-fluid rounded" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-vert-benin" id="modal-product-category"></span>
                                <div class="rating text-warning">
                                    <i class="fas fa-star"></i>
                                    <span>4.8</span>
                                </div>
                            </div>
                            <p class="text-muted mb-3">Par <span class="text-vert-benin"
                                    id="modal-product-artisan"></span></p>

                            <div class="mb-4">
                                <h4 class="h5 text-success" id="modal-product-price"></h4>
                                <p class="text-muted mb-0" id="modal-product-original-price" style="display: none;">
                                    <del></del>
                                </p>
                            </div>

                            <p class="mb-4" id="modal-product-description"></p>

                            <div class="d-flex gap-3 mb-4">
                                <div class="input-group w-50">
                                    <button class="btn btn-outline-secondary" type="button">-</button>
                                    <input type="number" class="form-control text-center" value="1"
                                        min="1">
                                    <button class="btn btn-outline-secondary" type="button">+</button>
                                </div>
                                <form action="{{ route('cart.add', $produit->id) }}" method="POST">
                                    @csrf
                                <button type="submit" class="btn btn-vert flex-grow-1 add-to-cart">
                                    <i class="fas fa-cart-plus me-2"></i> Ajouter au panier
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Connexion/Inscription Utilisateur -->
    <div class="modal fade" id="userAuthModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <i class="fas fa-user-circle me-2"></i>Espace Client
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Onglets -->
                    <ul class="nav nav-tabs mb-4" id="userAuthTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active " id="user-login-tab" data-bs-toggle="tab"
                                data-bs-target="#user-login" type="button">
                                Connexion
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="user-register-tab" data-bs-toggle="tab"
                                data-bs-target="#user-register" type="button">
                                Inscription
                            </button>
                        </li>
                    </ul>

                    <!-- Contenu des onglets -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="user-login">
                            <!-- Utilisateur connection -->
                            {{-- <form method="POST" action="{{ route('login') }}"> --}}
                            <form action="{{ route('client.login') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_type" value="client">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email ou numéro</label>
                                    <input id="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password">
                                        <button class="btn btn-outline-secondary toggle-password" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="userRememberMe" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label small" for="userRememberMe">
                                            Rester connecté
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="small text-vert-benin">
                                            Mot de passe oublié ?
                                        </a>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-vert w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                                </button>

                                <div class="text-center small">
                                    Vous êtes artisan ? <a href="#" class="text-vert-benin"
                                        data-bs-dismiss="modal" data-bs-toggle="modal"
                                        data-bs-target="#artisanAuthModal">Accédez à votre espace</a>
                                </div>
                            </form>
                        </div>

                        <!-- Formulaire d'inscription utilisateur -->
                        <div class="tab-pane fade" id="user-register">
                            <!-- Modifiez le formulaire d'inscription -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <input type="hidden" name="role" value="client">

                                <div class="mb-3">
                                    <label class="form-label">Nom complet*</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email*</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">WhatsApp*</label>
                                    <div class="input-group">
                                        {{-- <span class="input-group-text">+229</span> --}}
                                        <input id="whatsapp" type="tel" 
                                            class="form-control @error('whatsapp') is-invalid @enderror"
                                            name="whatsapp" value="{{ old('whatsapp') }}" required>
                                    </div>
                                    @error('whatsapp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mot de passe*</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">
                                        <button class="btn btn-outline-secondary toggle-password" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirmer le mot de passe*</label>
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <button class="btn btn-outline-secondary toggle-password" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-vert w-100 mb-3">
                                    <i class="fas fa-user-plus me-2"></i>S'inscrire
                                </button>
                                <div class="text-center small">
                                    Vous êtes artisan ? <a href="#" class="text-vert-benin"
                                        data-bs-dismiss="modal" data-bs-toggle="modal"
                                        data-bs-target="#artisanAuthModal">Accédez à votre
                                        espace</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Connexion/Inscription Artisan -->
    <div class="modal fade" id="artisanAuthModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <i class="fas fa-user-cog me-2"></i>Espace Artisan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Onglets -->
                    <ul class="nav nav-tabs mb-4" id="artisanAuthTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="artisan-login-tab" data-bs-toggle="tab"
                                data-bs-target="#artisan-login" type="button">
                                Connexion
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="artisan-register-tab" data-bs-toggle="tab"
                                data-bs-target="#artisan-register" type="button">
                                Devenir Artisan
                            </button>
                        </li>
                    </ul>

                    <!-- Contenu des onglets -->
                    <div class="tab-content">
                        <!-- Formulaire de connexion artisan (identique à votre version actuelle) -->
                        <div class="tab-pane fade show active" id="artisan-login">
                            {{-- <form id="artisanLoginForm" method="POST" action="{{ route('login') }}"> --}}
                            <form action="{{ route('artisan.login') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_type" value="artisan">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email ou numéro enregistré</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" required autocomplete="current-password">
                                        <button class="btn btn-outline-secondary toggle-password" type="button">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label small" for="remember">Rester connecté</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="small text-vert-benin">
                                            Mot de passe oublié ?
                                        </a>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-vert w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                                </button>
                                <div class="text-center small">
                                    Vous êtes client ? <a href="#" class="text-vert-benin"
                                        data-bs-dismiss="modal" data-bs-toggle="modal"
                                        data-bs-target="#userAuthModal">Accédez à votre espace</a>
                                </div>
                            </form>
                        </div>

                        <!-- Onglet "Devenir Artisan" -->
                        <div class="tab-pane fade" id="artisan-register">
                            <div class="text-center mb-4">
                                <i class="fas fa-hands-helping text-vert-benin" style="font-size: 2.5rem;"></i>
                                <h5 class="mt-2">Rejoignez notre communauté d'artisans</h5>
                                <p class="text-muted small">Vendez vos créations à des milliers de clients</p>
                            </div>

                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check-circle text-vert-benin me-2"></i> Plateforme
                                    dédiée aux artisans béninois</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-vert-benin me-2"></i> Gestion
                                    simplifiée de vos produits</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-vert-benin me-2"></i> Paiements
                                    sécurisés</li>
                            </ul>

                            <!-- Dans l'onglet "Devenir Artisan", remplacez le lien actuel par : -->
                            <button class='btn btn-vert w-100' data-bs-toggle="modal"
                                data-bs-target="#artisanRegisterModal">
                                <i class="fas fa-arrow-right me-2"></i>Commencer l'inscription
                            </button>

                            <div class="text-center small mt-3">
                                Déjà artisan ? <a href="#" class="text-vert-benin"
                                    onclick="switchArtisanTab('artisan-login-tab')">Connectez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'inscription artisan en 3 étapes -->
    <div class="modal fade" id="artisanRegisterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 position-relative">
                    <h5 class="modal-title">
                        <i class="fas fa-user-cog me-2"></i>Inscription Artisan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Indicateur de progression -->
                <div class="px-4 pt-3 pb-2 step-indicator">
                    <!-- Étape 1 -->
                    <div class="step active">
                        <div class="step-circle">1</div>
                        <span class="step-label">Étape 1</span>
                    </div>

                    <!-- Étape 2 -->
                    <div class="step">
                        <div class="step-circle">2</div>
                        <span class="step-label">Étape 2</span>
                    </div>

                    <!-- Étape 3 -->
                    <div class="step">
                        <div class="step-circle">3</div>
                        <span class="step-label">Étape 3</span>
                    </div>
                </div>

                <div class="modal-body p-0">
                    <form id="artisanRegisterForm" method="POST" action="{{ route('artisan.register') }}"
                        enctype="multipart/form-data" novalidate>
                        <div id="form-error-container" class="alert alert-danger mb-4 d-none">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <span id="form-error-message"></span>
                        </div>
                        @csrf
                        <input type="hidden" name="user_type" value="artisan">

                        <!-- Étape 1 : Pré-inscription -->
                        <div class="registration-step active" id="step1">
                            <div class="row g-0">
                                <div class="col-md-6 bg-vert-benin text-white p-4 d-flex align-items-center">
                                    <div>
                                        <h2 class="h4 mb-3"><i class="fas fa-handshake me-2"></i>Conditions requises
                                        </h2>
                                        <ul class="fa-ul mb-3">
                                            <li class="mb-2"><span class="fa-li"><i
                                                        class="fas fa-check-circle"></i></span>Être enregistré auprès
                                                de la Chambre des Métiers</li>
                                            <li class="mb-2"><span class="fa-li"><i
                                                        class="fas fa-check-circle"></i></span>Disposer d'un RCCM
                                                valide</li>
                                            <li class="mb-2"><span class="fa-li"><i
                                                        class="fas fa-check-circle"></i></span>Produits 100% fabriqués
                                                au Bénin</li>
                                            <li><span class="fa-li"><i
                                                        class="fas fa-check-circle"></i></span>Capacité de production
                                                minimum</li>
                                        </ul>
                                        <div class="alert bg-white text-dark small p-2">
                                            <i class="fas fa-info-circle me-2"></i> Vérification sous 72h par notre
                                            équipe
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <h3 class="h5 mb-3">1. Pré-inscription</h3>
                                    <div class="mb-3">
                                        <label class="form-label">Nom complet*</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email professionnel*</label>
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mot de passe*</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirmer le mot de passe*</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            required autocomplete="new-password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Numéro WhatsApp*</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+229</span>
                                            <input type="tel"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" pattern="[5-9][0-9]{7}" value="{{ old('phone') }}"
                                                required title="8 chiffres commençant par 5,6,7,8 ou 9">
                                        </div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ville d'activité*</label>
                                        <select class="form-select @error('city') is-invalid @enderror"
                                            name="city" required>
                                            <option value="">Sélectionnez...</option>
                                            <option value="Cotonou" @if (old('city') == 'Cotonou') selected @endif>
                                                Cotonou</option>
                                            <option value="Porto-Novo"
                                                @if (old('city') == 'Porto-Novo') selected @endif>Porto-Novo</option>
                                            <option value="Parakou" @if (old('city') == 'Parakou') selected @endif>
                                                Parakou</option>
                                            <option value="Abomey" @if (old('city') == 'Abomey') selected @endif>
                                                Abomey</option>
                                            <option value="Autre" @if (old('city') == 'Autre') selected @endif>
                                                Autre</option>
                                        </select>
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="button" class="btn btn-vert w-100 py-2" onclick="nextStep()">
                                        Continuer <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 2 : Validation légale -->
                        <div class="registration-step d-none" id="step2">
                            <div class="row g-0">
                                <div class="col-md-6 bg-vert-benin text-white p-4 d-flex align-items-center">
                                    <div>
                                        <h2 class="h4 mb-3"><i class="fas fa-file-alt me-2"></i>Documents requis</h2>
                                        <div class="mb-3">
                                            <h3 class="h6">Pour tous :</h3>
                                            <ul class="fa-ul">
                                                <li><span class="fa-li"><i
                                                            class="far fa-id-card"></i></span>CNI/Passeport valide</li>
                                                <li><span class="fa-li"><i
                                                            class="fas fa-file-invoice"></i></span>RCCM à jour</li>
                                            </ul>
                                        </div>
                                        <div class="mb-3">
                                            <h3 class="h6">Selon activité :</h3>
                                            <ul class="fa-ul">
                                                <li><span class="fa-li"><i
                                                            class="fas fa-certificate"></i></span>Carte d'artisan</li>
                                                <li><span class="fa-li"><i class="fas fa-flask"></i></span>Certificat
                                                    de non-toxicité</li>
                                            </ul>
                                        </div>
                                        <p class="small text-muted">Formats acceptés : PDF, JPG, PNG (max 5MB)</p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <h3 class="h5 mb-3">2. Vérification légale</h3>
                                    <div class="mb-3">
                                        <label class="form-label">Type d'artisanat*</label>
                                        <select class="form-select @error('categorie_id') is-invalid @enderror"
                                            name="categorie_id" required>
                                            <option value="">Sélectionnez...</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}" @selected(old('categorie_id') == $categorie->id)>
                                                    {{ $categorie->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('categorie_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Numéro RCCM*</label>
                                        <input type="text"
                                            class="form-control @error('rccm') is-invalid @enderror" name="rccm"
                                            pattern="BJ-[A-Z]{3}-[0-9]{4}-[0-9]{1,5}-[A-Z]"
                                            title="Format: BJ-XXX-AAAA-NNNNN-L (ex: BJ-COT-2023-12345-A)"
                                            value="{{ old('rccm') }}" required>
                                        <small class="text-muted">Format : BJ-XXX-AAAA-NNNNN-L (ex:
                                            BJ-COT-2023-12345-A)</small>
                                        @error('rccm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- À ajouter dans l'étape 2 -->
                                    <div class="mb-3">
                                        <label class="form-label">Numéro IFU *</label>
                                        <input type="text" class="form-control @error('ifu') is-invalid @enderror"
                                            name="ifu" value="{{ old('ifu') }}">
                                        @error('ifu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Documents requis*</label>
                                        <div class="alert alert-light small mb-3">
                                            <i class="fas fa-info-circle me-2 text-vert-benin"></i>
                                            Formats acceptés : PDF, JPG, PNG (max 5MB par fichier)
                                        </div>

                                        <!-- Document 1 -->
                                        <div class="mb-2">
                                            <label class="small fw-bold d-block">CNI/Passeport*</label>
                                            <div class="dropzone p-2 border rounded @error('id_file') is-invalid @enderror"
                                                onclick="document.getElementById('idFile').click()">
                                                <input type="file" id="idFile" name="id_file" class="d-none"
                                                    accept=".pdf,.jpg,.png" required>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-id-card me-2 text-muted"></i>
                                                    <span class="small" id="idFileLabel">Téléverser</span>
                                                </div>
                                            </div>
                                            @error('id_file')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Document 2 -->
                                        <div class="mb-2">
                                            <label class="small fw-bold d-block">RCCM*</label>
                                            <div class="dropzone p-2 border rounded @error('rccm_file') is-invalid @enderror"
                                                onclick="document.getElementById('rccmFile').click()">
                                                <input type="file" id="rccmFile" name="rccm_file" class="d-none"
                                                    accept=".pdf,.jpg,.png" required>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-file-contract me-2 text-muted"></i>
                                                    <span class="small" id="rccmFileLabel">Téléverser</span>
                                                </div>
                                            </div>
                                            @error('rccm_file')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="prevStep()">
                                            <i class="fas fa-arrow-left me-2"></i> Retour
                                        </button>
                                        <button type="button" class="btn btn-vert" onclick="nextStep()">
                                            Suivant <i class="fas fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 3 : Portfolio produits -->
                        <div class="registration-step d-none" id="step3">
                            <div class="row g-0">
                                <div class="col-md-6 bg-vert-benin text-white p-4 d-flex align-items-center">
                                    <div>
                                        <h2 class="h4 mb-3"><i class="fas fa-award me-2"></i>Vos avantages</h2>
                                        <div class="row row-cols-3 g-2 mb-3">
                                            <div class="col text-center">
                                                <div class="bg-vert-benin text-white rounded-circle p-2 mb-1 mx-auto"
                                                    style="width:50px;height:50px;line-height:35px;">
                                                    <i class="fas fa-globe-africa"></i>
                                                </div>
                                                <p class="small mb-0">Visibilité internationale</p>
                                            </div>
                                            <div class="col text-center">
                                                <div class="bg-vert-benin text-white rounded-circle p-2 mb-1 mx-auto"
                                                    style="width:50px;height:50px;line-height:35px;">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                </div>
                                                <p class="small mb-0">Paiements sécurisés</p>
                                            </div>
                                            <div class="col text-center">
                                                <div class="bg-vert-benin text-white rounded-circle p-2 mb-1 mx-auto"
                                                    style="width:50px;height:50px;line-height:35px;">
                                                    <i class="fas fa-truck"></i>
                                                </div>
                                                <p class="small mb-0">Logistique gérée</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 class="h6">Conseils pour vos photos :</h3>
                                        <ul class="fa-ul small">
                                            <li><span class="fa-li"><i class="fas fa-camera"></i></span>Fond blanc ou
                                                neutre</li>
                                            <li><span class="fa-li"><i
                                                        class="fas fa-ruler-combined"></i></span>Inclure une référence
                                                de taille</li>
                                            <li><span class="fa-li"><i class="fas fa-lightbulb"></i></span>Bonne
                                                lumière naturelle</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <h3 class="h5 mb-3">3. Présentez vos créations</h3>
                                    <div class="mb-3">
                                        <label class="form-label">Nom de votre atelier*</label>
                                        <input type="text" id="workshopName"
                                            class="form-control @error('workshop_name') is-invalid @enderror"
                                            name="workshop_name" value="{{ old('workshop_name') }}" required>
                                        @error('workshop_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description courte*</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description"
                                            id="descriptionform" maxlength="200" required>{{ old('description') }}</textarea>
                                        <small class="text-muted">200 caractères max</small>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Galerie produits (min 3 photos)*</label>
                                        <div class="alert alert-light small mb-2">
                                            <i class="fas fa-camera me-2 text-vert-benin"></i>
                                            Conseil : Prenez vos photos sous bonne lumière avec un fond neutre
                                        </div>

                                        <div class="row g-2 mb-2" id="imagePreview"></div>

                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary flex-grow-1"
                                                onclick="document.getElementById('productImages').click()">
                                                <i class="fas fa-folder-open me-1"></i> Parcourir
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success"
                                                onclick="activateCamera()">
                                                <i class="fas fa-camera me-1"></i> Camera
                                            </button>
                                        </div>
                                        <input type="file" id="productImages" name="product_images[]"
                                            class="d-none" accept="image/*" multiple required>
                                        @error('product_images')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input @error('agreeTerms') is-invalid @enderror"
                                            type="checkbox" id="agreeTerms" name="agreeTerms" required>
                                        <label class="form-check-label small" for="agreeTerms">
                                            J'accepte les <a href="#" class="text-vert-benin">CGU</a> et
                                            confirme l'authenticité de mes produits
                                        </label>
                                        @error('agreeTerms')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="prevStep(2)">
                                            <i class="fas fa-arrow-left me-2"></i> Retour
                                        </button>
                                        <button type="submit" class="btn btn-vert">
                                            <i class="fas fa-paper-plane me-2"></i> Soumettre
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation (séparée pour réutilisation) -->
    <div class="modal fade" id="artisanConfirmationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow text-center p-4">
                <div class="modal-body">
                    <i class="fas fa-check-circle text-success fa-4x mb-3"></i>
                    <h3 class="h4 mb-2">Candidature envoyée !</h3>
                    <p class="mb-3">Nous avons bien reçu votre demande d'inscription.</p>
                    <p class="small text-muted">Notre équipe va vérifier vos informations et vous contactera par
                        WhatsApp dans les 48 heures.</p>
                    <button type="button" class="btn btn-vert-benin mt-2" data-bs-dismiss="modal">
                        <i class="fas fa-check me-2"></i> Compris
                    </button>
                </div>
            </div>
        </div>
    </div>


    @yield('main-content')

    <!-- Section Footer -->
    <footer class="py-5 bg-vert-benin text-white pt-5 mt-4">
        <div class="container">
            <div class="row g-4">
                <!-- Colonne 1 : Logo + Description -->
                <div class="col-lg-4">
                    <img src="{{ asset('images/Logo-Blanc.png') }}" alt="Tomitɔnhi" width="120" class="mb-3">
                    <p class="small opacity-75">
                        Plateforme d'artisanat béninois connectant les artisans locaux à des clients internationaux.
                        Commerce équitable et préservation des savoir-faire traditionnels.
                    </p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="https://facebook.com/tomitonhi" class="text-white opacity-75 hover-opacity-100"
                            target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://instagram.com/tomitonhi" class="text-white opacity-75 hover-opacity-100"
                            target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://pinterest.com/tomitonhi" class="text-white opacity-75 hover-opacity-100"
                            target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="https://youtube.com/tomitonhi" class="text-white opacity-75 hover-opacity-100"
                            target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Colonne 2 : Liens rapides -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h3 class="h6 mb-3">Acheter</h3>
                    <ul class="nav flex-column small">
                        <li class="nav-item mb-2">
                            <a href="{{ route('nouveautes') }}"
                                class="nav-link p-0 opacity-75 hover-opacity-100">Nouveautés</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('promotions') }}"
                                class="nav-link p-0 opacity-75 hover-opacity-100">Promotions</a>
                        </li>
                        <li class="nav-item mb-2">
                            {{-- <a href="{{ route('artisans.index') }}" --}}
                            <a href="#" class="nav-link p-0 opacity-75 hover-opacity-100">Artisans</a>
                        </li>
                    </ul>
                </div>

                <!-- Colonne 3 : Infos pratiques -->
                <div class="col-6 col-md-4 col-lg-2">
                    <h3 class="h6 mb-3">Infos</h3>
                    <ul class="nav flex-column small">
                        <li class="nav-item mb-2">
                            <a href="{{ route('faq') }}" class="nav-link p-0 opacity-75 hover-opacity-100">FAQ</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('contact') }}"
                                class="nav-link p-0 opacity-75 hover-opacity-100">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Colonne 4 : Devenir artisan -->
                <div class="col-md-4 col-lg-2">
                    <h3 class="h6 mb-3">Artisans</h3>
                    <ul class="nav flex-column small">
                        <li class="nav-item mb-2">
                            <a href="#" class="nav-link p-0 opacity-75 hover-opacity-100"
                                data-bs-toggle="modal" data-bs-target="#artisanAuthModal">
                                Devenir vendeur
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('conditions') }}"
                                class="nav-link p-0 opacity-75 hover-opacity-100">Conditions</a>
                        </li>
                    </ul>
                </div>

                <!-- Colonne 5 : Contact -->
                <div class="col-md-4 col-lg-2">
                    <h3 class="h6 mb-3">Contact</h3>
                    <ul class="nav flex-column small">
                        <li class="nav-item mb-2">
                            <a href="https://maps.app.goo.gl/example"
                                class="nav-link p-0 opacity-75 hover-opacity-100 d-flex align-items-center"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-map-marker-alt me-2"></i> GDIZ, Bâtiment 3A
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="tel:+22912345678"
                                class="nav-link p-0 opacity-75 hover-opacity-100 d-flex align-items-center">
                                <i class="fas fa-phone-alt me-2"></i> +229 12 34 56 78
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="mailto:contact@tomitonhi.bj"
                                class="nav-link p-0 opacity-75 hover-opacity-100 d-flex align-items-center">
                                <i class="fas fa-envelope me-2"></i> Nous écrire
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="https://wa.me/22912345678"
                                class="nav-link p-0 opacity-75 hover-opacity-100 d-flex align-items-center"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-whatsapp me-2"></i> WhatsApp
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-4 opacity-25">

            <!-- Copyright + Mentions -->
            <div class="row align-items-center">
                <div class="col-md-6 small opacity-75">
                    © 2025 Tomitɔnhi. Tous droits réservés.
                </div>
                <div class="col-md-6 text-md-end small">
                    <a class='text-white opacity-75 hover-opacity-100 me-3'
                        href="{{ route('politique') }}">Confidentialité</a>
                    <a class='text-white opacity-75 hover-opacity-100 me-3' href="{{ route('cgu') }}">CGU</a>
                    <a class='text-white opacity-75 hover-opacity-100' href="{{ route('mentions') }}">Mentions
                        légales</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="script.js" defer></script> --}}

    <script>
        // Variables globales
        let currentStep = 1;
        const totalSteps = 3;

        // Fonctions de navigation (doivent être globales car appelées depuis le HTML)
        window.nextStep = function() {
            console.log('nextStep called, currentStep:', currentStep);
            clearErrors();
            let isValid = true;
            let errorMessage = "";

            if (currentStep === 1) {
                console.log('Validating step 1');
                isValid = validateStep1();
                console.log('Step 1 validation result:', isValid);
                errorMessage = "Veuillez corriger les erreurs de l'étape 1 avant de continuer";
            } else if (currentStep === 2) {
                console.log('Validating step 2');
                isValid = validateStep2();
                console.log('Step 2 validation result:', isValid);
                errorMessage = "Veuillez corriger les erreurs de l'étape 2 avant de continuer";
            }

            console.log('Validation result:', isValid);
            if (isValid && currentStep < totalSteps) {
                console.log('Proceeding to next step');
                goToStep(currentStep + 1);
            } else if (!isValid) {
                console.log('Showing errors');
                showGeneralError(errorMessage);
                scrollToFirstError();
            }
        };

        window.prevStep = function() {
            clearErrors();
            goToStep(currentStep - 1);
        };

        // Fonction principale quand le DOM est chargé
        document.addEventListener('DOMContentLoaded', function() {
            // Rotation des promos
            const promos = document.querySelectorAll('.promo-item');
            let currentPromo = 0;

            function rotatePromos() {
                promos.forEach(p => p.classList.remove('active'));
                currentPromo = (currentPromo + 1) % promos.length;
                promos[currentPromo].classList.add('active');
                setTimeout(rotatePromos, 8000);
            }
            setTimeout(rotatePromos, 5000);

            // Gestion des onglets
            window.switchUserTab = function(tabId) {
                const triggerEl = document.querySelector(`#${tabId}`);
                if (triggerEl) {
                    const tab = new bootstrap.Tab(triggerEl);
                    tab.show();
                }
            };

            window.switchArtisanTab = function(tabId) {
                const triggerEl = document.querySelector(`#${tabId}`);
                if (triggerEl) {
                    const tab = new bootstrap.Tab(triggerEl);
                    tab.show();
                }
            };

            // Initialisation
            updateStepIndicator();
            setupFileUpload('idFile', 'idFileLabel');
            setupFileUpload('rccmFile', 'rccmFileLabel');

            // Gestion de la soumission du formulaire
            const artisanRegisterForm = document.getElementById('artisanRegisterForm');
            if (artisanRegisterForm) {
                artisanRegisterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    handleFormSubmit.call(this);
                });
            }

            // Gestion de la connexion
            const loginForm = document.getElementById('artisanLoginForm');
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalContent = submitBtn.innerHTML;

                    submitBtn.innerHTML = `
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Connexion en cours...
                    `;
                    submitBtn.disabled = true;

                    setTimeout(() => {
                        submitBtn.innerHTML = originalContent;
                        submitBtn.disabled = false;
                    }, 5000);
                });
            }
        });

        // Fonctions utilitaires
        function goToStep(step) {
            if (step < 1 || step > totalSteps) return;

            // Cache l'étape actuelle
            document.getElementById(`step${currentStep}`).classList.remove('active');
            document.getElementById(`step${currentStep}`).classList.add('d-none');

            // Affiche la nouvelle étape
            currentStep = step;
            document.getElementById(`step${currentStep}`).classList.remove('d-none');
            document.getElementById(`step${currentStep}`).classList.add('active');

            updateStepIndicator();
            document.querySelector('.modal-body')?.scrollTo(0, 0);
        }

        function updateStepIndicator() {
            document.querySelectorAll('.step').forEach((step, index) => {
                const circle = step.querySelector('.step-circle');
                const label = step.querySelector('.step-label');

                step.classList.remove('active', 'completed');
                circle.classList.remove('active');
                label.classList.remove('active');

                if (index + 1 < currentStep) {
                    step.classList.add('completed');
                    circle.style.backgroundColor = '#008751';
                    circle.style.borderColor = '#008751';
                    circle.style.color = 'white';
                } else if (index + 1 === currentStep) {
                    step.classList.add('active');
                    circle.classList.add('active');
                    circle.style.backgroundColor = '#008751';
                    circle.style.borderColor = '#008751';
                    label.classList.add('active');
                } else {
                    circle.style.backgroundColor = 'white';
                    circle.style.borderColor = '#dee2e6';
                    circle.style.color = '';
                }
            });
        }

        // Fonctions de validation
        function validateStep1() {
            console.log('--- Validation Étape 1 ---');
            let isValid = true;

            // Fonction pour valider un champ individuel
            function validateField(name, label, type = 'text') {
                const selector = `#step1 [name="${name}"]`;
                const input = document.querySelector(selector);

                if (!input) {
                    console.error('Champ non trouvé:', selector);
                    return false;
                }

                const value = input.value.trim();
                console.log(`Champ ${name} (${label}):`, value);

                if (!value) {
                    showError(input, `${label} est obligatoire`);
                    return false;
                }

                // Validations spécifiques
                if (type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                    showError(input, 'Email invalide');
                    return false;
                }

                if (name === 'phone' && !/^[5-9]\d{7}$/.test(value)) {
                    showError(input, 'Numéro invalide (8 chiffres, commençant par 5-9)');
                    return false;
                }

                if (name === 'password' && value.length < 8) {
                    showError(input, 'Le mot de passe doit faire au moins 8 caractères');
                    return false;
                }

                if (name === 'password_confirmation') {
                    const password = document.querySelector('#step1 [name="password"]').value;
                    if (value !== password) {
                        showError(input, 'Les mots de passe ne correspondent pas');
                        return false;
                    }
                }

                return true;
            }

            // Liste des champs à valider
            const fields = [{
                    name: 'name',
                    label: 'Nom complet'
                },
                {
                    name: 'email',
                    label: 'Email',
                    type: 'email'
                },
                {
                    name: 'password',
                    label: 'Mot de passe',
                    type: 'password'
                },
                {
                    name: 'password_confirmation',
                    label: 'Confirmation mot de passe'
                },
                {
                    name: 'phone',
                    label: 'Téléphone'
                },
                {
                    name: 'city',
                    label: 'Ville'
                }
            ];

            fields.forEach(field => {
                if (!validateField(field.name, field.label, field.type)) {
                    isValid = false;
                }
            });

            console.log('--- Résultat validation:', isValid, '---');
            return isValid;
        }

        // Modifiez la fonction validateStep2() :
        function validateStep2() {
            let isValid = true;
            const requiredFields = ['categorie_id', 'rccm', 'ifu', 'id_file', 'rccm_file'];

            requiredFields.forEach(field => {
                const input = document.querySelector(`[name="${field}"]`);
                if (!input) return;

                if (field === 'rccm') {
                    if (!input.value.trim()) {
                        showError(input, 'Le RCCM est obligatoire');
                        isValid = false;
                    } else if (!/^BJ-[A-Z]{3}-\d{4}-\d{1,5}-[A-Z]$/i.test(input.value)) {
                        showError(input, 'Format RCCM invalide. Exemple: BJ-COT-2023-12345-A');
                        isValid = false;
                    }
                }

                if (input.type === 'file' && (!input.files || input.files.length === 0)) {
                    showError(input, 'Ce fichier est obligatoire');
                    isValid = false;
                } else if (input.value.trim() === '' && field !== 'ifu') {
                    showError(input, 'Ce champ est obligatoire');
                    isValid = false;
                }
            });

            return isValid;
        }


        function validateStep3() {
            console.log('--- Début validation étape 3 ---');
            let isValid = true;

            // Fonction helper pour valider un champ
            function validateField(fieldId, fieldLabel, isCheckbox = false) {
                const field = document.querySelector(`#${fieldId}`);
                if (!field) {
                    console.error(`Champ ${fieldId} non trouvé`);
                    return false;
                }

                if (isCheckbox) {
                    if (!field.checked) {
                        showError(field, `Vous devez accepter ${fieldLabel}`);
                        return false;
                    }
                } else {
                    const value = field.value ? field.value.trim() : '';
                    console.log(field);
                    console.log(`Validation ${fieldId}:`, value);
                    if (!value) {
                        showError(field, `${fieldLabel} est obligatoire`);
                        return false;
                    }
                }
                return true;
            }

            // Validation des champs obligatoires
            if (!validateField('workshopName', 'Le nom de l\'atelier')) isValid = false;
            if (!validateField('descriptionform', 'La description')) isValid = false;
            if (!validateField('agreeTerms', 'les conditions générales', true)) isValid = false;

            // Validation des images
            const productImages = document.getElementById('productImages');
            if (!productImages || !productImages.files || productImages.files.length < 3) {
                showError(productImages, 'Veuillez sélectionner au moins 3 photos de vos produits');
                isValid = false;
            } else {
                // Validation de la taille des fichiers
                Array.from(productImages.files).forEach(file => {
                    if (file.size > 5 * 1024 * 1024) { // 5MB
                        showError(productImages, `L'image ${file.name} est trop volumineuse (max 5MB)`);
                        isValid = false;
                    }
                });
            }

            console.log('--- Résultat validation étape 3:', isValid, '---');
            return isValid;
        }

        function handleFormSubmit() {
            console.log('--- Tentative de soumission ---');
            clearErrors();
            ensureVisibleValidation();

            // Valider toutes les étapes
            const isStep1Valid = validateStep1();
            const isStep2Valid = validateStep2();
            const isStep3Valid = validateStep3();

            if (!isStep1Valid || !isStep2Valid || !isStep3Valid) {
                showGeneralError("Veuillez corriger les erreurs avant soumission");
                scrollToFirstError();

                // Aller à la première étape avec erreur
                if (!isStep1Valid) goToStep(1);
                else if (!isStep2Valid) goToStep(2);
                else goToStep(3);

                return false;
            }

            // Afficher un loader pendant la soumission
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalContent = submitBtn.innerHTML;
            submitBtn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
        Envoi en cours...
    `;
            submitBtn.disabled = true;

            console.log('--- Soumission du formulaire ---');
            this.submit();
        }

        // Fonctions d'affichage des erreurs
        // Modifiez la fonction showError() :
        function showError(input, message) {
            console.log(`Affichage erreur pour ${input.name}:`, message);

            if (!input) {
                console.error('Input est null pour le message:', message);
                return;
            }

            // Supprime les erreurs existantes
            input.classList.remove('is-invalid');
            let errorContainer = input.nextElementSibling;

            if (errorContainer && errorContainer.classList.contains('invalid-feedback')) {
                errorContainer.remove();
            }

            // Crée le nouveau message d'erreur
            errorContainer = document.createElement('div');
            errorContainer.className = 'invalid-feedback d-block';
            errorContainer.textContent = message;

            // Trouve le bon parent pour l'erreur
            let parent = input.closest('.mb-3') || input.closest('.form-group') || input.parentNode;

            if (parent) {
                input.classList.add('is-invalid');
                parent.appendChild(errorContainer);

                // Fait défiler jusqu'à l'erreur
                errorContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            } else {
                console.error('Parent non trouvé pour:', input);
            }
        }

        function showGeneralError(message) {
            let errorContainer = document.getElementById('form-error-container');
            if (!errorContainer) {
                errorContainer = document.createElement('div');
                errorContainer.id = 'form-error-container';
                errorContainer.className = 'alert alert-danger mb-4';
                const form = document.getElementById('artisanRegisterForm');
                if (form) form.prepend(errorContainer);
            }
            errorContainer.innerHTML = `<i class="fas fa-exclamation-triangle me-2"></i> ${message}`;
            errorContainer.classList.remove('d-none');
        }

        function clearErrors() {
            document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());

            const errorContainer = document.getElementById('form-error-container');
            if (errorContainer) errorContainer.remove();
        }

        function scrollToFirstError() {
            const firstError = document.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                firstError.focus();
            }
        }

        function ensureVisibleValidation() {
            document.querySelectorAll('.registration-step').forEach(step => {
                step.classList.remove('d-none');
            });
        }

        // Gestion des fichiers
        function setupFileUpload(inputId, labelId) {
            const input = document.getElementById(inputId);
            const label = document.getElementById(labelId);
            if (!input || !label) return;

            input.addEventListener('change', function() {
                if (this.files.length > 0) {
                    const file = this.files[0];
                    const validTypes = ['application/pdf', 'image/jpeg', 'image/png'];

                    if (file.size > 5 * 1024 * 1024) {
                        label.textContent = "Fichier trop volumineux (>5MB)";
                        label.classList.add('text-danger');
                        this.value = '';
                    } else if (!validTypes.includes(file.type)) {
                        label.textContent = "Format non supporté (PDF, JPG, PNG seulement)";
                        label.classList.add('text-danger');
                        this.value = '';
                    } else {
                        label.textContent = file.name;
                        label.classList.remove('text-danger');
                        label.classList.add('text-success');
                    }
                }
            });
        }

        // Gestion des images
        document.getElementById('productImages')?.addEventListener('change', function(e) {
            const container = document.getElementById('imagePreview');
            if (!container) return;

            let files = Array.from(e.target.files);
            if (files.length < 3) {
                showError(this, 'Veuillez sélectionner au moins 3 photos');
                return;
            }

            if (files.length > 6) {
                showGeneralError("Maximum 6 images autorisées. Seules les 6 premières seront conservées.");
                files = files.slice(0, 6);
                const dataTransfer = new DataTransfer();
                files.forEach(f => dataTransfer.items.add(f));
                this.files = dataTransfer.files;
            }

            container.innerHTML = '';
            files.forEach((file, index) => {
                if (!file.type.startsWith('image/')) {
                    showGeneralError(`Le fichier ${file.name} n'est pas une image valide`);
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(event) {
                    const col = document.createElement('div');
                    col.className = 'col-4 mb-2';
                    col.innerHTML = `
                <div class="position-relative">
                    <img src="${event.target.result}" class="img-thumbnail w-100" style="height:80px;object-fit:cover;">
                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 p-0" 
                        style="width:20px;height:20px;line-height:20px;" onclick="removeImage(this, ${index})">
                        <i class="fas fa-times" style="font-size:10px;"></i>
                    </button>
                </div>
            `;
                    container.appendChild(col);
                };
                reader.readAsDataURL(file);
            });
        });

        window.removeImage = function(btn, index) {
            btn.closest('.col-4')?.remove();

            const input = document.getElementById('productImages');
            const files = Array.from(input.files);
            files.splice(index, 1);

            const dataTransfer = new DataTransfer();
            files.forEach(f => dataTransfer.items.add(f));
            input.files = dataTransfer.files;

            if (files.length < 3) {
                showError(input, 'Veuillez sélectionner au moins 3 photos');
            }
        };

        // Activation caméra
        window.activateCamera = function() {
            if (navigator.mediaDevices?.getUserMedia) {
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(() => alert("Fonctionnalité caméra à implémenter"))
                    .catch(() => document.getElementById('productImages')?.click());
            } else {
                document.getElementById('productImages')?.click();
            }
        };

        function validateFileSize(input, maxSizeMB) {
            if (!input.files) return true;

            for (let i = 0; i < input.files.length; i++) {
                if (input.files[i].size > maxSizeMB * 1024 * 1024) {
                    showError(input, `Le fichier ${input.files[i].name} dépasse la taille maximale de ${maxSizeMB}MB`);
                    return false;
                }
            }
            return true;
        }
        // Ajoutez ceci juste après le chargement du DOM
        document.addEventListener('DOMContentLoaded', function() {
            // Affiche les valeurs de tous les champs de l'étape 1
            const step1Fields = document.querySelectorAll('#step1 [name]');
            console.log('Champs étape 1:');
            step1Fields.forEach(field => {
                console.log(`${field.name}:`, field.value);
            });
        });
    </script>

    <script>
        document.querySelectorAll('.toggle-password').forEach(function(button) {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var productModal = document.getElementById('productModal');

            productModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Bouton qui a déclenché le modal

                // Récupérer les données des attributs data
                var name = button.getAttribute('data-name');
                var category = button.getAttribute('data-category');
                var artisan = button.getAttribute('data-artisan');
                var description = button.getAttribute('data-description');
                var price = button.getAttribute('data-price');
                var promo = button.getAttribute('data-promo');
                var image = button.getAttribute('data-image');

                // Mettre à jour le contenu du modal
                document.getElementById('modal-product-title').textContent = name;
                document.getElementById('modal-product-category').textContent = category;
                document.getElementById('modal-product-artisan').textContent = artisan;
                document.getElementById('modal-product-description').textContent = description;
                document.getElementById('modal-product-image').src = image;
                document.getElementById('modal-product-image').alt = name;

                // Gestion des prix
                if (promo) {
                    document.getElementById('modal-product-price').textContent = promo + ' FCFA';
                    document.querySelector('#modal-product-original-price del').textContent = price +
                        ' FCFA';
                    document.getElementById('modal-product-original-price').style.display = 'block';
                } else {
                    document.getElementById('modal-product-price').textContent = price + ' FCFA';
                    document.getElementById('modal-product-original-price').style.display = 'none';
                }
            });
        });
    </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const personalCard = document.querySelector('.personal-info-card');
        if (!personalCard) return;
    
        // Liste des IDs à initialiser avec intlTelInput
        const telFieldIds = ["telephone", "whatsapp"];
    
        telFieldIds.forEach(function (id) {
            const telInput = personalCard.querySelector("#" + id);
            if (telInput) {
                window.intlTelInput(telInput, {
                    initialCountry: "auto",
                    geoIpLookup: function (success, failure) {
                        fetch("https://ipinfo.io/json?token=4f10d201f85304")
                            .then(resp => resp.json())
                            .then(resp => success(resp.country))
                            .catch(() => success("fr"));
                    },
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                });
            }
        });
    
        // Désactiver certains champs (sauf le champ WhatsApp)
        const fieldsToDisable = personalCard.querySelectorAll(
            'input[name="nom"], input[name="email"]'
        );
    
        fieldsToDisable.forEach(input => {
            input.setAttribute('readonly', true);
            input.classList.add('bg-light');
        });
    });
    </script>
    

</body>

</html>
