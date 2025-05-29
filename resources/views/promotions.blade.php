@extends('layout.main')

@section('main-content')

<main class="py-5">
    <div class="container">
        <!-- Hero avec compte à rebours -->
        <div class="bg-light rounded-4 p-4 p-md-5 mb-5 text-center position-relative overflow-hidden">
            <span class="badge bg-danger mb-3">ÉVÉNEMENT</span>
            <h1 class="display-6 mb-3">Promotions exceptionnelles</h1>
            <p class="lead mb-4">Jusqu'à -@if($produitsEnPromo->isNotEmpty()) {{ round((($produitsEnPromo->first()->prix - $produitsEnPromo->first()->prix_promo) / $produitsEnPromo->first()->prix) * 100) }}% @else 60% @endif sur nos meilleures pièces artisanales</p>

            <!-- Compte à rebours dynamique basé sur la promotion qui se termine le plus tôt -->
            @if($produitsEnPromo->isNotEmpty())
                @php
                    $finPromoLaPlusProche = $produitsEnPromo->sortBy('fin_promo')->first()->fin_promo;
                    $diff = now()->diff($finPromoLaPlusProche);
                @endphp
                <div class="d-flex justify-content-center mb-4">
                    <div class="mx-2 text-center">
                        <div class="bg-white rounded-3 p-2 fw-bold" style="width: 50px;">{{ str_pad($diff->d, 2, '0', STR_PAD_LEFT) }}</div>
                        <small class="text-muted">Jours</small>
                    </div>
                    <div class="mx-2 text-center">
                        <div class="bg-white rounded-3 p-2 fw-bold" style="width: 50px;">{{ str_pad($diff->h, 2, '0', STR_PAD_LEFT) }}</div>
                        <small class="text-muted">Heures</small>
                    </div>
                    <div class="mx-2 text-center">
                        <div class="bg-white rounded-3 p-2 fw-bold" style="width: 50px;">{{ str_pad($diff->i, 2, '0', STR_PAD_LEFT) }}</div>
                        <small class="text-muted">Minutes</small>
                    </div>
                </div>
            @endif

            <a href="#promotions" class="btn btn-vert-benin px-4 rounded-pill">
                Voir les offres <i class="fas fa-arrow-down ms-2"></i>
            </a>
        </div>

        <!-- Produits en promotion -->
        <section id="promotions">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3 mb-0">Nos promotions</h2>
                <div class="d-flex">
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="?filter=50" class="btn btn-outline-secondary {{ request('filter') == '50' || !request()->has('filter') ? 'active' : '' }}">-50% et plus</a>
                        <a href="?filter=30" class="btn btn-outline-secondary {{ request('filter') == '30' ? 'active' : '' }}">-30%</a>
                        <a href="?filter=all" class="btn btn-outline-secondary {{ request('filter') == 'all' ? 'active' : '' }}">Toutes</a>
                    </div>
                </div>
            </div>

            @if($produitsEnPromo->isEmpty())
                <div class="alert alert-info">
                    Aucune promotion en cours pour le moment. Revenez plus tard !
                </div>
            @else
                <div class="row g-4">
                    @foreach($produitsEnPromo as $produit)
                        @php
                            $pourcentagePromo = round((($produit->prix - $produit->prix_promo) / $produit->prix) * 100);
                            $stockStatus = $produit->stock > 0 ? 'En stock' : 'Rupture';
                            $stockClass = $produit->stock > 0 ? 'bg-vert-benin' : 'bg-secondary';
                        @endphp
                        
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card product-card h-100 border-0 bg-transparent">
                                <div class="position-relative">
                                    @if($produit->photos->first())
                                        <img src="{{ Storage::url($produit->photos->first()->url) }}" class="card-img-top rounded" alt="{{ $produit->nom }}">
                                    @else
                                        <img src="{{ asset('images/placeholder-product.jpg') }}" class="card-img-top rounded" alt="Image non disponible">
                                    @endif
                                    
                                    <span class="position-absolute top-0 start-0 bg-danger text-white small p-1 px-2 m-2 rounded">
                                        -{{ $pourcentagePromo }}%
                                    </span>
                                    <span class="position-absolute top-0 end-0 {{ $stockClass }} text-white small p-1 px-2 m-2 rounded">
                                        {{ $stockStatus }}
                                    </span>
                                </div>
                                <div class="card-body px-0 py-2">
                                    <h3 class="h6 card-title mb-1">{{ $produit->nom }}</h3>
                                    <p class="card-text text-success mb-1">
                                        <span class="text-decoration-line-through text-muted small me-1">{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</span>
                                        <strong>{{ number_format($produit->prix_promo, 0, ',', ' ') }} FCFA</strong>
                                    </p>
                                    <button class="btn btn-sm btn-vert flex-grow-1 add-to-cart"
                                    data-id="{{ $produit->id }}"
                                    data-artisan="{{ $produit->artisan->user->name }}"
                                    data-category="{{ $produit->categorie->nom }}"
                                    data-price="{{ $produit->prix_promo ? $produit->prix_promo : $produit->prix }}"
                                    data-image="{{ $produit->photos->count() > 0 ? asset('storage/' . $produit->photos->first()->url) : asset('images/placeholder-product.jpg') }}">
                                    <i class="fas fa-cart-plus"></i> Ajouter
                                </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $produitsEnPromo->links() }}
                </div>
            @endif
        </section>
    </div>
</main>
    {{-- @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        // Initialiser le compteur du panier au chargement
        updateCartCounter();
    
        // Gestionnaire d'événement pour l'ajout au panier
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Récupérer les données du produit
                const product = {
                    id: this.dataset.id || Date.now().toString(), // ID unique si non fourni
                    name: this.dataset.name || 'Produit sans nom',
                    price: parseFloat(this.dataset.price) || 0,
                    image: this.dataset.image || '',
                    quantity: 1
                };
    
                addToCart(product);
                updateCartCounter();
                showAddToCartAlert(product.name);
                animateAddToCart(this);
            });
        });
    
        // Fonction pour ajouter un produit au panier
        function addToCart(product) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingItem = cart.find(item => item.id === product.id);
    
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push(product);
            }
    
            localStorage.setItem('cart', JSON.stringify(cart));
        }
    
        // Fonction pour mettre à jour le compteur du panier
        function updateCartCounter() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    
            // Mettre à jour tous les badges du panier dans la page
            document.querySelectorAll('.cart-badge').forEach(badge => {
                badge.textContent = totalItems;
                badge.style.display = totalItems > 0 ? 'flex' : 'none';
                
                // Animation du badge
                badge.classList.add('animate-bounce');
                setTimeout(() => {
                    badge.classList.remove('animate-bounce');
                }, 300);
            });
        }
    
        // Fonction pour afficher une notification
        function showAddToCartAlert(productName) {
            // Créer la notification toast
            const toast = document.createElement('div');
            toast.className = 'toast align-items-center text-white bg-success border-0 show';
            toast.style.position = 'fixed';
            toast.style.bottom = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
    
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="fas fa-check-circle me-2"></i>
                        ${productName} ajouté au panier
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            `;
    
            document.body.appendChild(toast);
    
            // Supprimer la notification après 3 secondes
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }
    
        // Animation lors de l'ajout au panier
        function animateAddToCart(button) {
            // Animation du bouton
            button.classList.add('animate-pulse');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-check"></i> Ajouté';
    
            setTimeout(() => {
                button.classList.remove('animate-pulse');
                button.innerHTML = originalText;
            }, 2000);
    
            // Animation de l'icône
            const icon = button.querySelector('i');
            if (icon) {
                icon.classList.add('animate-bounce');
                setTimeout(() => {
                    icon.classList.remove('animate-bounce');
                }, 300);
            }
        }
    });
    </script>
    @endpush --}}
@endsection
