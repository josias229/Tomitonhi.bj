@extends('layout.legal')

@section('legal-content')
    <main class="policy-template py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <article class="bg-white p-4 p-lg-5 rounded-4 shadow-sm">
                        <header class="mb-5 text-center">
                            <img src="logo.png" alt="Tomitɔnhi" width="180" class="mb-4">
                            <h1 class="h2 fw-bold mb-3">Mentions Légales</h1>
                        </header>

                        <div
                            class="alert alert-engagement bg-light-vert-benin border-start border-4 border-vert-benin mb-5">
                            <div class="d-flex">
                                <i class="fas fa-landmark me-3 mt-1 text-vert-benin"></i>
                                <div>
                                    <p class="mb-0"><strong>Transparence :</strong> Conformément à la loi béninoise sur
                                        l'économie numérique, ces mentions informent sur l'éditeur de la plateforme
                                        Tomitɔnhi.</p>
                                </div>
                            </div>
                        </div>

                        <section class="policy-section mb-5">
                            <h2 class="h4 mb-3 border-bottom pb-2">Éditeur</h2>
                            <address>
                                <strong>Tomitɔnhi SAS</strong><br>
                                Zone GDIZ, Bâtiment 3A<br>
                                Glo-Djigbé, Bénin<br>
                                <i class="fas fa-phone-alt me-2"></i> +229 21 23 45 67<br>
                                <i class="fas fa-envelope me-2"></i> <a
                                    href="mailto:contact@tomitonhi.bj">contact@tomitonhi.bj</a><br>
                                <i class="fas fa-file-alt me-2"></i> RCCM : RB/COT/2023/B/1234<br>
                                <i class="fas fa-id-card me-2"></i> NIF : 3202102345678
                            </address>
                        </section>

                        <section class="policy-section mb-5">
                            <h2 class="h4 mb-3 border-bottom pb-2">Directeur de publication</h2>
                            <p>M. Jean Codjo, Président de Tomitɔnhi SAS</p>
                        </section>

                        <section class="policy-section mb-5">
                            <h2 class="h4 mb-3 border-bottom pb-2">Hébergement</h2>
                            <div class="d-flex">
                                <i class="fas fa-server text-vert-benin me-3 mt-1"></i>
                                <div>
                                    <p><strong>Infrastructure locale :</strong></p>
                                    <p>Serveurs primaires : GDIZ Data Center (Bénin)<br>
                                        Serveurs secondaires : AWS Afrique du Sud (backup)</p>
                                    <p>Conforme aux normes de souveraineté numérique béninoise</p>
                                </div>
                            </div>
                        </section>

                        <section class="policy-section mb-5">
                            <h2 class="h4 mb-3 border-bottom pb-2">Propriété intellectuelle</h2>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-copyright text-vert-benin"></i></span>Marque
                                    déposée à l'INPI Bénin (N°2023-789)</li>
                                <li><span class="fa-li"><i class="fas fa-laptop-code text-vert-benin"></i></span>Logiciel
                                    protégé par copyright</li>
                                <li><span class="fa-li"><i class="fas fa-images text-vert-benin"></i></span>Photos des
                                    produits : propriété des artisans</li>
                            </ul>
                        </section>

                        <section class="policy-section">
                            <h2 class="h4 mb-3 border-bottom pb-2">Partenaires institutionnels</h2>
                            <div class="row row-cols-2 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100 border-0 bg-light">
                                        <div class="card-body text-center">
                                            <img src="assets/images-legales/MDI-LOGO.png" alt="MDI Bénin" height="40"
                                                class="mb-2">
                                            <p class="small mb-0">Ministère du Digital</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 border-0 bg-light">
                                        <div class="card-body text-center">
                                            <img src="assets/images-legales/GDIZ-LOGO.png" alt="GDIZ" height="40"
                                                class="mb-2">
                                            <p class="small mb-0">Zone Industrielle</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 border-0 bg-light">
                                        <div class="card-body text-center">
                                            <img src="assets/images-legales/CMA-Benin.png" alt="Chambre d'Artisanat"
                                                height="40" class="mb-2">
                                            <p class="small mb-0">Chambre des Métiers</p>
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
