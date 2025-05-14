@extends('layout.main')

@section('main-content')

<main class="py-5">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0">Votre liste de souhaits</h2>
            <span class="badge bg-vert-benin">5 articles</span>
        </div>

        <div class="row g-4">
            <!-- Article 1 -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card product-card h-100 border-0 bg-transparent">
                    <div class="position-relative">
                        <img src="images/test-picture-local.jpg" class="card-img-top rounded" alt="Produit">
                        <button
                            class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="card-body px-0 py-2">
                        <h3 class="h6 card-title mb-1">Tissu Batik "Fleur du Bénin"</h3>
                        <p class="card-text text-success mb-1">12 500 FCFA</p>
                        <div class="d-flex gap-2 mt-3">
                            <button class="btn btn-sm btn-outline-secondary flex-grow-1">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-vert flex-grow-1">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Répéter pour autres articles -->
        </div>

        <div class="text-center mt-5">
            <a class='btn btn-outline-vert-benin' href='/'>
                <i class="fas fa-arrow-left me-2"></i> Continuer vos achats
            </a>
        </div>
    </div>
</main>
    
@endsection
