@extends('layout.main')

@section('main-content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Finaliser votre commande</h2>
            
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                
                <div class="card mb-4 personal-info-card">
                    <div class="card-body">
                        <h3 class="h5">Informations personnelles</h3>
                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" name="nom" class="form-control" 
                                value="{{ auth()->user() ? auth()->user()->name : '' }}" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" 
                                    value="{{ auth()->user() ? auth()->user()->email : '' }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">WhatsApp</label>
                                <input type="text" name="whatsapp" class="form-control" 
                                    value="{{ auth()->user()->whatsapp ?? '' }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Téléphone à contacter pour Livraison</label>
                                <input type="tel" name="telephone" id="telephone" class="form-control" 
                                    value="{{ auth()->user()->whatsapp ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h5">Adresse de livraison</h3>
                        <div class="mb-3">
                            <textarea name="adresse" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h5">Méthode de paiement</h3>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="mode_paiement" id="mobile-money" value="mobile_money" checked>
                            <label class="form-check-label" for="mobile-money">
                                Mobile Money
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="mode_paiement" id="carte" value="carte">
                            <label class="form-check-label" for="carte">
                                Carte bancaire
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mode_paiement" id="espece" value="espece">
                            <label class="form-check-label" for="espece">
                                Paiement en espèce
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-vert-benin w-100 py-3">
                    Confirmer et payer
                </button>
            </form>
        </div>

        <div class="col-md-4">
            <div class="card sticky-top" style="top: 20px;">
                <div class="card-body">
                    <h3 class="h5">Récapitulatif</h3>
                    
                    @foreach(session('cart', []) as $id => $item)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $item['name'] }} x{{ $item['quantity'] }}</span>
                            <span>{{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} FCFA</span>
                        </div>
                    @endforeach
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Sous-total</span>
                        <span>{{ number_format($subtotal, 0, ',', ' ') }} FCFA</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Livraison</span>
                        <span>{{ number_format($delivery, 0, ',', ' ') }} FCFA</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Taxes</span>
                        <span>{{ number_format($taxes, 0, ',', ' ') }} FCFA</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span>{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const phoneInput = document.getElementById("telephone");
    window.intlTelInput(phoneInput, {
        initialCountry: "fr", // Pays par défaut (France)
        separateDialCode: true,
        preferredCountries: ["fr", "us", "ci", "sn", "be"], // Pays prioritaires
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
@endsection