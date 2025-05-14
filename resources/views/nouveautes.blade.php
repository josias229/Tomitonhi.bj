@extends('layout.main')

@section('main-content')
    <main class="py-5">
        <div class="container">
            <!-- Hero avec animation -->
            <div class="bg-light rounded-4 p-4 p-md-5 mb-5 text-center">
                <span class="badge bg-vert-benin mb-3">NOUVEAUTÉ</span>
                <h1 class="display-6 mb-3">Nos dernières créations</h1>
                <p class="lead">Découvrez les pièces ajoutées cette semaine</p>
                <div class="d-flex justify-content-center">
                    <div class="mx-2">
                        <button class="btn btn-sm btn-outline-vert-benin active">Tout voir</button>
                    </div>
                    <div class="mx-2">
                        <button class="btn btn-sm btn-outline-vert-benin">Cette semaine</button>
                    </div>
                    <div class="mx-2">
                        <button class="btn btn-sm btn-outline-vert-benin">Aujourd'hui</button>
                    </div>
                </div>
            </div>

            <!-- Grille produits avec badges "Nouveau" -->
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card product-card h-100 border-0 bg-transparent">
                        <div class="position-relative">
                            <img src="images/Tomitonhi-Test.jpg" class="card-img-top rounded" alt="Produit">
                            <span
                                class="position-absolute top-0 start-0 bg-vert-benin text-white small p-1 px-2 m-2 rounded">Nouveau</span>
                            <span
                                class="position-absolute bottom-0 start-0 bg-white text-vert-benin small p-1 px-2 m-2 rounded">Ajouté
                                il y a 2 jours</span>
                        </div>
                        <!-- Contenu carte produit -->
                    </div>
                </div>
                <!-- Répéter pour autres produits -->
            </div>
        </div>
    </main>
@endsection
