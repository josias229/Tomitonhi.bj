@extends('layout.legal')

@section('legal-content')
    <main class="container my-5">
        <div class="row justify-content-center border-1">
            <div class="col-lg-8 ">
                <h1 class="h2 text-center mb-4">Foire Aux Questions</h1>

                <div class="accordion" id="faqAccordion">
                    <!-- Section Acheteurs -->
                    <div class="accordion-item mb-3 border-1">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-light-vert-benin" type="button" data-bs-toggle="collapse"
                                data-bs-target="#acheteurs">
                                <i class="fas fa-shopping-bag me-2"></i> Pour les acheteurs internationaux
                            </button>
                        </h2>
                        <div id="acheteurs" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="mb-4">
                                    <h3 class="h5">Comment commander ?</h3>
                                    <p>1. Sélectionnez votre artisan<br>2. Choisissez vos articles<br>3. Paiement
                                        sécurisé (Stripe/PayPal)<br>4. Suivi de livraison par email</p>
                                </div>
                                <div class="mb-4">
                                    <h3 class="h5">Délais de livraison ?</h3>
                                    <p>Afrique de l'Ouest : 5-7 jours<br>Europe : 10-15 jours<br>Amérique : 15-20 jours
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Artisans -->
                    <div class="accordion-item mb-3 border-1">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-light-vert-benin" type="button" data-bs-toggle="collapse"
                                data-bs-target="#artisans">
                                <i class="fas fa-hands-helping me-2"></i> Pour les artisans béninois
                            </button>
                        </h2>
                        <div id="artisans" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <div class="mb-4">
                                    <h3 class="h5">Comment rejoindre la plateforme ?</h3>
                                    <p>Remplissez le formulaire <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#artisanAuthModal">Devenir Artisan</a> avec
                                        :<br>- Votre RCCM<br>- Photos de vos produits<br>- Votre numéro mobile</p>
                                </div>
                                <div class="mb-4">
                                    <h3 class="h5">Quelles sont les commissions ?</h3>
                                    <p>Seulement 10% par vente (contre 30-50% dans les marchés physiques)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Connexion/Inscription Artisan -->
    <div class="modal fade" id="artisanAuthModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <i class="fas fa-user-cog me-2"></i>Espace Artisan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Onglets -->
                    <ul class="nav nav-tabs mb-4" id="artisanAuthTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="artisan-login-tab" data-bs-toggle="tab"
                                data-bs-target="#artisan-login" type="button">
                                Connexion
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="artisan-register-tab" data-bs-toggle="tab"
                                data-bs-target="#artisan-register" type="button">
                                Devenir Artisan
                            </button>
                        </li>
                    </ul>

                    <!-- Contenu des onglets -->
                    <div class="tab-content">
                        <!-- Formulaire de connexion artisan (identique à votre version actuelle) -->
                        <div class="tab-pane fade show active" id="artisan-login">
                            <form id="artisanLoginForm">
                                <div class="mb-3">
                                    <label class="form-label">Email ou numéro enregistré</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label small" for="rememberMe">Rester connecté</label>
                                    </div>
                                    <a href="#" class="small text-vert-benin"
                                        onclick="switchArtisanTab('recover-tab')">Mot de passe oublié ?</a>
                                </div>
                                <button type="submit" class="btn btn-vert w-100 mb-3">
                                    <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                                </button>
                                <div class="text-center small">
                                    Vous êtes client ? <a href="#" class="text-vert-benin" data-bs-dismiss="modal"
                                        data-bs-toggle="modal" data-bs-target="#userAuthModal">Accédez à votre
                                        espace</a>
                                </div>
                            </form>
                        </div>

                        <!-- Onglet "Devenir Artisan" -->
                        <div class="tab-pane fade" id="artisan-register">
                            <div class="text-center mb-4">
                                <i class="fas fa-hands-helping text-vert-benin" style="font-size: 2.5rem;"></i>
                                <h5 class="mt-2">Rejoignez notre communauté d'artisans</h5>
                                <p class="text-muted small">Vendez vos créations à des milliers de clients</p>
                            </div>

                            <ul class="list-unstyled mb-4">
                                <li class="mb-2"><i class="fas fa-check-circle text-vert-benin me-2"></i> Plateforme
                                    dédiée aux artisans béninois</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-vert-benin me-2"></i> Gestion
                                    simplifiée de vos produits</li>
                                <li class="mb-2"><i class="fas fa-check-circle text-vert-benin me-2"></i> Paiements
                                    sécurisés</li>
                            </ul>

                            <!-- Dans l'onglet "Devenir Artisan", remplacez le lien actuel par : -->
                            <button class='btn btn-vert w-100' data-bs-toggle="modal"
                                data-bs-target="#artisanRegisterModal">
                                <i class="fas fa-arrow-right me-2"></i>Commencer l'inscription
                            </button>

                            <div class="text-center small mt-3">
                                Déjà artisan ? <a href="#" class="text-vert-benin"
                                    onclick="switchArtisanTab('artisan-login-tab')">Connectez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'inscription artisan en 3 étapes -->
    <div class="modal fade" id="artisanRegisterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 position-relative">
                    <h5 class="modal-title">
                        <i class="fas fa-user-cog me-2"></i>Inscription Artisan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Indicateur de progression -->
                <div class="px-4 pt-3 pb-2 step-indicator">
                    <!-- Étape 1 -->
                    <div class="step active">
                        <div class="step-circle">1</div>
                        <span class="step-label">Étape 1</span>
                    </div>

                    <!-- Étape 2 -->
                    <div class="step">
                        <div class="step-circle">2</div>
                        <span class="step-label">Étape 2</span>
                    </div>

                    <!-- Étape 3 -->
                    <div class="step">
                        <div class="step-circle">3</div>
                        <span class="step-label">Étape 3</span>
                    </div>
                </div>

                <div class="modal-body p-0">
                    <form id="artisanRegisterForm">
                        <!-- Étape 1 : Pré-inscription -->
                        <div class="registration-step active" id="step1">
                            <div class="row g-0">
                                <div class="col-md-6 bg-vert-benin text-white p-4 d-flex align-items-center">
                                    <div>
                                        <h2 class="h4 mb-3"><i class="fas fa-handshake me-2"></i>Conditions requises
                                        </h2>
                                        <ul class="fa-ul mb-3">
                                            <li class="mb-2"><span class="fa-li"><i
                                                        class="fas fa-check-circle"></i></span>Être enregistré auprès de
                                                la Chambre des Métiers</li>
                                            <li class="mb-2"><span class="fa-li"><i
                                                        class="fas fa-check-circle"></i></span>Disposer d'un RCCM valide
                                            </li>
                                            <li class="mb-2"><span class="fa-li"><i
                                                        class="fas fa-check-circle"></i></span>Produits 100% fabriqués
                                                au Bénin</li>
                                            <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Capacité
                                                de production minimum</li>
                                        </ul>
                                        <div class="alert bg-white text-dark small p-2">
                                            <i class="fas fa-info-circle me-2"></i> Vérification sous 72h par notre
                                            équipe
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <h3 class="h5 mb-3">1. Pré-inscription</h3>
                                    <div class="mb-3">
                                        <label class="form-label">Nom complet*</label>
                                        <input type="text" class="form-control" name="fullname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Numéro WhatsApp*</label>
                                        <div class="input-group">
                                            <span class="input-group-text">+229</span>
                                            <input type="tel" class="form-control" name="phone" pattern="[0-9]{8}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email professionnel</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ville d'activité*</label>
                                        <select class="form-select" name="city" required>
                                            <option value="">Sélectionnez...</option>
                                            <option>Cotonou</option>
                                            <option>Porto-Novo</option>
                                            <option>Parakou</option>
                                            <option>Abomey</option>
                                            <option>Autre</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-vert w-100 py-2" onclick="nextStep(2)">
                                        Continuer <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 2 : Validation légale -->
                        <div class="registration-step d-none" id="step2">
                            <div class="row g-0">
                                <div class="col-md-6 bg-vert-benin text-white p-4 d-flex align-items-center">
                                    <div>
                                        <h2 class="h4 mb-3"><i class="fas fa-file-alt me-2"></i>Documents requis</h2>
                                        <div class="mb-3">
                                            <h3 class="h6">Pour tous :</h3>
                                            <ul class="fa-ul">
                                                <li><span class="fa-li"><i
                                                            class="far fa-id-card"></i></span>CNI/Passeport valide</li>
                                                <li><span class="fa-li"><i class="fas fa-file-invoice"></i></span>RCCM à
                                                    jour</li>
                                            </ul>
                                        </div>
                                        <div class="mb-3">
                                            <h3 class="h6">Selon activité :</h3>
                                            <ul class="fa-ul">
                                                <li><span class="fa-li"><i class="fas fa-certificate"></i></span>Carte
                                                    d'artisan</li>
                                                <li><span class="fa-li"><i class="fas fa-flask"></i></span>Certificat de
                                                    non-toxicité</li>
                                            </ul>
                                        </div>
                                        <p class="small text-muted">Formats acceptés : PDF, JPG, PNG (max 5MB)</p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <h3 class="h5 mb-3">2. Vérification légale</h3>
                                    <div class="mb-3">
                                        <label class="form-label">Type d'artisanat*</label>
                                        <select class="form-select" name="craft_type" required>
                                            <option value="">Sélectionnez...</option>
                                            <option>Sculpture sur bois</option>
                                            <option>Textile traditionnel</option>
                                            <option>Vannerie</option>
                                            <option>Poterie</option>
                                            <option>Bijouterie</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Numéro RCCM*</label>
                                        <input type="text" class="form-control" name="rccm" pattern="[A-Z0-9]{10}"
                                            required>
                                        <small class="text-muted">Format : RB123456789</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Documents requis*</label>
                                        <div class="alert alert-light small mb-3">
                                            <i class="fas fa-info-circle me-2 text-vert-benin"></i>
                                            Formats acceptés : PDF, JPG, PNG (max 5MB par fichier)
                                        </div>

                                        <!-- Document 1 -->
                                        <div class="mb-2">
                                            <label class="small fw-bold d-block">CNI/Passeport*</label>
                                            <div class="dropzone p-2 border rounded"
                                                onclick="document.getElementById('idFile').click()">
                                                <input type="file" id="idFile" class="d-none"
                                                    accept=".pdf,.jpg,.png">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-id-card me-2 text-muted"></i>
                                                    <span class="small" id="idFileLabel">Téléverser</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Document 2 -->
                                        <div class="mb-2">
                                            <label class="small fw-bold d-block">RCCM*</label>
                                            <div class="dropzone p-2 border rounded"
                                                onclick="document.getElementById('rccmFile').click()">
                                                <input type="file" id="rccmFile" class="d-none"
                                                    accept=".pdf,.jpg,.png">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-file-contract me-2 text-muted"></i>
                                                    <span class="small" id="rccmFileLabel">Téléverser</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(1)">
                                            <i class="fas fa-arrow-left me-2"></i> Retour
                                        </button>
                                        <button type="button" class="btn btn-vert" onclick="nextStep(3)">
                                            Suivant <i class="fas fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 3 : Portfolio produits -->
                        <div class="registration-step d-none" id="step3">
                            <div class="row g-0">
                                <div class="col-md-6 bg-vert-benin text-white p-4 d-flex align-items-center">
                                    <div>
                                        <h2 class="h4 mb-3"><i class="fas fa-award me-2"></i>Vos avantages</h2>
                                        <div class="row row-cols-3 g-2 mb-3">
                                            <div class="col text-center">
                                                <div class="bg-vert-benin text-white rounded-circle p-2 mb-1 mx-auto"
                                                    style="width:50px;height:50px;line-height:35px;">
                                                    <i class="fas fa-globe-africa"></i>
                                                </div>
                                                <p class="small mb-0">Visibilité internationale</p>
                                            </div>
                                            <div class="col text-center">
                                                <div class="bg-vert-benin text-white rounded-circle p-2 mb-1 mx-auto"
                                                    style="width:50px;height:50px;line-height:35px;">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                </div>
                                                <p class="small mb-0">Paiements sécurisés</p>
                                            </div>
                                            <div class="col text-center">
                                                <div class="bg-vert-benin text-white rounded-circle p-2 mb-1 mx-auto"
                                                    style="width:50px;height:50px;line-height:35px;">
                                                    <i class="fas fa-truck"></i>
                                                </div>
                                                <p class="small mb-0">Logistique gérée</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 class="h6">Conseils pour vos photos :</h3>
                                        <ul class="fa-ul small">
                                            <li><span class="fa-li"><i class="fas fa-camera"></i></span>Fond blanc ou
                                                neutre</li>
                                            <li><span class="fa-li"><i class="fas fa-ruler-combined"></i></span>Inclure
                                                une référence de taille</li>
                                            <li><span class="fa-li"><i class="fas fa-lightbulb"></i></span>Bonne lumière
                                                naturelle</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 p-4">
                                    <h3 class="h5 mb-3">3. Présentez vos créations</h3>
                                    <div class="mb-3">
                                        <label class="form-label">Nom de votre atelier*</label>
                                        <input type="text" class="form-control" name="workshop_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Description courte*</label>
                                        <textarea class="form-control" rows="3" name="description" maxlength="200" required></textarea>
                                        <small class="text-muted">200 caractères max</small>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Galerie produits (min 3 photos)*</label>
                                        <div class="alert alert-light small mb-2">
                                            <i class="fas fa-camera me-2 text-vert-benin"></i>
                                            Conseil : Prenez vos photos sous bonne lumière avec un fond neutre
                                        </div>

                                        <div class="row g-2 mb-2" id="imagePreview"></div>

                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary flex-grow-1"
                                                onclick="document.getElementById('productImages').click()">
                                                <i class="fas fa-folder-open me-1"></i> Parcourir
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success"
                                                onclick="activateCamera()">
                                                <i class="fas fa-camera me-1"></i> Camera
                                            </button>
                                        </div>
                                        <input type="file" id="productImages" class="d-none" accept="image/*"
                                            multiple>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                        <label class="form-check-label small" for="agreeTerms">
                                            J'accepte les <a href="#" class="text-vert-benin">CGU</a> et confirme
                                            l'authenticité de mes produits
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary" onclick="prevStep(2)">
                                            <i class="fas fa-arrow-left me-2"></i> Retour
                                        </button>
                                        <button type="submit" class="btn btn-vert">
                                            <i class="fas fa-paper-plane me-2"></i> Soumettre
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
