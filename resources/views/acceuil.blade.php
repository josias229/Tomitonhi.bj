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
                                <a href="#" class="btn btn-warning rounded-pill px-4 text-white">Voir la collection</a>
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
                <div class="mt-3 mt-md-0">
                    <ul class="nav nav-pills" id="product-filters">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-filter="all">Tous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-filter="textiles">Textiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-filter="sculptures">Sculptures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-filter="bijoux">Bijoux</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Grille de produits -->
            <div class="row g-4" id="products-grid">
                <!-- Produit 1 -->
                <div class="col-6 col-md-4 col-lg-3 product-item" data-category="textiles">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/Tomitonhi-Test.jpg" class="card-img-top rounded" alt="Tissu Batik">
                            <button
                                class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                <i class="far fa-heart"></i>
                            </button>
                            <span
                                class="position-absolute top-0 start-0 bg-success text-white small p-1 px-2 m-2 rounded">En
                                stock</span>
                        </div>
                        <div class="card-body px-0 py-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Textiles</span>
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark">4.8</span>
                                </div>
                            </div>
                            <h3 class="h6 card-title mb-1">Tissu Batik "Fleur du Bénin"</h3>
                            <p class="card-text text-success mb-1">12 500 FCFA</p>
                            <div class="d-flex gap-2 mt-3">
                                <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product"
                                    data-bs-toggle="modal" data-bs-target="#productModal"
                                    data-title="Tissu Batik 'Fleur du Bénin'" data-price="12500"
                                    data-category="Textiles" data-rating="4.8" data-image="images/lapin1.jpg"
                                    data-description="Tissu traditionnel béninois fabriqué à la main selon la technique ancestrale du batik. 100% coton bio."
                                    data-artisan="Adijatou la Tisserande">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-vert flex-grow-1">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produit 2 -->
                <div class="col-6 col-md-4 col-lg-3 product-item" data-category="sculptures">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/Tomitonhi-Test.jpg" class="card-img-top rounded" alt="Sculpture">
                            <button
                                class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                <i class="far fa-heart"></i>
                            </button>
                            <span
                                class="position-absolute top-0 start-0 bg-danger text-white small p-1 px-2 m-2 rounded">-15%</span>
                        </div>
                        <div class="card-body px-0 py-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Sculpture</span>
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark">4.9</span>
                                </div>
                            </div>
                            <h3 class="h6 card-title mb-1">Statuette "Génie protecteur"</h3>
                            <p class="card-text text-success mb-1">
                                <span class="text-decoration-line-through text-muted small me-1">35 000 FCFA</span>
                                29 750 FCFA
                            </p>
                            <div class="d-flex gap-2 mt-3">
                                <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product"
                                    data-bs-toggle="modal" data-bs-target="#productModal"
                                    data-title="Statuette 'Génie protecteur'" data-price="29750"
                                    data-original-price="35000" data-category="Sculptures" data-rating="4.9"
                                    data-image="images/lapin1.jpg"
                                    data-description="Sculpture en bois d'ébène réalisée par Koffi, maître sculpteur d'Abomey. Pièce unique inspirée des légendes fon."
                                    data-artisan="Koffi le Sculpteur">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-vert flex-grow-1">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produit 3 -->
                <div class="col-6 col-md-4 col-lg-3 product-item" data-category="textiles">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/Tomitonhi-Test.jpg" class="card-img-top rounded" alt="Tissu Batik">
                            <button
                                class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                <i class="far fa-heart"></i>
                            </button>
                            <span
                                class="position-absolute top-0 start-0 bg-success text-white small p-1 px-2 m-2 rounded">En
                                stock</span>
                        </div>
                        <div class="card-body px-0 py-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Textiles</span>
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark">4.8</span>
                                </div>
                            </div>
                            <h3 class="h6 card-title mb-1">Tissu Batik "Fleur du Bénin"</h3>
                            <p class="card-text text-success mb-1">12 500 FCFA</p>
                            <div class="d-flex gap-2 mt-3">
                                <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product"
                                    data-bs-toggle="modal" data-bs-target="#productModal"
                                    data-title="Tissu Batik 'Fleur du Bénin'" data-price="12500"
                                    data-category="Textiles" data-rating="4.8" data-image="images/lapin1.jpg"
                                    data-description="Tissu traditionnel béninois fabriqué à la main selon la technique ancestrale du batik. 100% coton bio."
                                    data-artisan="Adijatou la Tisserande">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-vert flex-grow-1">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Produit 4 -->
                <div class="col-6 col-md-4 col-lg-3 product-item" data-category="bijoux">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/Tomitonhi-Test.jpg" class="card-img-top rounded" alt="Sculpture">
                            <button
                                class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                <i class="far fa-heart"></i>
                            </button>
                            <span
                                class="position-absolute top-0 start-0 bg-danger text-white small p-1 px-2 m-2 rounded">-15%</span>
                        </div>
                        <div class="card-body px-0 py-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Sculpture</span>
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark">4.9</span>
                                </div>
                            </div>
                            <h3 class="h6 card-title mb-1">Statuette "Génie protecteur"</h3>
                            <p class="card-text text-success mb-1">
                                <span class="text-decoration-line-through text-muted small me-1">35 000 FCFA</span>
                                29 750 FCFA
                            </p>
                            <div class="d-flex gap-2 mt-3">
                                <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product"
                                    data-bs-toggle="modal" data-bs-target="#productModal"
                                    data-title="Statuette 'Génie protecteur'" data-price="29750"
                                    data-original-price="35000" data-category="Sculptures" data-rating="4.9"
                                    data-image="images/lapin1.jpg"
                                    data-description="Sculpture en bois d'ébène réalisée par Koffi, maître sculpteur d'Abomey. Pièce unique inspirée des légendes fon."
                                    data-artisan="Koffi le Sculpteur">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-vert flex-grow-1">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <p class="mb-0">Des créations uniques directement des mains talentueuses de nos artisans béninois
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="#" class="btn btn-outline-vert-benin">Voir tous les artisans →</a>
                </div>
            </div>

            <!-- Cartes Artisans -->
            <div class="row g-4">
                <!-- Artisan 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="images/artisan-local.jpeg" class="card-img-top" alt="Artisan">
                            <span
                                class="position-absolute top-0 end-0 bg-vert-benin text-white small p-2">Cotonou</span>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 card-title">Adijatou la Tisserande</h3>
                            <p class="card-text small text-muted">Spécialiste des tissus traditionnels en coton bio
                                depuis 15 ans</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-dark ms-1">(42)</span>
                                </div>
                                <a class='btn btn-sm btn-vert' href='/artisans-details'>Voir boutique</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="images/artisan-local.jpeg" class="card-img-top" alt="Sculpteur">
                            <span class="position-absolute top-0 end-0 bg-vert-benin text-white small p-2">Abomey</span>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 card-title">Koffi le Sculpteur</h3>
                            <p class="card-text small text-muted">Maître sculpteur sur bois, héritier d'une tradition
                                familiale</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span class="text-dark ms-1">(36)</span>
                                </div>
                                <a class='btn btn-sm btn-vert' href='/artisans-details'>Voir boutique</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="images/artisan-local.jpeg" class="card-img-top" alt="Savonnière">
                            <span class="position-absolute top-0 end-0 bg-vert-benin text-white small p-2">Ouidah</span>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 card-title">Mariam la Savonnière</h3>
                            <p class="card-text small text-muted">Savons naturels à base de karité et plantes locales
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark ms-1">(58)</span>
                                </div>
                                <a class='btn btn-sm btn-vert' href='/artisans-details'>Voir boutique</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="images/artisan-local.jpeg" class="card-img-top" alt="Joaillier">
                            <span
                                class="position-absolute top-0 end-0 bg-vert-benin text-white small p-2">Porto-Novo</span>
                        </div>
                        <div class="card-body">
                            <h3 class="h5 card-title">Yves le Joaillier</h3>
                            <p class="card-text small text-muted">Créations uniques en argent et pierres locales</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-dark ms-1">(29)</span>
                                </div>
                                <a class='btn btn-sm btn-vert' href='/artisans-details'>Voir boutique</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Produits Tendances -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h3">Produits tendances cette semaine</h2>
                <a href="#" class="btn btn-outline-vert-benin">Explorer plus →</a>
            </div>

            <div class="row g-4">
                <!-- Produit 1 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/test-picture-local.jpg" class="card-img-top rounded" alt="Tissu Batik">
                            <button
                                class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        <div class="card-body px-0 py-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Textiles</span>
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark">4.8</span>
                                </div>
                            </div>
                            <h3 class="h6 card-title mb-1">Tissu Batik "Fleur du Bénin"</h3>
                            <p class="card-text text-success mb-1">12 500 FCFA</p>
                            <button class="btn btn-sm btn-vert w-100 mt-2">
                                <i class="fas fa-cart-plus me-1"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Produit 2 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/test-picture-local.jpg" class="card-img-top rounded" alt="Sculpture">
                            <button
                                class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                <i class="far fa-heart"></i>
                            </button>
                            <span
                                class="position-absolute top-0 start-0 bg-success text-white small p-1 px-2 m-2 rounded">-15%</span>
                        </div>
                        <div class="card-body px-0 py-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Sculpture</span>
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark">4.9</span>
                                </div>
                            </div>
                            <h3 class="h6 card-title mb-1">Statuette "Génie protecteur"</h3>
                            <p class="card-text text-success mb-1">
                                <span class="text-decoration-line-through text-muted small me-1">35 000 FCFA</span>
                                29 750 FCFA
                            </p>
                            <button class="btn btn-sm btn-vert w-100 mt-2">
                                <i class="fas fa-cart-plus me-1"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Produit 3 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/test-picture-local.jpg" class="card-img-top rounded" alt="Collier">
                            <button
                                class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                <i class="far fa-heart"></i>
                            </button>
                            <span
                                class="position-absolute top-0 start-0 bg-danger text-white small p-1 px-2 m-2 rounded">Nouveau</span>
                        </div>
                        <div class="card-body px-0 py-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Bijoux</span>
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark">4.7</span>
                                </div>
                            </div>
                            <h3 class="h6 card-title mb-1">Collier en perles de terre cuite</h3>
                            <p class="card-text text-success mb-1">8 900 FCFA</p>
                            <button class="btn btn-sm btn-vert w-100 mt-2">
                                <i class="fas fa-cart-plus me-1"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Produit 4 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/test-picture-local.jpg" class="card-img-top rounded" alt="Panier">
                            <button
                                class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        <div class="card-body px-0 py-2">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Vannerie</span>
                                <div class="rating small text-warning">
                                    <i class="fas fa-star"></i>
                                    <span class="text-dark">4.5</span>
                                </div>
                            </div>
                            <h3 class="h6 card-title mb-1">Panier tressé "Femme Adja"</h3>
                            <p class="card-text text-success mb-1">6 500 FCFA</p>
                            <button class="btn btn-sm btn-vert w-100 mt-2">
                                <i class="fas fa-cart-plus me-1"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>
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
