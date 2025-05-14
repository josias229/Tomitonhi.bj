@extends('layout.main')

@section('main-content')
    <!-- Après la navigation -->
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 mb-0">Votre panier</h2>
                        <span class="badge bg-vert-benin">3 articles</span>
                    </div>

                    <!-- Liste des articles -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2">
                                    <img src="images/test-picture-local.jpg" class="img-fluid rounded" alt="Produit">
                                </div>
                                <div class="col-6 col-md-5">
                                    <h3 class="h6 mb-1">Tissu Batik "Fleur du Bénin"</h3>
                                    <p class="small text-muted mb-1">Artisan : Adijatou la Tisserande</p>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-sm btn-outline-secondary p-1">
                                            <i class="fas fa-trash-alt small"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-vert-benin ms-2 p-1">
                                            <i class="far fa-heart small"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-3 col-md-2">
                                    <div class="input-group input-group-sm">
                                        <button class="btn btn-outline-secondary">-</button>
                                        <input type="text" class="form-control text-center" value="1">
                                        <button class="btn btn-outline-secondary">+</button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 text-md-end mt-2 mt-md-0">
                                    <p class="mb-0 fw-bold text-success">12 500 FCFA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Code similaire pour les autres articles -->

                    <div class="d-flex justify-content-between mt-4">
                        <a class='btn btn-outline-secondary' href='/'>
                            <i class="fas fa-arrow-left me-2"></i> Continuer mes achats
                        </a>
                        <button class="btn btn-vert" id="updateCart">
                            <i class="fas fa-sync-alt me-2"></i> Mettre à jour
                        </button>
                    </div>
                </div>

                <!-- Récapitulatif -->
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                        <div class="card-body">
                            <h3 class="h5 mb-3">Récapitulatif</h3>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Sous-total</span>
                                <span>37 500 FCFA</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Livraison</span>
                                <span>À calculer</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Taxes</span>
                                <span>Incluses</span>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between fw-bold mb-4">
                                <span>Total</span>
                                <span>37 500 FCFA</span>
                            </div>

                            <div class="mb-3">
                                <label for="promo" class="form-label small">Code promo</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="promo"
                                        placeholder="Entrez votre code">
                                    <button class="btn btn-vert">Appliquer</button>
                                </div>
                            </div>

                            <button class="btn btn-vert w-100 py-2 rounded-3">
                                Passer la commande <i class="fas fa-arrow-right ms-2"></i>
                            </button>

                            <div class="mt-3 small text-center text-muted">
                                <p>Livraison sécurisée et paiement 100% protégé</p>
                                <img src="assets/paiement-securise.svg" alt="Paiement sécurisé" width="120">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
