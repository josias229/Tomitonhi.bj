@extends('layout.legal')

@section('legal-content')
    <div class="container mt-5">
        <h2 class="mb-4">Confirmation de commande</h2>
        <div class="alert alert-success">
            {{ $message }}
        </div>

        <p>Référence : <strong>{{ $commande->reference }}</strong></p>
        <p>Total payé : <strong>{{ number_format($commande->montant_total, 0, ',', ' ') }} FCFA</strong></p>

        <a href="{{ route('accueil') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
    </div>
@endsection
