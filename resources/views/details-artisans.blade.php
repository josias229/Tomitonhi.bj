@extends('layout.main')

@section('main-content')


    <main class="py-5">
        <div class="container">
            <!-- Header boutique -->
            <div class="row align-items-center mb-5">
                <div class="col-md-5">
                    <div class="modern-profile-card">
                        <!-- Grande image rectangulaire moderne -->
                        <div class="profile-image-wrapper">
                            @if ($artisan->artisan && $artisan->artisan->photo_profil)
                                @if (str_contains($artisan->artisan->photo_profil, 'https://'))
                                    <img src="{{ $artisan->artisan->photo_profil }}" class="profile-main-image"
                                        alt="Portrait {{ $artisan->name }}">
                                @else
                                    <img src="{{ Storage::url($artisan->artisan->photo_profil) }}" class="profile-main-image"
                                        alt="Portrait {{ $artisan->name }}">
                                @endif
                            @else
                                <img src="https://picsum.photos/id/{{ rand(1, 1000) }}/600/600" class="card-img-top"
                                    alt="Artisan">
                            @endif

                            <!-- Badge réseaux sociaux flottant -->
                            <div class="social-badge">
                                @if ($artisan->artisan && $artisan->artisan->reseaux_sociaux)
                                    <!-- Si les réseaux sociaux sont stockés en base -->
                                    <a href="{{ $artisan->artisan->instagram ?? '#' }}" class="social-link"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="{{ $artisan->artisan->linkedin ?? '#' }}" class="social-link"><i
                                            class="fab fa-linkedin"></i></a>
                                    <a href="{{ $artisan->artisan->twitter ?? '#' }}" class="social-link"><i
                                            class="fab fa-twitter"></i></a>
                                @else
                                    <!-- Version par défaut -->
                                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                @endif
                            </div>
                        </div>

                        <!-- Contenu texte aligné à droite -->
                        <div class="profile-content">
                            <h5 class="profile-name">{{ $artisan->name }}</h5>

                            <!-- Note -->
                            <div class="rating-badge">
                                @if ($artisan->artisan && $artisan->artisan->note_moyenne > 0)
                                    <span class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= floor($artisan->artisan->note_moyenne))
                                                <i class="fas fa-star"></i>
                                            @elseif(
                                                $i == ceil($artisan->artisan->note_moyenne) &&
                                                    $artisan->artisan->note_moyenne - floor($artisan->artisan->note_moyenne) >= 0.5)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </span>
                                    <span class="rating-text">{{ number_format($artisan->artisan->note_moyenne, 1) }}/5
                                        ({{ $artisan->artisan->avis_count ?? 0 }} avis)</span>
                                @else
                                    <span class="stars">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </span>
                                    <span class="rating-text">Nouveau</span>
                                @endif
                            </div>

                            <div class="profile-actions">
                                @if (auth()->check() && auth()->user()->id !== $artisan->id)
                                    <button class="btn-follow">
                                        <i class="fas fa-plus"></i> Suivre
                                    </button>
                                    {{-- <a href="{{ route('messages.create', ['recipient_id' => $artisan->id]) }}" class="btn-message"> --}}
                                    <a href="#" class="btn-message">
                                        <i class="fas fa-envelope"></i> Message
                                    </a>
                                @else
                                    <button class="btn-follow" disabled>
                                        <i class="fas fa-plus"></i> Suivre
                                    </button>
                                    <button class="btn-message" disabled>
                                        <i class="fas fa-envelope"></i> Message
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1 class="h2 mb-3">{{ $artisan->artisan->atelier ?? $artisan->name }}</h1>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marker-alt text-muted me-2"></i>
                        <span>{{ $artisan->ville ?? 'Ville non spécifiée' }}, Bénin</span>
                        <span class="mx-2">•</span>
                        <span>Membre depuis {{ $artisan->created_at->format('Y') }}</span>
                    </div>
                    <p class="lead">{{ $artisan->artisan->description ?? 'Description non disponible' }}</p>
                </div>
            </div>

            <!-- Onglets -->
            <ul class="nav nav-tabs mb-4" id="artisanTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#produits">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#histoire">Informations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#avis">Avis (bientôt disponible)</a>
                </li>
            </ul>

            <!-- Contenu des onglets -->
            <div class="tab-content">
                <!-- Onglet Produits -->
                <div class="tab-pane fade show active" id="produits">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Découvrez nos créations artisanales faites main avec des
                        matériaux 100% naturels.
                    </div>

                    <div class="row g-4">
                        @forelse($produits as $produit)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card product-card h-100 border-0 bg-transparent">
                                    <div class="position-relative">
                                        @if ($produit->photos->isNotEmpty())
                                            @if (str_contains($produit->photos->first()->url, 'https://'))
                                                <img src="{{ $produit->photos->first()->url }}"
                                                    class="card-img-top rounded" alt="{{ $produit->nom }}">
                                            @else
                                                <img src="{{ Storage::url($produit->photos->first()->url) }}"
                                                    class="card-img-top rounded" alt="{{ $produit->nom }}">
                                            @endif
                                        @endif
                                        <button
                                            class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <span
                                            class="position-absolute top-0 start-0 {{ $produit->stock > 0 ? 'bg-success' : 'bg-danger' }} text-white small p-1 px-2 m-2 rounded">
                                            {{ $produit->stock > 0 ? 'En stock' : 'Rupture' }}
                                        </span>
                                    </div>
                                    <div class="card-body px-0 py-2">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span
                                                class="text-muted small">{{ $produit->categorie->nom ?? 'Non catégorisé' }}</span>
                                            <div class="rating small text-warning">
                                                <i class="fas fa-star"></i>
                                                <span class="text-dark">N/A</span>
                                            </div>
                                        </div>
                                        <h3 class="h6 card-title mb-1">{{ $produit->nom }}</h3>
                                        <p class="card-text text-success mb-1">
                                            @if (
                                                $produit->prix_promo &&
                                                    $produit->debut_promo &&
                                                    $produit->fin_promo &&
                                                    now()->between($produit->debut_promo, $produit->fin_promo))
                                                <span
                                                    class="text-decoration-line-through text-muted small me-1">{{ number_format($produit->prix, 0, ',', ' ') }}
                                                    FCFA</span>
                                                {{ number_format($produit->prix_promo, 0, ',', ' ') }} FCFA
                                            @else
                                                {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                            @endif
                                        </p>
                                        <div class="d-flex gap-2 mt-3">
                                            <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product "
                                                data-bs-toggle="modal" data-bs-target="#productModal"
                                                data-name="{{ $produit->nom }}"
                                                data-category="{{ $produit->categorie->nom }}"
                                                data-artisan="{{ $produit->artisan->user->name }}"
                                                data-description="{{ $produit->description }}"
                                                data-price="{{ number_format($produit->prix, 0, ',', ' ') }}"
                                                data-promo="{{ $produit->prix_promo ? number_format($produit->prix_promo, 0, ',', ' ') : '' }}"
                                                data-image="{{ $produit->photos->count() > 0 ? Storage::url($produit->photos->first()->url) : 'https://picsum.photos/id/' . rand(1, 1000) . '/600/600' }}">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-vert w-100 py-2 rounded-3">
                                                    Passer la commande <i class="fas fa-arrow-right ms-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning">
                                    Aucun produit disponible pour le moment.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Onglet Histoire/Informations -->
                <div class="tab-pane fade" id="histoire">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="h5">À propos de l'artisan</h3>
                            <p>{{ $artisan->artisan->description ?? 'Description non disponible' }}</p>

                            @if ($artisan->artisan && $artisan->artisan->galerie_photos)
                                @php
                                    $photos = json_decode($artisan->artisan->galerie_photos);
                                @endphp
                                @if (!empty($photos))
                                    <img src="{{ Storage::url($photos[0]) }}" class="img-fluid rounded mt-3"
                                        alt="Atelier de {{ $artisan->name }}">
                                @endif
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <h4 class="h6">Coordonnées</h4>
                                    <ul class="list-unstyled">
                                        @if ($artisan->telephone)
                                            <li class="mb-2"><i class="fas fa-phone text-vert-benin me-2"></i>
                                                {{ $artisan->telephone }}</li>
                                        @endif
                                        @if ($artisan->whatsapp)
                                            <li class="mb-2"><i class="fab fa-whatsapp text-vert-benin me-2"></i>
                                                {{ $artisan->whatsapp }}</li>
                                        @endif
                                        @if ($artisan->email)
                                            <li class="mb-2"><i class="fas fa-envelope text-vert-benin me-2"></i>
                                                {{ $artisan->email }}</li>
                                        @endif
                                        @if ($artisan->adresse)
                                            <li class="mb-2"><i class="fas fa-map-marker-alt text-vert-benin me-2"></i>
                                                {{ $artisan->adresse }}</li>
                                        @endif
                                    </ul>
                                    <div class="mt-3">
                                        <a href="mailto:{{ $artisan->email }}" class="btn btn-sm btn-outline-vert-benin">
                                            <i class="fas fa-envelope me-1"></i> Envoyer un message
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Onglet Avis (désactivé) -->
                <div class="tab-pane fade" id="avis">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> Le système d'avis clients sera bientôt disponible.
                                Revenez plus tard pour découvrir les retours sur cet artisan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Activation des onglets Bootstrap
            document.addEventListener('DOMContentLoaded', function() {
                const tabElms = document.querySelectorAll('a[data-bs-toggle="tab"]');
                tabElms.forEach(function(tabEl) {
                    tabEl.addEventListener('click', function(e) {
                        e.preventDefault();
                        const tab = new bootstrap.Tab(this);
                        tab.show();
                    });
                });
            });
        </script>
@endsection
