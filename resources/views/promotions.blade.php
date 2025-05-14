@extends('layout.main')

@section('main-content')

    <main class="py-5">
        <div class="container">
            <!-- Hero avec compte à rebours -->
            <div class="bg-light rounded-4 p-4 p-md-5 mb-5 text-center position-relative overflow-hidden">
                <span class="badge bg-danger mb-3">ÉVÉNEMENT</span>
                <h1 class="display-6 mb-3">Promotions exceptionnelles</h1>
                <p class="lead mb-4">Jusqu'à -60% sur nos meilleures pièces artisanales</p>

                <div class="d-flex justify-content-center mb-4">
                    <div class="mx-2 text-center">
                        <div class="bg-white rounded-3 p-2 fw-bold" style="width: 50px;">02</div>
                        <small class="text-muted">Jours</small>
                    </div>
                    <div class="mx-2 text-center">
                        <div class="bg-white rounded-3 p-2 fw-bold" style="width: 50px;">12</div>
                        <small class="text-muted">Heures</small>
                    </div>
                    <div class="mx-2 text-center">
                        <div class="bg-white rounded-3 p-2 fw-bold" style="width: 50px;">45</div>
                        <small class="text-muted">Minutes</small>
                    </div>
                </div>

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
                            <button type="button" class="btn btn-outline-secondary active">-50% et plus</button>
                            <button type="button" class="btn btn-outline-secondary">-30%</button>
                            <button type="button" class="btn btn-outline-secondary">Toutes</button>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/Tomitonhi-Test.jpg" class="card-img-top rounded" alt="Produit">
                                <span
                                    class="position-absolute top-0 start-0 bg-danger text-white small p-1 px-2 m-2 rounded">-60%</span>
                                <span
                                    class="position-absolute top-0 end-0 bg-vert-benin text-white small p-1 px-2 m-2 rounded">En
                                    stock</span>
                            </div>
                            <div class="card-body px-0 py-2">
                                <h3 class="h6 card-title mb-1">Statue "Reine Idia"</h3>
                                <p class="card-text text-success mb-1">
                                    <span class="text-decoration-line-through text-muted small me-1">45 000 FCFA</span>
                                    <strong>18 000 FCFA</strong>
                                </p>
                                <button class="btn btn-sm btn-danger w-100 mt-2">
                                    <i class="fas fa-bolt me-1"></i> Acheter maintenant
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Répéter pour autres produits -->
                </div>
            </section>
        </div>
    </main>
    
@endsection
