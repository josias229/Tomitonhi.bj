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
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite(['resources/css/legal.css', 'resources/js/legal.js'])
    @vite(['resources/css/style.css', 'resources/js/script.js'])

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

        .animate-bounce {
            animation: bounce 0.5s;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .animate-pulse {
            animation: pulse 0.5s;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }
    </style>
</head>

<body>

    <!-- Logo + Retour à l'accueil -->
    <nav class="navbar navbar-light bg-white">
        <div class="container">
            <a class='navbar-brand' href="{{ route('acceuil') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Tomitɔnhi" height="40">
            </a>
            <a class='text-vert-benin' href="{{ route('acceuil') }}">
                <i class="fas fa-arrow-left me-1"></i> Retour
            </a>
        </div>
    </nav>

    <!-- Section Principale -->
    @yield('legal-content')


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
                            <a href="#" class="nav-link p-0 opacity-75 hover-opacity-100" data-bs-toggle="modal"
                                data-bs-target="#artisanAuthModal">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="legal.js" defer></script> --}}
</body>

</html>
