@extends('layout.main')

@section('main-content')
    <main class="py-5">
        <div class="container">
            <!-- Barre de filtres avancés -->
            <div class="mb-5">
                <button class="btn btn-link p-0 d-flex align-items-center" data-bs-toggle="collapse"
                    data-bs-target="#advancedSearch">
                    <i class="fas fa-sliders-h me-2"></i> Options de recherche avancée
                </button>
                <div class="collapse mt-3" id="advancedSearch">
                    <div class="card card-body border-1 shadow-sm">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label small">Prix (FCFA)</label>
                                <div class="d-flex align-items-center">
                                    <input type="number" class="form-control form-control-sm" placeholder="Min">
                                    <span class="mx-2">-</span>
                                    <input type="number" class="form-control form-control-sm" placeholder="Max">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small">Note minimale</label>
                                <select class="form-select form-select-sm">
                                    <option>Toutes</option>
                                    <option>4 étoiles +</option>
                                    <option>3 étoiles +</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small">Tri</label>
                                <select class="form-select form-select-sm">
                                    <option>Pertinence</option>
                                    <option>Prix (croissant)</option>
                                    <option>Prix (décroissant)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($categories as $categorie)
                <section class="mb-5">
                    <h2 class="h3 mb-4 text-vert-benin border-bottom pb-2">
                        <i class="fas {{ $categorie->icone }} me-2"></i>{{ $categorie->nom }}
                    </h2>


                    @php
                        $produits = $categorie
                            ->produits()
                            ->where('est_actif', true)
                            ->orderBy('created_at', 'desc')
                            ->take(8)
                            ->get();
                    @endphp

                    @if ($produits->count() > 0)
                        <div class="row g-4">
                            @foreach ($produits as $produit)
                                <div class="col-6 col-md-4 col-lg-3 product-item">
                                    <div class="card product-card h-100 border-0 bg-transparent">
                                        <div class="position-relative">
                                            @if ($produit->photos->count() > 0)
                                                @if (str_contains($produit->photos->first()->url, 'https://'))
                                                    <img src="{{ $produit->photos->first()->url }}"
                                                        class="card-img-top rounded" alt="{{ $produit->nom }}">
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
                                                <span class="text-muted small">{{ $categorie->nom }}</span>
                                                <div class="rating small text-warning">
                                                    <i class="fas fa-star"></i>
                                                    <span class="text-dark">4.7</span>
                                                </div>
                                            </div>

                                            <h3 class="h6 card-title mb-1">{{ $produit->nom }}</h3>

                                            @if ($produit->prix_promo)
                                                <p class="card-text text-success mb-1">
                                                    <span
                                                        class="text-decoration-line-through text-muted small me-2">{{ number_format($produit->prix, 0, ',', ' ') }}
                                                        FCFA</span>
                                                    {{ number_format($produit->prix_promo, 0, ',', ' ') }} FCFA
                                                </p>
                                            @else
                                                <p class="card-text text-success mb-1">
                                                    {{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
                                            @endif

                                            <div class="d-flex gap-2 mt-3">
                                                {{-- <a href="{{ route('produits.show', $produit->slug) }}" 
                                                class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                                 <i class="fas fa-eye"></i>
                                             </a> --}}
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

                        @if ($categorie->produits()->count() > 8)
                            <div class="text-center mt-4">
                                <a href="{{ route('categories.show', $categorie->slug) }}" class="btn btn-outline-vert">
                                    Voir plus de {{ $categorie->nom }}
                                </a>
                            </div>
                        @endif
                        {{-- @else
                        <div class="alert alert-info">
                            Aucun produit disponible dans cette catégorie pour le moment.
                        </div> --}}
                    @endif
                </section>
            @endforeach
        </div>
    </main>



    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser le compteur du panier au chargement
            updateCartCounter();

            // Gestionnaire d'événement pour l'ajout au panier
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Vérification des données avant ajout
                    if (!this.dataset.id || !this.dataset.name) {
                        showToast('Erreur: Données du produit incomplètes', 'danger');
                        return;
                    }

                    const product = {
                        id: this.dataset.id,
                        name: this.dataset.name || 'Produit sans nom',
                        price: parseFloat(this.dataset.price) || 0,
                        image: this.dataset.image || 'https://via.placeholder.com/100',
                        artisan: this.dataset.artisan || 'Artisan non spécifié',
                        category: this.dataset.category || 'Catégorie non spécifiée',
                        quantity: 1
                    };

                    addToCart(product);
                });
            });

            // Fonction pour ajouter un produit au panier
            // Remplacer les deux fonctions par cette implémentation unique
            function addToCart(button) {
                // Récupérer toutes les données du produit avec des valeurs par défaut
                const product = {
                    id: button.dataset.id || Date.now().toString(),
                    name: button.dataset.name || 'Produit sans nom',
                    price: parseFloat(button.dataset.price) || 0,
                    image: button.dataset.image || 'https://picsum.photos/100/100',
                    artisan: button.dataset.artisan || 'Artisan inconnu',
                    category: button.dataset.category || 'Non catégorisé',
                    quantity: 1
                };

                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                const existingItem = cart.find(item => item.id === product.id);

                if (existingItem) {
                    existingItem.quantity += 1;
                } else {
                    cart.push(product);
                }

                localStorage.setItem('cart', JSON.stringify(cart));
                updateCartCounter();
                showToast(`${product.name} ajouté au panier`, 'success');
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
    </script> --}}


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
@endsection
