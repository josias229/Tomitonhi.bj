@extends('layout.main')

@section('main-content')
<main class="py-5">
    <div class="container">
        <!-- En-tête -->
        <div class="text-center mb-5">
            <h1 class="h2 mb-3">Le Mag' Artisanal</h1>
            <p class="lead">Découvrez l'univers des artisans béninois et leurs savoir-faire</p>
        </div>

        <!-- Catégories -->
        <div class="mb-5">
            <ul class="nav nav-pills justify-content-center flex-wrap">
                <li class="nav-item mx-1 mb-2">
                    <a class="nav-link active" href="#">Tous</a>
                </li>
                <li class="nav-item mx-1 mb-2">
                    <a class="nav-link" href="#">Savoir-faire</a>
                </li>
                <li class="nav-item mx-1 mb-2">
                    <a class="nav-link" href="#">Portraits</a>
                </li>
                <li class="nav-item mx-1 mb-2">
                    <a class="nav-link" href="#">Événements</a>
                </li>
                <li class="nav-item mx-1 mb-2">
                    <a class="nav-link" href="#">Conseils</a>
                </li>
            </ul>
        </div>

        <!-- Articles en vedette -->
        <div class="mb-5">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="images/mag-local.jpg" class="img-fluid h-100 object-fit-cover"
                            alt="Artisanat">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body p-4 p-lg-5">
                            <span class="badge bg-vert-benin mb-2">Savoir-faire</span>
                            <h2 class="h3 mb-3">Les secrets du tissage traditionnel au Bénin</h2>
                            <p class="mb-4">Plongez dans l'univers des tisserands de Savalou et découvrez comment
                                sont créés ces tissus uniques qui racontent l'histoire de tout un peuple.</p>
                            <div class="d-flex align-items-center">
                                <img src="images/test-picture-local.jpg" class="rounded-circle me-2" width="32" alt="Auteur">
                                <span class="small me-3">Par Adijatou Z.</span>
                                <span class="small text-muted"><i class="far fa-clock me-1"></i> 15 mars 2023</span>
                            </div>
                            <a href="article-tissage.html" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des articles -->
        <div class="row g-4">
            <!-- Article 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 h-100 shadow-sm">
                    <img src="images/test-picture-local.jpg" class="card-img-top" alt="Art Batik">
                    <div class="card-body">
                        <span class="badge bg-vert-benin mb-2">Savoir-faire</span>
                        <h3 class="h5 card-title">L'art du Batik au Bénin</h3>
                        <p class="card-text text-muted small">Technique ancestrale de teinture qui continue de
                            fasciner...</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="small text-muted"><i class="far fa-calendar me-1"></i> 10 mars 2023</span>
                            <a href="article-batik.html" class="small text-vert-benin">Lire →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 h-100 shadow-sm">
                    <img src="images/test-picture-local.jpg" class="card-img-top" alt="Artisan">
                    <div class="card-body">
                        <span class="badge bg-vert-benin mb-2">Portrait</span>
                        <h3 class="h5 card-title">Koffi, sculpteur d'Abomey</h3>
                        <p class="card-text text-muted small">Rencontre avec un gardien des traditions royales
                            fon...</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="small text-muted"><i class="far fa-calendar me-1"></i> 28 fév. 2023</span>
                            <a href="article-sculpteur.html" class="small text-vert-benin">Lire →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 h-100 shadow-sm">
                    <img src="images/test-picture-local.jpg" class="card-img-top" alt="Événement">
                    <div class="card-body">
                        <span class="badge bg-vert-benin mb-2">Événement</span>
                        <h3 class="h5 card-title">Marché artisanal de Ouidah</h3>
                        <p class="card-text text-muted small">Notre sélection des meilleures créations à ne pas
                            manquer...</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="small text-muted"><i class="far fa-calendar me-1"></i> 15 fév. 2023</span>
                            <a href="article-marche.html" class="small text-vert-benin">Lire →</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="col-12 mt-5">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Précédent</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Suivant</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</main>
@endsection
