@extends('layout.main')

@section('main-content')
<main class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 mb-0">Votre panier</h2>
                    <span class="badge bg-vert-benin cart-badge" style="{{ count(session('cart', [])) > 0 ? 'display: flex;' : 'display: none;' }}">
                        {{ array_sum(array_column(session('cart', []), 'quantity')) }}
                    </span>
                </div>

                <!-- Liste des articles -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        @if(count(session('cart', [])) > 0)
                            @foreach(session('cart') as $id => $item)
                                <div class="row align-items-center mb-3">
                                    <div class="col-3 col-md-2">
                                        <img src="{{ $item['image'] }}" class="img-fluid rounded" alt="{{ $item['name'] }}">
                                    </div>
                                    <div class="col-6 col-md-5">
                                        <h3 class="h6 mb-1">{{ $item['name'] }}</h3>
                                        <p class="small text-muted mb-1">Artisan: {{ $item['artisan'] }}</p>
                                        {{-- <p class="small text-muted mb-1">Artisan: {{ $item['artisan_name'] }}</p> --}}
                                        <p class="small text-muted mb-1">Catégorie: {{ $item['category'] }}</p>
                                        <div class="d-flex align-items-center">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-secondary p-1">
                                                    <i class="fas fa-trash-alt small"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-3 col-md-2">
                                        <form action="{{ route('cart.update', $id) }}" method="POST">
                                            @csrf
                                            <div class="input-group input-group-sm">
                                                <button class="btn btn-outline-secondary" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                                                <input type="number" class="form-control text-center" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                                <button class="btn btn-outline-secondary" type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-link p-0 mt-1">Mettre à jour</button>
                                        </form>
                                    </div>
                                    <div class="col-12 col-md-3 text-md-end mt-2 mt-md-0">
                                        <p class="mb-0 fw-bold text-success">{{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} FCFA</p>
                                        <p class="small text-muted mb-0">{{ number_format($item['price'], 0, ',', ' ') }} FCFA l'unité</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-4">
                                <i class="fas fa-shopping-cart fa-3x mb-3 text-muted"></i>
                                <h4 class="h5">Votre panier est vide</h4>
                                <a href="/" class="btn btn-vert mt-3">Commencer vos achats</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a class='btn btn-outline-secondary' href='/'>
                        <i class="fas fa-arrow-left me-2"></i> Continuer mes achats
                    </a>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-vert">
                            <i class="fas fa-trash-alt me-2"></i> Vider le panier
                        </button>
                    </form>
                </div>
            </div>

            <!-- Récapitulatif -->
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Récapitulatif</h3>

                        @php
                            $subtotal = 0;
                            $cart = session('cart', []);
                            foreach($cart as $item) {
                                $subtotal += $item['price'] * $item['quantity'];
                            }
                            $delivery = max($subtotal * 0.1, 2000);
                            $taxes = $subtotal * 0.18;
                            $total = $subtotal + $delivery + $taxes;
                        @endphp

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Sous-total</span>
                            <span>{{ number_format($subtotal, 0, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Livraison</span>
                            <span>{{ number_format($delivery, 0, ',', ' ') }} FCFA</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Taxes</span>
                            <span>{{ number_format($taxes, 0, ',', ' ') }} FCFA</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold mb-4">
                            <span>Total</span>
                            <span>{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                        </div>

                        <div class="mb-3">
                            <label for="promo" class="form-label small">Code promo</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="promo" placeholder="Entrez votre code">
                                <button class="btn btn-vert" id="apply-promo">Appliquer</button>
                            </div>
                        </div>

                        <a href="{{ route('checkout') }}" class="btn btn-vert w-100 py-2 rounded-3">
                            Passer la commande <i class="fas fa-arrow-right ms-2"></i>
                        </a>

                        <div class="mt-3 small text-center text-muted">
                            <p>Livraison sécurisée et paiement 100% protégé</p>
                            <img src="{{ asset('assets/paiement-securise.svg') }}" alt="Paiement sécurisé" width="120">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection