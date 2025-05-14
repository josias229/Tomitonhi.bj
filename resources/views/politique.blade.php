@extends('layout.legal')

@section('legal-content')
     <!-- Template pour politique.html, cgu.html, mentions-legales.html -->
     <main class="policy-template py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <article class="bg-white p-4 p-lg-5 rounded-4 shadow-sm">
                        <!-- En-tête avec logo et contexte -->
                        <header class="mb-5 text-center">
                            <img src="logo.png" alt="Tomitɔnhi" width="180" class="mb-4">
                            <h1 class="h2 fw-bold mb-3">Politique de Confidentialité de Tomitɔnhi</h1>
                            <p class="text-muted">Dernière mise à jour : <time datetime="2023-10-15">15 Octobre
                                    2023</time></p>
                        </header>

                        <!-- Bandeau d'engagement -->
                        <div
                            class="alert alert-engagement bg-light-vert-benin border-start border-4 border-vert-benin mb-5">
                            <div class="d-flex">
                                <i class="fas fa-handshake me-3 mt-1 text-vert-benin"></i>
                                <div>
                                    <p class="mb-0"><strong>Engagement :</strong> Dans le cadre du mois de la
                                        consommation locale au Bénin, Tomitɔnhi s'engage à protéger vos données tout en
                                        soutenant les producteurs locaux conformément aux lois béninoises et
                                        internationales.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sommaire interactif -->
                        <nav class="policy-toc card mb-5 border-0 bg-light-vert-benin">
                            <div class="card-body p-4">
                                <h2 class="h5 mb-3 d-flex align-items-center">
                                    <i class="fas fa-bookmark me-2 text-vert-benin"></i>Sommaire
                                </h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><a href="#finalite"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">1.</span> Finalité de la collecte</a></li>
                                            <li class="mb-2"><a href="#donnees"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">2.</span> Données collectées</a></li>
                                            <li class="mb-2"><a href="#protection"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">3.</span> Protection internationale</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><a href="#dpo"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">4.</span> Délégué à la protection</a></li>
                                            <li class="mb-2"><a href="#droits"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">5.</span> Vos droits</a></li>
                                            <li class="mb-2"><a href="#modifications"
                                                    class="d-flex align-items-center text-dark hover-vert-benin"><span
                                                        class="me-2">6.</span> Modifications</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>

                        <!-- Contenu détaillé -->
                        <section id="finalite" class="policy-section mb-5">
                            <div class="d-flex align-items-center mb-3">
                                <span class="policy-number bg-vert-benin text-white rounded-circle me-3">1</span>
                                <h2 class="h4 mb-0">Finalité de la collecte</h2>
                            </div>
                            <div class="ps-5">
                                <p>Conformément à notre mission de promotion des produits locaux béninois, nous
                                    collectons des données pour :</p>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i
                                                class="fas fa-check-circle text-vert-benin"></i></span>Faciliter les
                                        transactions entre producteurs locaux et consommateurs internationaux</li>
                                    <li><span class="fa-li"><i
                                                class="fas fa-check-circle text-vert-benin"></i></span>Optimiser la
                                        logistique internationale (GDIZ, douanes)</li>
                                    <li><span class="fa-li"><i
                                                class="fas fa-check-circle text-vert-benin"></i></span>Personnaliser
                                        l'expérience utilisateur multilingue</li>
                                    <li><span class="fa-li"><i
                                                class="fas fa-check-circle text-vert-benin"></i></span>Assurer la
                                        sécurité des paiements transfrontaliers</li>
                                </ul>
                            </div>
                        </section>

                        <section id="donnees" class="policy-section mb-5">
                            <div class="d-flex align-items-center mb-3">
                                <span class="policy-number bg-vert-benin text-white rounded-circle me-3">2</span>
                                <h2 class="h4 mb-0">Données collectées</h2>
                            </div>
                            <div class="ps-5">
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col">Catégorie</th>
                                                <th scope="col">Producteurs</th>
                                                <th scope="col">Consommateurs</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Identité</td>
                                                <td><i class="fas fa-check text-success"></i> (KYC renforcé)</td>
                                                <td><i class="fas fa-check text-success"></i></td>
                                            </tr>
                                            <tr>
                                                <td>Paiement</td>
                                                <td>Coordonnées bancaires locales</td>
                                                <td>Cartes internationales (Stripe/PayPal)</td>
                                            </tr>
                                            <tr>
                                                <td>Localisation</td>
                                                <td>Adresse atelier (géolocalisation)</td>
                                                <td>Pays de livraison</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <p><strong>Spécificité Bénin :</strong> Pour les zones à faible connectivité, nous
                                    limitons le volume des données transférées.</p>
                            </div>
                        </section>

                        <section id="protection" class="policy-section mb-5">
                            <div class="d-flex align-items-center mb-3">
                                <span class="policy-number bg-vert-benin text-white rounded-circle me-3">3</span>
                                <h2 class="h4 mb-0">Protection internationale</h2>
                            </div>
                            <div class="ps-5">
                                <div class="d-flex mb-3">
                                    <i class="fas fa-shield-alt text-vert-benin me-3 mt-1"></i>
                                    <div>
                                        <h3 class="h5">Transferts transfrontaliers</h3>
                                        <p>Vos données transitent par notre hub cloud sécurisé à la GDIZ, conforme aux
                                            standards :</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><span class="badge bg-success">RGPD</span></li>
                                            <li class="list-inline-item"><span class="badge bg-primary">OHADA</span>
                                            </li>
                                            <li class="list-inline-item"><span class="badge bg-dark">PCI-DSS</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="alert alert-light">
                                    <p><i class="fas fa-info-circle text-vert-benin me-2"></i> <strong>Pour les artisans
                                            :</strong> Vos données de production restent stockées localement au Bénin.
                                    </p>
                                </div>
                            </div>
                        </section>

                        <!-- Bloc contact renforcé -->
                        <section id="dpo" class="policy-contact mt-5 pt-4 border-top">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="card h-100 border-0 bg-light">
                                        <div class="card-body">
                                            <h3 class="h5"><i class="fas fa-user-shield text-vert-benin me-2"></i>
                                                Délégué à la protection</h3>
                                            <address class="mt-3">
                                                <strong>M. Koffi Agossa</strong><br>
                                                <a href="mailto:dpo@tomitonhi.bj"
                                                    class="text-decoration-none">dpo@tomitonhi.bj</a><br>
                                                +229 67 12 34 56<br>
                                                Siège social : GDIZ, Bâtiment 3A
                                            </address>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card h-100 border-0 bg-light">
                                        <div class="card-body">
                                            <h3 class="h5"><i class="fas fa-gavel text-vert-benin me-2"></i> Réclamation
                                            </h3>
                                            <p>Consommateurs internationaux :</p>
                                            <ul class="fa-ul">
                                                <li><span class="fa-li"><i class="fab fa-cc-paypal"></i></span>
                                                    Protection PayPal</li>
                                                <li><span class="fa-li"><i class="fas fa-globe-europe"></i></span> <a
                                                        href="#" class="text-decoration-none">CNIL Europe</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
