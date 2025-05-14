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
                        <img src="images/test-picture-local.jpg" class="profile-main-image" alt="Portrait Adijatou">
                        
                        <!-- Badge réseaux sociaux flottant -->
                        <div class="social-badge">
                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    
                    <!-- Contenu texte aligné à droite -->
                    <div class="profile-content">
                        <h5 class="profile-name">Adijatou</h5>
                        
                        <div class="rating-badge">
                            <span class="stars">★★★★★</span>
                            <span class="rating-text">4.8/5 (42 avis)</span>
                        </div>
                        
                        <div class="profile-actions">
                            <button class="btn-follow">
                                <i class="fas fa-plus"></i> Suivre
                            </button>
                            <button class="btn-message">
                                <i class="fas fa-envelope"></i> Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h1 class="h2 mb-3">Adijatou la Tisserande</h1>
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-map-marker-alt text-muted me-2"></i>
                    <span>Cotonou, Bénin</span>
                    <span class="mx-2">•</span>
                    <span>Membre depuis 2018</span>
                </div>
                <p class="lead">Artisane passionnée spécialisée dans la création de textiles traditionnels béninois.
                    Chaque pièce est tissée à la main avec des techniques ancestrales transmises de génération en
                    génération.</p>
            </div>
        </div>

        <!-- Onglets -->
        <ul class="nav nav-tabs mb-4" id="artisanTabs">
            <li class="nav-item">
                <a class="nav-link active" href="#produits">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#histoire">Mon histoire</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#avis">Avis (42)</a>
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
                    <!-- Produit 1 -->
                    <div class="col-6 col-md-4 col-lg-3">
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
                                    <span class="text-muted small">Textile</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.5</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Tissu Batik "Fleur d'Afrique"</h3>
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

                    <!-- Produit 2 -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card product-card h-100 border-0 bg-transparent">
                            <div class="position-relative">
                                <img src="images/Tomitonhi-Test.jpg" class="card-img-top rounded"
                                    alt="Pagne Traditionnel">
                                <button
                                    class="btn btn-sm btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm">
                                    <i class="far fa-heart"></i>
                                </button>
                                <span
                                    class="position-absolute top-0 start-0 bg-warning text-white small p-1 px-2 m-2 rounded">Derniers
                                    articles</span>
                            </div>
                            <div class="card-body px-0 py-2">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted small">Vêtement</span>
                                    <div class="rating small text-warning">
                                        <i class="fas fa-star"></i>
                                        <span class="text-dark">4.8</span>
                                    </div>
                                </div>
                                <h3 class="h6 card-title mb-1">Pagne "Femme Adja"</h3>
                                <p class="card-text text-success mb-1">15 000 FCFA</p>
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
                </div>
            </div>

            <!-- Onglet Histoire -->
            <div class="tab-pane fade" id="histoire">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="h5">Mon parcours d'artisane</h3>
                        <p>Née dans une famille de tisserands à Savalou, j'ai appris l'art du tissage dès mon plus
                            jeune âge. Ma grand-mère m'a transmis les techniques traditionnelles de teinture
                            naturelle et de création de motifs symboliques.</p>

                        <p>Aujourd'hui installée à Cotonou, je perpétue ce savoir-faire ancestral tout en innovant
                            avec des designs contemporains. Chaque pièce que je crée raconte une histoire et
                            préserve notre patrimoine culturel.</p>

                        <img src="images/test-picture-local.jpg" class="img-fluid rounded mt-3" alt="Mon atelier">
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="h6">Techniques et engagements</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check text-vert-benin me-2"></i> Teinture
                                        végétale naturelle</li>
                                    <li class="mb-2"><i class="fas fa-check text-vert-benin me-2"></i> Tissage à la
                                        main sur métier traditionnel</li>
                                    <li class="mb-2"><i class="fas fa-check text-vert-benin me-2"></i> Coton 100%
                                        biologique local</li>
                                    <li class="mb-2"><i class="fas fa-check text-vert-benin me-2"></i> Processus de
                                        fabrication écoresponsable</li>
                                </ul>
                                <div class="mt-3">
                                    <button class="btn btn-sm btn-outline-vert-benin">
                                        <i class="fas fa-envelope me-1"></i> Contacter l'artisan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Onglet Avis -->
            <div class="tab-pane fade" id="avis">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center">
                                <h3 class="h1 text-vert-benin mb-0">4.8</h3>
                                <div class="rating text-warning mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <p class="small text-muted">Moyenne sur 42 avis</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Avis 1 -->
                        <div class="card mb-3 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="h6 mb-0">Marie K.</h5>
                                    <small class="text-muted">15 mars 2023</small>
                                </div>
                                <div class="rating text-warning small mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="mb-0">Le tissu est encore plus beau en vrai que sur les photos. La qualité
                                    est exceptionnelle et les couleurs sont magnifiques. Je recommande vivement
                                    cette artisane talentueuse !</p>
                            </div>
                        </div>

                        <!-- Avis 2 -->
                        <div class="card mb-3 border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="h6 mb-0">Jean-Paul D.</h5>
                                    <small class="text-muted">28 février 2023</small>
                                </div>
                                <div class="rating text-warning small mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p class="mb-0">Très belle qualité de tissu, authentique et résistant. Le délai de
                                    livraison était un peu long mais le produit en vaut vraiment la peine. Service
                                    client réactif.</p>
                            </div>
                        </div>

                        <button class="btn btn-outline-vert-benin mt-3">
                            <i class="fas fa-plus me-1"></i> Voir plus d'avis
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
