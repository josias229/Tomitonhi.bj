@extends('layout.legal')

@section('legal-content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- En-tête avec bouton retour -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <a class='btn btn-outline-secondary btn-sm' href='/'>
                            <i class="fas fa-arrow-left me-2"></i> Retour
                        </a>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='/'>Accueil</a></li>
                                <li class="breadcrumb-item active">Conditions générales</li>
                            </ol>
                        </nav>
                    </div>

                    <!-- Carte principale -->
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                        <div class="card-header bg-vert-benin text-white py-3">
                            <h1 class="h4 mb-0">Conditions Générales d'Utilisation</h1>
                            <p class="small mb-0 opacity-75">Dernière mise à jour : 15 juin 2023</p>
                        </div>

                        <div class="card-body p-0">
                            <!-- Sommaire ancré -->
                            <div class="sticky-top bg-light" style="top: 70px; z-index: 10;">
                                <div class="container py-2 border-bottom">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <span class="me-3 small fw-bold">Sommaire :</span>
                                        <div class="d-flex flex-wrap">
                                            <a href="#article1"
                                                class="btn btn-sm btn-outline-secondary rounded-pill me-2 mb-2">1.
                                                Objet</a>
                                            <a href="#article2"
                                                class="btn btn-sm btn-outline-secondary rounded-pill me-2 mb-2">2.
                                                Compte</a>
                                            <a href="#article3"
                                                class="btn btn-sm btn-outline-secondary rounded-pill me-2 mb-2">3.
                                                Commandes</a>
                                            <!-- Autres articles -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contenu des CGU -->
                            <div class="p-4 p-md-5">
                                <article id="article1" class="mb-5">
                                    <h2 class="h5 mb-3 text-vert-benin">1. Objet</h2>
                                    <p>Les présentes conditions générales ont pour objet de définir les modalités de
                                        mise à disposition des services de la plateforme Tomitɔnhi et leurs conditions
                                        d'utilisation par l'Utilisateur.</p>
                                    <p>Toute utilisation du site implique l'acceptation sans réserve des présentes
                                        conditions générales.</p>
                                </article>

                                <article id="article2" class="mb-5">
                                    <h2 class="h5 mb-3 text-vert-benin">2. Création de compte</h2>
                                    <p>Pour accéder à certaines fonctionnalités, l'Utilisateur doit créer un compte en
                                        fournissant des informations exactes, complètes et à jour.</p>
                                    <div class="alert alert-light mt-3">
                                        <i class="fas fa-info-circle text-vert-benin me-2"></i>
                                        <strong>Important :</strong> Vous devez avoir au moins 18 ans pour créer un
                                        compte acheteur ou artisan.
                                    </div>
                                </article>

                                <article id="article3" class="mb-5">
                                    <h2 class="h5 mb-3 text-vert-benin">3. Commandes et paiements</h2>
                                    <p>Les produits artisanaux sont vendus directement par les artisans. Tomitɔnhi agit
                                        comme plateforme intermédiaire.</p>
                                    <h3 class="h6 mt-4">3.1 Processus de commande</h3>
                                    <ol class="mt-3">
                                        <li class="mb-2">Sélection des articles dans le panier</li>
                                        <li class="mb-2">Validation du mode de livraison</li>
                                        <li class="mb-2">Paiement sécurisé</li>
                                        <li>Confirmation par email</li>
                                    </ol>
                                </article>

                                <!-- Bloc important -->
                                <div class="alert alert-warning mt-5">
                                    <div class="d-flex">
                                        <i class="fas fa-exclamation-triangle text-warning fs-4 me-3"></i>
                                        <div>
                                            <h3 class="h5">Dispositions importantes</h3>
                                            <p class="mb-0">Les produits artisanaux étant uniques, les retours sont
                                                acceptés sous 14 jours uniquement en cas de dommage pendant le
                                                transport.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Acceptation des CGU -->
                                <div class="card border-0 bg-light mt-5">
                                    <div class="card-body text-center">
                                        <h3 class="h5 mb-3">Vous utilisez notre plateforme ?</h3>
                                        <p class="mb-0">En créant un compte ou passant commande, vous reconnaissez avoir
                                            lu et accepté nos conditions générales.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ rapide -->
                    <div class="mt-5">
                        <h2 class="h4 mb-4">Questions fréquentes</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item border-0 shadow-sm mb-3 rounded-3 overflow-hidden">
                                <h3 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne">
                                        Comment modifier mes informations personnelles ?
                                    </button>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        Vous pouvez modifier vos informations à tout moment depuis votre <a
                                            href="account.html" class="text-vert-benin">espace compte</a>.
                                    </div>
                                </div>
                            </div>
                            <!-- Autres questions -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
