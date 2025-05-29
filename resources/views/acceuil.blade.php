@extends('layout.main')

@section('main-content')
    <!-- Section Hero -->
    <section class="hero-section py-4">
        <div class="container">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4 overflow-hidden">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row g-0 align-items-center" style="background-color: var(--vert-clair);">
                            <div class="col-md-6 p-5">
                                <span class="badge bg-white text-vert-benin mb-3">100% naturel</span>
                                <h2 class="mb-3">Produits Frais du Terroir</h2>
                                <p class="mb-4">Découvrez nos fruits et légumes cultivés localement avec amour par nos
                                    agriculteurs
                                    béninois.</p>
                                <a href="#" class="btn btn-vert rounded-pill px-4">Explorer</a>
                            </div>
                            <div class="col-md-6">
                                <img src="images/test-picture-local.jpg" class="img-fluid" alt="Produits frais">
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row g-0 align-items-center" style="background-color: #fff3e0;">
                            <div class="col-md-6 p-5">
                                <span class="badge bg-warning mb-3">Artisanat local</span>
                                <h2 class="mb-3">Tissus & Créations Traditionnelles</h2>
                                <p class="mb-4">Des pièces uniques tissées à la main par nos artisans talentueux,
                                    héritiers d'un
                                    savoir-faire ancestral.</p>
                                <a href="#" class="btn btn-warning rounded-pill px-4 text-white">Voir la
                                    collection</a>
                            </div>
                            <div class="col-md-6">
                                <img src="images/test-picture-local.jpg" class="img-fluid" alt="Artisanat">
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Promotions -->
    <section class="py-4" id="promotions">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="promo-card bg-light p-4 d-flex align-items-center">
                        <div>
                            <span class="badge bg-vert-benin mb-2">-20%</span>
                            <h3 class="h5 mb-1">Boissons Traditionnelles</h3>
                            <a class='text-decoration-none d-flex align-items-center small' href='/promotions'>
                                <span>Découvrir</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                        <img src="images/test-picture-local.jpg" class="ms-3" width="80" alt="Boissons">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="promo-card bg-light p-4 d-flex align-items-center">
                        <div>
                            <span class="badge bg-vert-benin mb-2">Nouveau</span>
                            <h3 class="h5 mb-1">Cosmétiques Naturels</h3>
                            <a class='text-decoration-none d-flex align-items-center small' href='/promotions'>
                                <span>Explorer</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                        <img src="images/test-picture-local.jpg" class="ms-3" width="80" alt="Cosmétiques">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="promo-card bg-light p-4 d-flex align-items-center">
                        <div>
                            <span class="badge bg-vert-benin mb-2">Promo</span>
                            <h3 class="h5 mb-1">Instruments de Musique</h3>
                            <a class='text-decoration-none d-flex align-items-center small' href='/promotions'>
                                <span>Voir</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                        <img src="images/test-picture-local.jpg" class="ms-3" width="80" alt="Instruments">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Produits Vedettes -->
    <section class="py-5" id="products-section">
        <div class="container">
            <!-- En-tête -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <div>
                    <h2 class="h3 mb-1">Nos produits phares</h2>
                    <p class="text-muted mb-md-0">Découvrez les meilleures créations artisanales du Bénin</p>
                </div>
            </div>

            <!-- Grille de produits aléatoires -->
            <div class="row g-4">
                @php
                    // Récupérer 4 produits actifs aléatoires
                    $produitsPhares = App\Models\Produit::where('est_actif', true)->inRandomOrder()->take(4)->get();
                @endphp

                @foreach ($produitsPhares as $produit)
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                @if ($produit->photos->count() > 0)
                                    @if (str_contains($produit->photos->first()->url, 'https://'))
                                        <img src="{{ $produit->photos->first()->url }}" class="card-img-top rounded"
                                            alt="{{ $produit->nom }}">
                                    @else
                                        <img src="{{ Storage::url($produit->photos->first()->url) }}"
                                            class="card-img-top rounded" alt="{{ $produit->nom }}">
                                    @endif
                                @else
                                    <img src="https://picsum.photos/id/{{ rand(1, 1000) }}/600/600"
                                        class="card-img-top rounded" alt="{{ $produit->nom }}">
                                @endif

                                <button
                                    class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                    <i class="far fa-heart"></i>
                                </button>

                                <span
                                    class="position-absolute top-0 start-0 bg-success text-white small p-1 px-2 m-2 rounded">
                                    {{ $produit->stock > 0 ? 'En stock' : 'Rupture' }}
                                </span>
                            </div>

                            <div class="card-body px-0 py-2">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted small">{{ $produit->categorie->nom }}</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>

                                <h3 class="h6 card-title mb-1">{{ $produit->nom }}</h3>

                                @if ($produit->prix_promo)
                                    <p class="card-text text-success mb-1">
                                        <span class="text-decoration-line-through text-muted small me-2">
                                            {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                        </span>
                                        {{ number_format($produit->prix_promo, 0, ',', ' ') }} FCFA
                                    </p>
                                @else
                                    <p class="card-text text-success mb-1">
                                        {{ number_format($produit->prix, 0, ',', ' ') }} FCFA
                                    </p>
                                @endif

                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product"
                                        data-bs-toggle="modal" data-bs-target="#productModal"
                                        data-name="{{ $produit->nom }}" data-category="{{ $produit->categorie->nom }}"
                                        data-artisan="{{ $produit->artisan->user->name }}"
                                        data-description="{{ $produit->description }}"
                                        data-price="{{ number_format($produit->prix, 0, ',', ' ') }}"
                                        data-promo="{{ $produit->prix_promo ? number_format($produit->prix_promo, 0, ',', ' ') : '' }}"
                                        data-image="{{ $produit->photos->count() > 0 ? Storage::url($produit->photos->first()->url) : 'https://picsum.photos/id/' . rand(1, 1000) . '/600/600' }}">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <form action="{{ route('cart.add', $produit->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-vert flex-grow-1">
                                            <i class="fas fa-cart-plus"></i> Ajouter
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bouton "Voir plus" centré -->
            <div class="text-center mt-5">
                <a href="#" class="btn btn-vert px-4">
                    <i class="fas fa-arrow-down me-2"></i> Voir plus de produits
                </a>
            </div>
        </div>
    </section>

    <!-- Section Artisans & Produits Phares -->
    <section class="py-5 bg-light" id="artisans-section">
        <div class="container">
            <!-- En-tête section -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <h2 class="h3">Découvrez nos artisans d'exception</h2>
                    <p class="mb-0">Des créations uniques directement des mains talentueuses de nos artisans béninois</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('artisan') }}" class="btn btn-outline-vert-benin">Voir tous les artisans →</a>
                </div>
            </div>

            <!-- Cartes Artisans -->
            <div class="row g-4">
                @foreach ($artisansPopulaires as $artisan)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                @if ($artisan->artisan && $artisan->artisan->photo_profil)
                                    @if (str_contains($artisan->artisan->photo_profil, 'https://'))
                                        <img src="{{ $artisan->artisan->photo_profil }}"
                                            class="profile-main-image" alt="Portrait {{ $artisan->name }}">
                                    @else
                                        <img src="{{ Storage::url($artisan->artisan->photo_profil) }}"
                                            class="profile-main-image" alt="Portrait {{ $artisan->name }}">
                                    @endif
                                @else
                                    <img src="https://picsum.photos/id/{{ rand(1, 1000) }}/600/600" class="card-img-top" alt="Artisan">
                                @endif
                            
                                @if ($artisan->ville)
                                    <span class="position-absolute top-0 end-0 bg-vert-benin text-white small p-2">{{ $artisan->ville }}</span>
                                @endif
                            </div>
                            <div class="card-body">
                                <h3 class="h5 card-title">{{ $artisan->name }}</h3>
                                <p class="card-text small text-muted">
                                    @if ($artisan->artisan && $artisan->artisan->description)
                                        {{ Str::limit($artisan->artisan->description, 70) }}
                                    @else
                                        Artisan talentueux du Bénin
                                    @endif
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark ms-1">
                                            @if ($artisan->artisan && $artisan->artisan->note_moyenne > 0)
                                                {{ number_format($artisan->artisan->note_moyenne, 1) }}
                                                ({{ $artisan->artisan->produits->count() }})
                                            @else
                                                Nouveau
                                            @endif
                                        </span>
                                    </div>
                                    <a href="{{ route('details-artisans', ['artisan' => $artisan->id]) }}"
                                        class="btn btn-sm btn-vert">Voir boutique</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Produits Tendances -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3">Produits tendances cette semaine</h2>
                <a href="{{ route('produits') }}" class="btn btn-outline-vert-benin">Explorer plus →</a>
            </div>

            <div class="row g-4">
                @foreach ($produitsTendances as $produit)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                @if ($produit->photos->first())
                                    <img src="{{ Storage::url($produit->photos->first()->url) }}"
                                        class="card-img-top rounded" alt="{{ $produit->nom }}">
                                @else
                                    <img src="{{ asset('images/placeholder-product.jpg') }}" class="card-img-top rounded"
                                        alt="Image non disponible">
                                @endif

                                <button
                                    class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                    <i class="far fa-heart"></i>
                                </button>

                                @if ($produit->prix_promo && $produit->fin_promo > now())
                                    <span
                                        class="position-absolute top-0 start-0 bg-success text-white small p-1 px-2 m-2 rounded">
                                        -{{ round(100 - ($produit->prix_promo * 100) / $produit->prix) }}%
                                    </span>
                                @elseif($produit->created_at->diffInDays(now()) < 7)
                                    <span
                                        class="position-absolute top-0 start-0 bg-danger text-white small p-1 px-2 m-2 rounded">Nouveau</span>
                                @endif
                            </div>
                            <div class="card-body px-0 py-2">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted small">{{ $produit->categorie->nom }}</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.8</span>
                                        <!-- Vous pouvez ajouter un système de notation plus tard -->
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">{{ $produit->nom }}</h3>

                                @if ($produit->prix_promo && $produit->fin_promo > now())
                                    <p class="card-text text-success mb-1">
                                        <span
                                            class="text-decoration-line-through text-muted small me-1">{{ number_format($produit->prix, 0, ',', ' ') }}
                                            FCFA</span>
                                        {{ number_format($produit->prix_promo, 0, ',', ' ') }} FCFA
                                    </p>
                                @else
                                    <p class="card-text text-success mb-1">
                                        {{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
                                @endif

                                <form action="{{ route('cart.add', $produit->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i> Ajouter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Valeurs -->
    <section class="py-5 bg-vert-benin text-white">
        <div class="container">
            <div class="row justify-content-center text-center mb-4">
                <div class="col-lg-8">
                    <h2 class="h2 mb-3">Tomitɔnhi, bien plus qu'une marketplace</h2>
                    <p>Nous connectons les artisans béninois au monde entier, en préservant les traditions et en
                        soutenant les
                        économies locales</p>
                </div>
            </div>

            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4 bg-white bg-opacity-10 rounded-3 h-100">
                        <i class="fas fa-hands-helping display-5 mb-3"></i>
                        <h3 class="h4">Commerce Équitable</h3>
                        <p>80% du prix revient directement à l'artisan</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 bg-white bg-opacity-10 rounded-3 h-100">
                        <i class="fas fa-leaf display-5 mb-3"></i>
                        <h3 class="h4">100% Naturel</h3>
                        <p>Des matériaux bruts et des techniques traditionnelles</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 bg-white bg-opacity-10 rounded-3 h-100">
                        <i class="fas fa-globe-africa display-5 mb-3"></i>
                        <h3 class="h4">Livraison Mondiale</h3>
                        <p>Expédition sécurisée vers 30+ pays</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Témoignages -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="h3 text-center mb-5">Ce que disent nos clients</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="rating mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text mb-4">"Le tissu batik que j'ai reçu est encore plus beau en vrai. La
                                qualité est
                                exceptionnelle et le service client très réactif."</p>
                            <div class="d-flex align-items-center">
                                <img src="images/artisan2.jpg" class="rounded-circle me-3" width="40">
                                <div>
                                    <h4 class="h6 mb-0">Claire L.</h4>
                                    <small class="text-muted">Paris, France</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="rating mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text mb-4">"Commande reçu en 5 jours seulement au Canada! La statuette en
                                bois est
                                magnifique et l'artisan a inclus un petit mot touchant."</p>
                            <div class="d-flex align-items-center">
                                <img src="images/artisan2.jpg" class="rounded-circle me-3" width="40">
                                <div>
                                    <h4 class="h6 mb-0">Jean M.</h4>
                                    <small class="text-muted">Montréal, Canada</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="rating mb-3 text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="card-text mb-4">"Je recommande vivement cette plateforme. Les savons au karité ont
                                ravi ma peau
                                sensible. Je vais commander à nouveau!"</p>
                            <div class="d-flex align-items-center">
                                <img src="images/artisan2.jpg" class="rounded-circle me-3" width="40">
                                <div>
                                    <h4 class="h6 mb-0">Amina S.</h4>
                                    <small class="text-muted">Bruxelles, Belgique</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Blog -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-between align-items-center mb-4">
                <div class="col-md-8">
                    <h2 class="h3">Le Mag' Artisanal</h2>
                    <p class="mb-0">Découvrez l'univers de l'artisanat béninois à travers nos articles</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a class='btn btn-outline-vert-benin' href='/blog'>Voir tous les articles →</a>
                </div>
            </div>

            <div class="row g-4">
                <!-- Article 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100 shadow-sm">
                        <img src="images/mag-local.jpg" class="card-img-top" alt="Art Batik">
                        <div class="card-body">
                            <span class="badge bg-vert-benin mb-2">Savoir-faire</span>
                            <h3 class="h5 card-title">L'art du Batik au Bénin</h3>
                            <p class="card-text text-muted small">Découvrez les secrets de cette technique ancestrale de
                                teinture...
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="small text-muted"><i class="far fa-calendar me-1"></i> 15 mars 2025</span>
                                <a class='small text-vert-benin text-decoration-none' href='/blog'>Lire
                                    l'article →</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100 shadow-sm">
                        <img src="images/mag-local.jpg" class="card-img-top" alt="Karité">
                        <div class="card-body">
                            <span class="badge bg-vert-benin mb-2">Produits</span>
                            <h3 class="h5 card-title">Le Karité, or vert du Bénin</h3>
                            <p class="card-text text-muted small">Comment est transformé ce produit miracle de la
                                pharmacopée
                                africaine...</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="small text-muted"><i class="far fa-calendar me-1"></i> 28 fév. 2025</span>
                                <a class='small text-vert-benin text-decoration-none' href='/blog'>Lire
                                    l'article →</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 h-100 shadow-sm">
                        <img src="images/mag-local.jpg" class="card-img-top" alt="Sculpture">
                        <div class="card-body">
                            <span class="badge bg-vert-benin mb-2">Portrait</span>
                            <h3 class="h5 card-title">Koffi, sculpteur d'Abomey</h3>
                            <p class="card-text text-muted small">Rencontre avec un gardien des traditions royales
                                fon...</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="small text-muted"><i class="far fa-calendar me-1"></i> 10 fév. 2025</span>
                                <a class='small text-vert-benin text-decoration-none' href='/blog'>Lire
                                    l'article →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Newsletter -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-xl-10">
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                        <h2 class="h3 text-center mb-4">Rejoignez la communauté</h2>
                        <p class="text-center mb-4">Recevez des nouvelles de nos artisans et des produits créés dans
                            leurs ateliers.
                        </p>

                        <form id="newsletter-form">
                            <div class="row g-3">
                                <!-- Prénom -->
                                <div class="col-md-6">
                                    <label for="firstname" class="form-label small">Prénom</label>
                                    <input type="text" class="form-control rounded-3" id="firstname" required>
                                </div>

                                <!-- Nom (facultatif) -->
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label small">Nom (facultatif)</label>
                                    <input type="text" class="form-control rounded-3" id="lastname">
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <label for="email" class="form-label small">Adresse e-mail</label>
                                    <input type="email" class="form-control rounded-3" id="email" required>
                                </div>

                                <!-- Checkbox -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                        <label class="form-check-label small" for="terms">
                                            J'ai lu et j'accepte les conditions d'utilisation et la politique de
                                            confidentialité.
                                        </label>
                                    </div>
                                </div>

                                <!-- Bouton -->
                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-vert w-100 py-2 rounded-3">
                                        S'inscrire
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
