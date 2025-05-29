<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Artisan - Tomitɔnhi</title>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --vert-benin: #28a745;
            --vert-benin-light: rgba(40, 167, 69, 0.1);
            --sidebar-width: 250px;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            color: #4a5568;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #2d3748 0%, #1a202c 100%);
            position: fixed;
            height: 100vh;
            transition: all var(--transition-speed);
            z-index: 1000;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header img {
            width: 50px;
            margin-bottom: 10px;
            filter: brightness(0) invert(1);
        }

        .sidebar-header h4 {
            color: white;
            font-weight: 600;
            margin-bottom: 0;
        }

        .sidebar-header small {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.75rem;
        }

        .sidebar-menu {
            list-style: none;
            padding: 15px 0;
            margin: 0;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.2s;
            border-left: 4px solid transparent;
            font-weight: 500;
        }

        .sidebar-menu li a:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            padding-left: 25px;
        }

        .sidebar-menu li a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid var(--vert-benin);
        }

        .sidebar-menu li a i {
            width: 24px;
            text-align: center;
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .badge-sidebar {
            font-size: 0.65rem;
            padding: 3px 6px;
            font-weight: 500;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: all var(--transition-speed);
        }

        .top-bar {
            background-color: white;
            padding: 15px 25px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .content-area {
            padding: 25px;
        }

        /* Dashboard Cards */
        .dashboard-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            padding: 20px;
            margin-bottom: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .card-icon-lg {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        /* Colors */
        .bg-vert-benin {
            background-color: var(--vert-benin);
        }

        .bg-vert-benin-light {
            background-color: var(--vert-benin-light);
        }

        .text-vert-benin {
            color: var(--vert-benin);
        }

        .bg-primary-light {
            background-color: rgba(29, 78, 216, 0.1);
        }

        .bg-warning-light {
            background-color: rgba(234, 179, 8, 0.1);
        }

        .bg-info-light {
            background-color: rgba(6, 182, 212, 0.1);
        }

        .bg-purple-light {
            background-color: rgba(168, 85, 247, 0.1);
        }

        .text-purple {
            color: #8b5cf6;
        }

        /* Buttons */
        .btn-vert {
            background-color: var(--vert-benin);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-vert:hover {
            background-color: #218838;
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline-vert {
            border: 1px solid var(--vert-benin);
            color: var(--vert-benin);
            background: transparent;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-outline-vert:hover {
            background-color: var(--vert-benin);
            color: white;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block !important;
            }
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.25rem;
            cursor: pointer;
            color: #4a5568;
        }

        /* Section Management */
        .content-section {
            display: none;
            animation: fadeIn 0.5s;
        }

        .content-section.active {
            display: block;
        }

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

        /* Table Styles */
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            border-bottom: none;
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 12px 15px;
        }

        .table tbody tr {
            transition: all 0.2s;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-top: 1px solid #f1f5f9;
        }

        /* User dropdown */
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Search bar */
        .search-bar .form-control {
            border-radius: 8px;
            padding: 8px 15px;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }

        .search-bar .form-control:focus {
            border-color: var(--vert-benin);
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.2);
        }

        /* Badges */
        .badge {
            font-weight: 500;
            padding: 5px 8px;
            border-radius: 6px;
        }

        /* Stats cards */
        .stat-card {
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: "";
            position: absolute;
            top: -10px;
            right: -10px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            opacity: 0.1;
        }

        .stat-card.sales::after {
            background-color: var(--vert-benin);
        }

        .stat-card.orders::after {
            background-color: #3b82f6;
        }

        .stat-card.products::after {
            background-color: #f59e0b;
        }

        .stat-card.rating::after {
            background-color: #8b5cf6;
        }

        /* Review stars */
        .rating-stars {
            color: #fbbf24;
        }

        /* Conversation list */
        .conversation-item {
            transition: all 0.2s;
            color: #4b5563;
            text-decoration: none;
        }

        .conversation-item:hover {
            background-color: #f9fafb;
        }

        .conversation-item.active {
            background-color: #f3f4f6;
        }

        /* Message bubbles */
        .message-bubble {
            max-width: 70%;
            padding: 12px 16px;
            border-radius: 18px;
            position: relative;
            margin-bottom: 8px;
        }

        .message-in {
            background: #ffffff;
            border-top-left-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .message-out {
            background: var(--vert-benin);
            color: white;
            border-top-right-radius: 4px;
            margin-left: auto;
        }

        /* Tabs */
        .nav-tabs .nav-link {
            border: none;
            color: #64748b;
            font-weight: 500;
            padding: 10px 20px;
            border-bottom: 3px solid transparent;
        }

        .nav-tabs .nav-link.active {
            color: var(--vert-benin);
            border-bottom: 3px solid var(--vert-benin);
            background: transparent;
        }

        /* Form elements */
        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--vert-benin);
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.2);
        }

        /* Progress bars */
        .progress {
            height: 8px;
            border-radius: 4px;
        }

        /* Animation for notifications */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .notification-badge {
            animation: pulse 1.5s infinite;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            object-fit: cover;
        }

        /* Style pour les badges de statut */
        .badge {
            font-size: 0.7rem;
            padding: 0.25em 0.4em;
        }

        .toast {
            backdrop-filter: blur(10px);
            background-color: rgba(var(--bs-success-rgb), 0.85) !important;
        }

        .toast.bg-danger {
            background-color: rgba(var(--bs-danger-rgb), 0.85) !important;
        }

        .toast-body {
            padding: 0.75rem 1rem;
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <img src="{{ asset('images/logo.png') }}" alt="Tomitɔnhi">
            <small>Tableau de Bord Artisan</small>
        </div>

        <ul class="sidebar-menu">
            <li>
                <a href="#" class="active" data-section="dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>DashBoad</span>
                </a>
            </li>
            <li>
                <a href="#" data-section="products">
                    <i class="fas fa-box-open"></i>
                    <span>Mes produits</span>
                    @if ($produits->count() > 0)
                        <span class="badge bg-vert-benin badge-sidebar ms-auto">{{ $produits->count() }}</span>
                    @endif
                </a>
            </li>
            <li>
                <a href="#" data-section="orders">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Commandes</span>
                    <span class="badge bg-danger badge-sidebar ms-auto">3</span>
                </a>
            </li>
            <li>
                <a href="#" data-section="reviews">
                    <i class="fas fa-star"></i>
                    <span>Avis clients</span>
                </a>
            </li>
            <li>
                <a href="#" data-section="statistics">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistiques</span>
                </a>
            </li>
            <li>
                <a href="#" data-section="messages">
                    <i class="fas fa-envelope"></i>
                    <span>Messages</span>
                    <span class="badge bg-primary badge-sidebar ms-auto">5</span>
                </a>
            </li>
            <li>
                <a href="#" data-section="settings">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres Boutique</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Top Bar -->
        <div class="top-bar">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>

            <div class="search-bar">
                <div class="input-group" style="width: 300px;">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Rechercher...">
                </div>
            </div>

            <div class="user-actions d-flex align-items-center">
                <!-- Bouton de notifications -->
                <button class="btn btn-light position-relative me-3 p-2 rounded-circle">
                    <i class="fas fa-bell"></i>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger notification-badge">3</span>
                </button>

                <!-- Menu utilisateur -->
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (auth()->user()->artisanProfile && auth()->user()->artisanProfile->photo_profil)
                            {{-- <img src="{{ asset('storage/' . auth()->user()->artisanProfile->photo_profil) }}"
                                class="user-avatar me-2 rounded-circle"
                                style="width: 32px; height: 32px; object-fit: cover;"> --}}
                            @php
                                $photoPath =
                                    'artisans/products/' . basename(auth()->user()->artisanProfile->photo_profil);
                            @endphp

                            <img src="{{ route('private', ['path' => $photoPath]) }}"
                                class="user-avatar me-2 rounded-circle"
                                style="width: 32px; height: 32px; object-fit: cover;">
                        @else
                            <div class="user-avatar me-2 bg-vert-benin text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px;">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                        <li>
                            <div class="px-4 py-2">
                                <p class="mb-0 fw-bold">{{ auth()->user()->name }}</p>
                                <small class="text-muted">{{ auth()->user()->email }}</small>
                                @if (auth()->user()->isArtisan())
                                    <div class="mt-1">
                                        <span class="badge bg-vert-benin">Artisan</span>
                                        @if (auth()->user()->statut === 'en_attente')
                                            <span class="badge bg-warning text-dark">En attente</span>
                                        @elseif(auth()->user()->statut === 'actif')
                                            <span class="badge bg-success">Actif</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user-circle me-2"></i> Mon Profil
                            </a>
                        </li>
                        @if (auth()->user()->isArtisan())
                            <li>
                                <a class="dropdown-item" href="{{ route('gestion-dashArtisan') }}">
                                    <i class="fas fa-tools me-2"></i> Tableau de bord
                                </a>
                            </li>
                        @endif
                        <li>
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#settingsModal">
                                <i class="fas fa-cog me-2"></i> Paramètres Notifications
                            </button>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            <!-- Dashboard Section -->
            <div class="content-section active" id="dashboard">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0"><i class="fas fa-tachometer-alt me-2 text-vert-benin"></i> DashBoad</h3>
                    <div class="text-muted">Dernière mise à jour: Aujourd'hui, 10:45</div>
                </div>

                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-md-3">
                        <div class="dashboard-card stat-card sales">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Ventes totales</h6>
                                    <h3 class="mb-0">287,500 FCFA</h3>
                                    <small class="text-success"><i class="fas fa-arrow-up me-1"></i> 12% vs mois
                                        dernier</small>
                                </div>
                                <div class="card-icon bg-vert-benin-light text-vert-benin">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Card -->
                    <div class="col-md-3">
                        <div class="dashboard-card stat-card orders">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Commandes</h6>
                                    <h3 class="mb-0">24</h3>
                                    <small class="text-success"><i class="fas fa-arrow-up me-1"></i> 5% vs mois
                                        dernier</small>
                                </div>
                                <div class="card-icon bg-primary-light text-primary">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Card -->
                    <div class="col-md-3">
                        <div class="dashboard-card stat-card products">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Produits</h6>
                                    <h3 class="mb-0">{{ $stats['total'] }}</h3>
                                    <small class="text-muted">
                                        <i class="fas fa-circle me-1" style="font-size: 6px;"></i>
                                        {{ $stats['new_this_month'] }}
                                        nouveau{{ $stats['new_this_month'] > 1 ? 'x' : '' }} ce mois
                                    </small>
                                </div>
                                <div class="card-icon bg-warning-light text-warning">
                                    <i class="fas fa-box-open"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rating Card -->
                    <div class="col-md-3">
                        <div class="dashboard-card stat-card rating">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Note moyenne</h6>
                                    <h3 class="mb-0">4.7<span class="text-muted" style="font-size: 1rem;">/5</span>
                                    </h3>
                                    <div class="rating-stars small">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                </div>
                                <div class="card-icon bg-purple-light text-purple">
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Products -->
                    <div class="col-md-3">
                        <div class="dashboard-card stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Total Produits</h6>
                                    <h3 class="mb-0">{{ $stats['total'] }}</h3>
                                    <small class="text-muted">
                                        <i class="fas fa-circle me-1 text-primary" style="font-size: 6px;"></i>
                                        {{ $stats['active'] }} actifs
                                    </small>
                                </div>
                                <div class="card-icon bg-primary-light text-primary">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- New This Month -->
                    <div class="col-md-3">
                        <div class="dashboard-card stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Nouveaux ce mois</h6>
                                    <h3 class="mb-0">{{ $stats['new_this_month'] }}</h3>
                                    <small class="text-muted">
                                        <i class="fas fa-circle me-1 text-success" style="font-size: 6px;"></i>
                                        {{ now()->format('M Y') }}
                                    </small>
                                </div>
                                <div class="card-icon bg-success-light text-success">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Products -->
                    <div class="col-md-3">
                        <div class="dashboard-card stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Produits Actifs</h6>
                                    <h3 class="mb-0">{{ $stats['active'] }}</h3>
                                    <small class="text-muted">
                                        <i class="fas fa-circle me-1 text-warning" style="font-size: 6px;"></i>
                                        @if ($stats['total'] > 0)
                                            {{ round(($stats['active'] / $stats['total']) * 100) }}% du total
                                        @else
                                            0% du total
                                        @endif
                                    </small>

                                </div>
                                <div class="card-icon bg-warning-light text-warning">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Out of Stock -->
                    <div class="col-md-3">
                        <div class="dashboard-card stat-card">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">En rupture</h6>
                                    <h3 class="mb-0">{{ $stats['out_of_stock'] }}</h3>
                                    <small class="text-muted">
                                        <i class="fas fa-circle me-1 text-danger" style="font-size: 6px;"></i>
                                        {{ $stats['out_of_stock'] > 0 ? 'À réapprovisionner' : 'Tout est OK' }}
                                    </small>
                                </div>
                                <div class="card-icon bg-danger-light text-danger">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="dashboard-card mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0"><i class="fas fa-shopping-bag me-2 text-vert-benin"></i> Commandes récentes
                        </h5>
                        <a href="#" class="btn btn-outline-vert" data-section="orders">
                            <i class="fas fa-eye me-1"></i> Voir tout
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>N° Commande</th>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">#TKP-1256</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Marie+A&background=random"
                                                class="rounded-circle me-2" width="30" height="30">
                                            Marie Akouété
                                        </div>
                                    </td>
                                    <td>02/06/2024</td>
                                    <td>25,000 FCFA</td>
                                    <td><span class="badge bg-warning">En traitement</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-circle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#TKP-1255</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Jean+D&background=random"
                                                class="rounded-circle me-2" width="30" height="30">
                                            Jean Dossou
                                        </div>
                                    </td>
                                    <td>01/06/2024</td>
                                    <td>32,500 FCFA</td>
                                    <td><span class="badge bg-info">Expédié</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-circle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">#TKP-1254</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://ui-avatars.com/api/?name=Kofi+A&background=random"
                                                class="rounded-circle me-2" width="30" height="30">
                                            Kofi Adjo
                                        </div>
                                    </td>
                                    <td>30/05/2024</td>
                                    <td>18,750 FCFA</td>
                                    <td><span class="badge bg-success">Livré</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary rounded-circle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="dashboard-card h-100">
                            <h5 class="mb-4"><i class="fas fa-bolt me-2 text-warning"></i> Actions rapides</h5>
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-vert text-start" id="addProductBtn">
                                    <i class="fas fa-plus-circle me-2"></i> Ajouter un produit
                                </button>
                                <button class="btn btn-outline-primary text-start">
                                    <i class="fas fa-truck me-2"></i> Suivi des livraisons
                                </button>
                                <button class="btn btn-outline-info text-start">
                                    <i class="fas fa-chart-pie me-2"></i> Voir les statistiques
                                </button>
                                <button class="btn btn-outline-secondary text-start">
                                    <i class="fas fa-question-circle me-2"></i> Centre d'aide
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="dashboard-card h-100">
                            <h5 class="mb-4"><i class="fas fa-chart-line me-2 text-info"></i> Activité récente</h5>
                            <div class="text-center py-4">
                                <img src="https://via.placeholder.com/800x300?text=Graphique+des+ventes"
                                    class="img-fluid rounded" alt="Graphique des ventes">
                                <p class="text-muted mt-3">Évolution des ventes sur les 30 derniers jours</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Les autres sections (products, orders, reviews, etc.) restent identiques en termes de fonctionnalités -->
            <!-- Seul le style a été modifié pour correspondre au nouveau design -->

            <!-- Section Produits -->
            <div class="content-section" id="products">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0"><i class="fas fa-box-open me-2 text-vert-benin"></i> Mes produits</h3>
                    <button class="btn btn-vert" id="addProductBtn">
                        <i class="fas fa-plus me-2"></i> Ajouter un produit
                    </button>
                </div>

                <div class="dashboard-card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Nom du produit</th>
                                    <th>Description</th>
                                    <th>Catégorie</th>
                                    <th>Prix</th>
                                    <th>Promotion</th>
                                    <th>Stock</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($produits as $produit)
                                    <tr>
                                        <!-- Première image comme miniature -->
                                        <td>
                                            @if ($produit->photos->isNotEmpty())
                                                <img src="{{ Storage::url($produit->photos->first()->url) }}"
                                                    alt="{{ $produit->nom }}" width="50" />
                                            @else
                                                <img src="https://via.placeholder.com/50" alt="Aucune image"
                                                    class="rounded" width="50">
                                            @endif
                                        </td>

                                        <td>{{ $produit->nom }}</td>
                                        <td>{{ Str::limit($produit->description, 30) }}</td>
                                        <td>{{ $produit->categorie->nom ?? 'N/A' }}</td>
                                        <td>
                                            @if ($produit->prix_promo)
                                                <span class="text-danger"><del>{{ number_format($produit->prix, 0, ',', ' ') }}
                                                        FCFA</del></span>
                                                <br>{{ number_format($produit->prix_promo, 0, ',', ' ') }} FCFA
                                            @else
                                                {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                            @endif
                                        </td>
                                        <td>
                                            @if ($produit->hasActivePromo())
                                                Du {{ $produit->debut_promo->format('d/m/Y') }}<br>
                                                au {{ $produit->fin_promo->format('d/m/Y') }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $produit->stock }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $produit->est_actif ? 'success' : 'secondary' }}">
                                                {{ $produit->est_actif ? 'Actif' : 'Inactif' }}
                                            </span>
                                        </td>
                                        <td>
                                            {{-- Bouton d'édition --}}
                                            <button class="btn btn-sm btn-outline-primary me-1 rounded-circle"
                                                data-bs-toggle="modal" data-bs-target="#editProductModal"
                                                data-id="{{ $produit->id }}" data-nom="{{ $produit->nom }}"
                                                data-prix="{{ $produit->prix }}"
                                                data-prix_promo="{{ $produit->prix_promo }}"
                                                data-debut_promo="{{ $produit->debut_promo ? $produit->debut_promo->format('Y-m-d') : '' }}"
                                                data-fin_promo="{{ $produit->fin_promo ? $produit->fin_promo->format('Y-m-d') : '' }}"
                                                data-stock="{{ $produit->stock }}"
                                                data-est_actif="{{ $produit->est_actif }}"
                                                data-description="{{ $produit->description }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            {{-- Formulaire de suppression --}}
                                            <form action="{{ route('artisan.produits.destroy', $produit->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger rounded-circle delete-btn"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Aucun produit enregistré</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Les autres sections (orders, reviews, statistics, messages, settings) -->
            <!-- ... (le contenu reste identique mais avec le nouveau style) ... -->

        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2 text-vert-benin"></i> Ajouter un nouveau
                        produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nom du produit</label>
                                <input type="text" class="form-control" placeholder="Ex: Statue en bois">
                            </div>
                           
                            <div class="col-md-6">
                                <label class="form-label">Prix (FCFA)</label>
                                <input type="number" class="form-control" placeholder="Ex: 15000">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Quantité disponible</label>
                                <input type="number" class="form-control" placeholder="Ex: 10">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="3" placeholder="Décrivez votre produit..."></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Images du produit</label>
                                <div class="border rounded p-3 text-center">
                                    <i class="fas fa-cloud-upload-alt display-4 text-muted mb-3"></i>
                                    <p class="mb-2">Glissez-déposez vos images ici ou cliquez pour sélectionner</p>
                                    <small class="text-muted">Formats supportés: JPG, PNG (max 2MB par image)</small>
                                    <input type="file" class="d-none" id="fileUpload" multiple>
                                    <button class="btn btn-outline-primary mt-3"
                                        onclick="document.getElementById('fileUpload').click()">
                                        <i class="fas fa-folder-open me-2"></i> Sélectionner des fichiers
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-vert w-100 py-2">
                                    <i class="fas fa-save me-2"></i> Enregistrer le produit
                                </button>
                            </div>
                        </div>
                    </form> --}}
                    <form id="addProductForm" action="{{ route('artisan.produits.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="artisan_id" value="{{ auth()->user()->artisan->id }}">
                        <div class="row g-3">
                            <!-- Nom -->
                            <div class="col-md-6">
                                <label class="form-label">Nom du produit <span class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control" required
                                    placeholder="Ex: Statue en bois">
                            </div>

                            <!-- Catégorie -->
                            <div class="col-md-6">
                                <label class="form-label">Catégorie</label>
                                <input type="text" class="form-control bg-light"
                                    value="{{ auth()->user()->artisan->categorie->nom }}" readonly>
                                <small class="text-muted">Vos produits sont automatiquement associés à cette
                                    catégorie.</small>
                                <input type="hidden" name="categorie_id"
                                    value="{{ auth()->user()->artisan->categorie_id }}">
                            </div>

                            <!-- Prix -->
                            <div class="col-md-6">
                                <label class="form-label">Prix (FCFA) <span class="text-danger">*</span></label>
                                <input type="number" name="prix" class="form-control" min="100"
                                    step="50" required placeholder="Ex: 15000">
                            </div>

                            <!-- Prix promotionnel -->
                            <div class="col-md-6">
                                <label class="form-label">Prix promotionnel (FCFA)</label>
                                <input type="number" name="prix_promo" class="form-control" min="0"
                                    step="50" placeholder="Laissez vide si pas de promo">
                            </div>

                            <!-- Dates de promotion -->
                            <div class="col-md-6">
                                <label class="form-label">Début de promotion (optionnel)</label>
                                <input type="date" name="debut_promo" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fin de promotion (optionnel)</label>
                                <input type="date" name="fin_promo" class="form-control">
                            </div>

                            <!-- Stock -->
                            <div class="col-md-6">
                                <label class="form-label">Quantité disponible <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="stock" class="form-control" min="0" required
                                    placeholder="Ex: 10">
                            </div>

                            <!-- Statut -->
                            <div class="col-md-6">
                                <label class="form-label">Statut</label>
                                <select name="est_actif" class="form-select">
                                    <option value="1">Actif</option>
                                    <option value="0">Inactif</option>
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Décrivez votre produit..."></textarea>
                            </div>

                            <!-- Images -->
                            <div class="col-12">
                                <label class="form-label">Images du produit <span class="text-danger">*</span></label>
                                <div class="border rounded p-3 text-center">
                                    <input type="file" name="images[]" id="fileUpload" class="d-none" multiple
                                        accept="image/jpeg, image/png" required>
                                    <div id="imagePreview" class="d-flex flex-wrap gap-2 mb-3"></div>
                                    <button type="button" class="btn btn-outline-primary mt-3"
                                        onclick="document.getElementById('fileUpload').click()">
                                        <i class="fas fa-folder-open me-2"></i> Sélectionner des fichiers
                                    </button>
                                    <small class="d-block mt-2 text-muted">Formats acceptés: JPEG, PNG (max 2MB par
                                        image)</small>
                                </div>
                            </div>

                            <!-- Bouton de soumission -->
                            {{-- <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-vert w-100 py-2">
                                <i class="fas fa-save me-2"></i> Enregistrer le produit
                            </button>
                        </div> --}}
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" form="addProductForm" class="btn btn-vert">
                        <i class="fas fa-save me-2"></i> Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit me-2 text-vert-benin"></i> Modifier le produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="artisan_id" value="{{ auth()->user()->artisan->id }}">
                        <input type="hidden" id="edit_id" name="id">

                        <div class="row g-3">
                            <!-- Nom -->
                            <div class="col-md-6">
                                <label class="form-label">Nom du produit <span class="text-danger">*</span></label>
                                <input type="text" name="nom" id="edit_nom" class="form-control" required>
                            </div>

                            <!-- Catégorie -->
                            <div class="col-md-6">
                                <label class="form-label">Catégorie</label>
                                <input type="text" class="form-control bg-light"
                                    value="{{ auth()->user()->artisan->categorie->nom }}" readonly>
                                <input type="hidden" name="categorie_id"
                                    value="{{ auth()->user()->artisan->categorie_id }}">
                            </div>

                            <!-- Prix -->
                            <div class="col-md-6">
                                <label class="form-label">Prix (FCFA) <span class="text-danger">*</span></label>
                                <input type="number" name="prix" id="edit_prix" class="form-control" required>
                            </div>

                            <!-- Prix promotionnel -->
                            <div class="col-md-6">
                                <label class="form-label">Prix promotionnel (FCFA)</label>
                                <input type="number" name="prix_promo" id="edit_prix_promo" class="form-control">
                            </div>

                            <!-- Dates de promotion -->
                            <div class="col-md-6">
                                <label class="form-label">Début de promotion</label>
                                <input type="date" name="debut_promo" id="edit_debut_promo" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Fin de promotion</label>
                                <input type="date" name="fin_promo" id="edit_fin_promo" class="form-control">
                            </div>

                            <!-- Stock -->
                            <div class="col-md-6">
                                <label class="form-label">Quantité disponible <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="stock" id="edit_stock" class="form-control" required>
                            </div>

                            <!-- Statut -->
                            <div class="col-md-6">
                                <label class="form-label">Statut</label>
                                <select name="est_actif" id="edit_est_actif" class="form-select">
                                    <option value="1">Actif</option>
                                    <option value="0">Inactif</option>
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                            </div>

                            <!-- Images existantes -->
                            <div class="col-12">
                                <label class="form-label">Images actuelles</label>
                                <div class="d-flex flex-wrap gap-2 mb-3" id="currentImages">
                                    @foreach ($produits as $produit)
                                        @foreach ($produit->photos as $photo)
                                            <div class="position-relative d-inline-block me-2 mb-2">
                                                <img src="{{ Storage::url($photo->url) }}" width="80"
                                                    class="rounded">
                                                <form
                                                    action="{{ route('artisan.produits.photos.destroy', [$produit->id, $photo->id]) }}"
                                                    method="POST" class="position-absolute top-0 end-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger p-0 rounded-circle"
                                                        style="width:20px;height:20px;"
                                                        onclick="return confirm('Supprimer cette image?')">
                                                        <i class="fas fa-times" style="font-size:10px;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    @endforeach

                                </div>
                            </div>

                            <!-- Nouvelles images -->
                            <div class="col-12">
                                <label class="form-label">Ajouter de nouvelles images</label>
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" form="editProductForm" class="btn btn-vert">
                        <i class="fas fa-save me-2"></i> Enregistrer
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        @if (session('success'))
            <div class="toast show align-items-center text-white bg-success border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="toast show align-items-center text-white bg-danger border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>

    @stack('scripts')


    <div class="modal fade" id="settingsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-cog me-2"></i>Paramètres
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update.settings') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Préférences de notification</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notifEmail" name="notif_email"
                                    checked>
                                <label class="form-check-label" for="notifEmail">Notifications par email</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notifSMS" name="notif_sms">
                                <label class="form-check-label" for="notifSMS">Notifications par SMS</label>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-outline-secondary me-2"
                                data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-vert-benin">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!--  script pour remplir le modal de Modification -->
    <script>
        document.getElementById('editProductModal').addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const modal = this;

            // Remplir les champs du formulaire
            modal.querySelector('#edit_id').value = button.getAttribute('data-id');
            modal.querySelector('#edit_nom').value = button.getAttribute('data-nom');
            modal.querySelector('#edit_prix').value = button.getAttribute('data-prix');
            modal.querySelector('#edit_prix_promo').value = button.getAttribute('data-prix_promo');
            modal.querySelector('#edit_debut_promo').value = button.getAttribute('data-debut_promo');
            modal.querySelector('#edit_fin_promo').value = button.getAttribute('data-fin_promo');
            modal.querySelector('#edit_stock').value = button.getAttribute('data-stock');
            modal.querySelector('#edit_est_actif').value = button.getAttribute('data-est_actif');
            modal.querySelector('#edit_description').value = button.getAttribute('data-description');

            // Mettre à jour l'action du formulaire
            const form = modal.querySelector('#editProductForm');
            form.action = '/artisan/produits/' + button.getAttribute('data-id');
        });
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm(
                        'Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.')) {
                    e.preventDefault();
                }
            });
        });
        // Auto-hide les toasts après 5 secondes
        document.addEventListener('DOMContentLoaded', function() {
            const toasts = document.querySelectorAll('.toast');

            toasts.forEach(toast => {
                // Fermeture automatique après 5s
                setTimeout(() => {
                    const bsToast = bootstrap.Toast.getInstance(toast);
                    if (bsToast) bsToast.hide();
                }, 5000);

                // Initialisation Bootstrap
                new bootstrap.Toast(toast, {
                    autohide: true,
                    delay: 5000
                });
            });

            // Fermer automatiquement le modal après succès
            @if (session('success'))
                const addModal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
                if (addModal) addModal.hide();
            @endif
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileUpload = document.getElementById('fileUpload');
            const imagePreview = document.getElementById('imagePreview');

            // Aperçu des images sélectionnées
            fileUpload.addEventListener('change', function(e) {
                imagePreview.innerHTML = '';
                Array.from(e.target.files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.width = 100;
                        img.classList.add('img-thumbnail');
                        imagePreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menu Toggle for Mobile
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');

            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Section Switching
            const menuLinks = document.querySelectorAll('.sidebar-menu a');
            const contentSections = document.querySelectorAll('.content-section');

            menuLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all menu items
                    menuLinks.forEach(item => item.classList.remove('active'));

                    // Add active class to clicked menu item
                    this.classList.add('active');

                    // Get the target section ID
                    const targetSection = this.getAttribute('data-section');

                    // Hide all content sections
                    contentSections.forEach(section => {
                        section.classList.remove('active');
                    });

                    // Show the target section
                    document.getElementById(targetSection).classList.add('active');

                    // Close sidebar on mobile after selection
                    if (window.innerWidth < 992) {
                        sidebar.classList.remove('active');
                    }
                });
            });

            // Add Product Modal
            const addProductBtns = document.querySelectorAll('#addProductBtn');

            addProductBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const modal = new bootstrap.Modal(document.getElementById('addProductModal'));
                    modal.show();
                });
            });

        });
    </script>
    <!-- Code injected by live-server -->

    <script>
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
                            "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                                .valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>

</html>
