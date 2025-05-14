@extends('layout.legal')

@section('legal-content')

<main class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Colonne informations -->
            <div class="col-lg-5">
                <div class="pe-lg-4">
                    <h1 class="h2 mb-4">Contactez-nous</h1>
                    <p class="lead">Nous sommes là pour répondre à vos questions sur l'artisanat béninois.</p>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fas fa-map-marker-alt text-vert-benin mt-1 me-3"></i>
                        <div>
                            <h3 class="h6 mb-1">Adresse</h3>
                            <p class="small">123 Rue des Artisans<br>Cotonou, Bénin</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fas fa-phone-alt text-vert-benin mt-1 me-3"></i>
                        <div>
                            <h3 class="h6 mb-1">Téléphone</h3>
                            <p class="small">+229 12 34 56 78<br>Lun-Ven : 9h-17h</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <i class="fas fa-envelope text-vert-benin mt-1 me-3"></i>
                        <div>
                            <h3 class="h6 mb-1">Email</h3>
                            <p class="small">contact@tomitonhi.bj<br>Réponse sous 24h</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h3 class="h6 mb-3">Réseaux sociaux</h3>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-vert-benin"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#" class="text-vert-benin"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-vert-benin"><i class="fab fa-whatsapp fa-lg"></i></a>
                    </div>
                </div>
            </div>

            <!-- Colonne formulaire -->
            <div class="col-lg-7">
                <div class="card border-1 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label small">Votre nom complet</label>
                                <input type="text" class="form-control rounded-3 py-2" id="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label small">Adresse e-mail</label>
                                <input type="email" class="form-control rounded-3 py-2" id="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label small">Sujet</label>
                                <select class="form-select rounded-3 py-2" id="subject">
                                    <option>Question sur un produit</option>
                                    <option>Problème de commande</option>
                                    <option>Devenir artisan partenaire</option>
                                    <option>Autre demande</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label small">Message</label>
                                <textarea class="form-control rounded-3" id="message" rows="5" required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-vert py-2 rounded-3">
                                    <i class="fas fa-paper-plane me-2"></i> Envoyer le message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection
