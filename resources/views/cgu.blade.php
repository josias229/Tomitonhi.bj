@extends('layout.legal')

@section('legal-content')

    <main class="policy-template py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <article class="bg-white p-4 p-lg-5 rounded-4 shadow-sm">
                        <header class="mb-5 text-center">
                            <img src="../logo.png" alt="Tomitɔnhi" width="180" class="mb-4">
                            <h1 class="h2 fw-bold mb-3">Conditions Générales d'Utilisation</h1>
                            <p class="text-muted">Applicables depuis <time datetime="2023-10-15">15 Octobre 2023</time>
                            </p>
                        </header>

                        <div
                            class="alert alert-engagement bg-light-vert-benin border-start border-4 border-vert-benin mb-5">
                            <div class="d-flex">
                                <i class="fas fa-balance-scale me-3 mt-1 text-vert-benin"></i>
                                <div>
                                    <p class="mb-0"><strong>Contexte :</strong> Ces CGU régissent l'utilisation de la
                                        plateforme Tomitɔnhi, solution numérique béninoise pour la promotion des
                                        produits locaux à l'international.</p>
                                </div>
                            </div>
                        </div>

                        <nav class="policy-toc card mb-5 border-0 bg-light-vert-benin">
                            <div class="card-body p-4">
                                <h2 class="h5 mb-3 d-flex align-items-center">
                                    <i class="fas fa-book-open me-2 text-vert-benin"></i>Sommaire
                                </h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><a href="#objet"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">1.</span> Objet</a></li>
                                            <li class="mb-2"><a href="#comptes"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">2.</span> Comptes utilisateurs</a></li>
                                            <li class="mb-2"><a href="#produits"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">3.</span> Produits locaux</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><a href="#paiements"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">4.</span> Paiements internationaux</a></li>
                                            <li class="mb-2"><a href="#livraisons"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">5.</span> Livraisons internationales</a></li>
                                            <li class="mb-2"><a href="#litiges"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">6.</span> Litiges</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>

                        <section id="objet" class="policy-section mb-5">
                            <div class="d-flex align-items-center mb-3">
                                <span class="policy-number bg-vert-benin text-white rounded-circle me-3">1</span>
                                <h2 class="h4 mb-0">Objet de la plateforme</h2>
                            </div>
                            <div class="ps-5">
                                <p>Tomitɔnhi est une plateforme de mise en relation entre :</p>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i
                                                class="fas fa-users-gear text-vert-benin"></i></span>Producteurs/artisans
                                        locaux béninois</li>
                                    <li><span class="fa-li"><i
                                                class="fas fa-globe text-vert-benin"></i></span>Consommateurs
                                        internationaux</li>
                                </ul>
                                <p><strong>Spécificité :</strong> Conformément à la loi béninoise n°2017-20 sur le
                                    commerce électronique.</p>
                            </div>
                        </section>

                        <section id="comptes" class="policy-section mb-5">
                            <div class="d-flex align-items-center mb-3">
                                <span class="policy-number bg-vert-benin text-white rounded-circle me-3">2</span>
                                <h2 class="h4 mb-0">Comptes utilisateurs</h2>
                            </div>
                            <div class="ps-5">
                                <div class="table-responsive mb-3">
                                    <table class="table table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th>Type</th>
                                                <th>Exigences</th>
                                                <th>Vérification</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Producteurs</td>
                                                <td>RCCM, carte artisanat</td>
                                                <td>Manuelle sous 72h</td>
                                            </tr>
                                            <tr>
                                                <td>Consommateurs</td>
                                                <td>Email valide</td>
                                                <td>Automatique</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>

                        <section id="paiements" class="policy-section mb-5">
                            <div class="d-flex align-items-center mb-3">
                                <span class="policy-number bg-vert-benin text-white rounded-circle me-3">4</span>
                                <h2 class="h4 mb-0">Paiements internationaux</h2>
                            </div>
                            <div class="ps-5">
                                <div class="d-flex mb-3">
                                    <i class="fas fa-money-bill-transfer text-vert-benin me-3 mt-1"></i>
                                    <div>
                                        <h3 class="h5">Options disponibles</h3>
                                        <div class="d-flex flex-wrap gap-2 my-2">
                                            <span class="badge bg-primary"><i class="fab fa-cc-paypal me-1"></i>
                                                PayPal</span>
                                            <span class="badge bg-dark"><i class="fab fa-cc-stripe me-1"></i>
                                                Stripe</span>
                                            <span class="badge bg-success"><i class="fas fa-mobile-alt me-1"></i> MTN
                                                Mobile Money</span>
                                        </div>
                                        <p><strong>Taux de change :</strong> Calculé selon le cours BCEAO du jour.</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="litiges" class="policy-section mt-5 pt-4 border-top">
                            <div class="d-flex align-items-center mb-3">
                                <span class="policy-number bg-vert-benin text-white rounded-circle me-3">6</span>
                                <h2 class="h4 mb-0">Règlement des litiges</h2>
                            </div>
                            <div class="ps-5">
                                <p>En cas de litige :</p>
                                <ol class="steps-list">
                                    <li>Contactez notre médiateur sous 15 jours</li>
                                    <li>Tentative de résolution amiable (30 jours)</li>
                                    <li>Recours possible auprès du tribunal de Cotonou</li>
                                </ol>
                                <div class="alert alert-light">
                                    <p><i class="fas fa-info-circle text-vert-benin me-2"></i> Pour les consommateurs
                                        internationaux : clause de compétence territoriale optionnelle.</p>
                                </div>
                            </div>
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </main>
    
@endsection
