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

        <!-- Catégorie Textiles -->
        <section class="mb-5">
            <h2 class="h3 mb-4 text-vert-benin border-bottom pb-2">
                <i class="fas fa-tshirt me-2"></i>Textiles
            </h2>

            <!-- Sous-catégorie Vêtements traditionnels -->
            <div class="mb-4">
                <h3 class="h5 mb-3">Vêtements traditionnels</h3>
                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Boubou « Reine d'Abomey »</h3>
                                <p class="card-text text-success mb-1">18 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Boubou « Reine d'Abomey »</h3>
                                <p class="card-text text-success mb-1">18 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Boubou « Reine d'Abomey »</h3>
                                <p class="card-text text-success mb-1">18 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Boubou « Reine d'Abomey »</h3>
                                <p class="card-text text-success mb-1">18 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
            </div>

            <!-- Sous-catégorie Tissus wax -->
            <div class="mb-4">
                <h3 class="h5 mb-3">Tissus wax</h3>
                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Boubou « Reine d'Abomey »</h3>
                                <p class="card-text text-success mb-1">18 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Boubou « Reine d'Abomey »</h3>
                                <p class="card-text text-success mb-1">18 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Boubou « Reine d'Abomey »</h3>
                                <p class="card-text text-success mb-1">18 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Boubou « Reine d'Abomey »</h3>
                                <p class="card-text text-success mb-1">18 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
            </div>
        </section>


        <!-- ==================== CATÉGORIE BIJOUX ==================== -->
        <section class="mb-5">
            <h2 class="h3 mb-4 text-vert-benin border-bottom pb-2">
                <i class="far fa-gem me-2"></i>Bijoux & Accessoires
            </h2>

            <!-- Sous-catégorie Bijoux en perles -->
            <div class="mb-4">
                <h3 class="h5 mb-3">Bijoux en perles</h3>
                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Collier « Perles Yoruba »</h3>
                                <p class="card-text text-success mb-1">8 900 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Bracelet « Harmonie »</h3>
                                <p class="card-text text-success mb-1">6 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Collier « Perles Yoruba »</h3>
                                <p class="card-text text-success mb-1">8 900 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Bracelet « Harmonie »</h3>
                                <p class="card-text text-success mb-1">6 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
            </div>

            <!-- Sous-catégorie Chaussures artisanales -->
            <div class="mb-4">
                <h3 class="h5 mb-3">Chaussures artisanales</h3>
                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Sandales « Esprit nomade »</h3>
                                <p class="card-text text-success mb-1">14 200 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Mules « Reine Kpètè »</h3>
                                <p class="card-text text-success mb-1">16 800 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Sandales « Esprit nomade »</h3>
                                <p class="card-text text-success mb-1">14 200 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Mules « Reine Kpètè »</h3>
                                <p class="card-text text-success mb-1">16 800 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
            </div>
        </section>

        <!-- ==================== CATÉGORIE ART & DÉCORATION ==================== -->
        <section class="mb-5">
            <h2 class="h3 mb-4 text-vert-benin border-bottom pb-2">
                <i class="fas fa-palette me-2"></i>Art & Décoration
            </h2>

            <!-- Sous-catégorie Sculptures -->
            <div class="mb-4">
                <h3 class="h5 mb-3">Sculptures</h3>
                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Statuette « Guerrier Fon »</h3>
                                <p class="card-text text-success mb-1">29 750 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Masque « Esprit de la forêt »</h3>
                                <p class="card-text text-success mb-1">22 000 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Statuette « Guerrier Fon »</h3>
                                <p class="card-text text-success mb-1">29 750 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Masque « Esprit de la forêt »</h3>
                                <p class="card-text text-success mb-1">22 000 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
            </div>

            <!-- Sous-catégorie Objets décoratifs -->
            <div class="mb-4">
                <h3 class="h5 mb-3">Objets décoratifs</h3>
                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Vase « Terre rouge »</h3>
                                <p class="card-text text-success mb-1">15 300 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Plateau « Harmonie circulaire »</h3>
                                <p class="card-text text-success mb-1">12 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Vase « Terre rouge »</h3>
                                <p class="card-text text-success mb-1">15 300 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Plateau « Harmonie circulaire »</h3>
                                <p class="card-text text-success mb-1">12 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
            </div>
        </section>

        <!-- ==================== AUTRES CATÉGORIES ==================== -->
        <section class="mb-5">
            <h2 class="h3 mb-4 text-vert-benin border-bottom pb-2">
                <i class="fas fa-ellipsis-h me-2"></i>Autres catégories
            </h2>

            <!-- Sous-catégorie Produits naturels -->
            <div class="mb-4">
                <h3 class="h5 mb-3">Produits naturels</h3>
                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Savon au karité pur</h3>
                                <p class="card-text text-success mb-1">2 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Savon au karité pur</h3>
                                <p class="card-text text-success mb-1">2 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Savon au karité pur</h3>
                                <p class="card-text text-success mb-1">2 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Savon au karité pur</h3>
                                <p class="card-text text-success mb-1">2 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
            </div>

            <!-- Sous-catégorie Instruments de musique -->
            <div class="mb-4">
                <h3 class="h5 mb-3">Instruments de musique</h3>
                <div class="row g-4">
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Djembé « Rythme du Bénin »</h3>
                                <p class="card-text text-success mb-1">34 000 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Balafon traditionnel</h3>
                                <p class="card-text text-success mb-1">42 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-vert flex-grow-1">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Djembé « Rythme du Bénin »</h3>
                                <p class="card-text text-success mb-1">34 000 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
                    <div class="col-6 col-md-4 col-lg-3 product-item">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/test-picture-local.jpg" class="card-img-top rounded"
                                    alt="Boubou traditionnel">
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
                                    <span class="text-muted small">Vêtements</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.7</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Balafon traditionnel</h3>
                                <p class="card-text text-success mb-1">42 500 FCFA</p>
                                <div class="d-flex gap-2 mt-3">
                                    <button class="btn btn-sm btn-outline-secondary flex-grow-1 view-product">
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
            </div>
        </section>

        <!-- Répétez pour toutes les catégories et sous-catégories -->
    </div>
</main>
@endsection
