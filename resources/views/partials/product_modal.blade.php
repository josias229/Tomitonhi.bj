<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="productModalLabel">{{ $product->nom }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        @if($product->photos->count() > 0)
                            <img src="{{ Storage::url($product->photos->first()->url) }}" 
                                 class="img-fluid rounded" 
                                 alt="{{ $product->nom }}">
                        @else
                            <img src="https://picsum.photos/800/600" 
                                 class="img-fluid rounded" 
                                 alt="{{ $product->nom }}">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-vert-benin">{{ $product->categorie->nom }}</span>
                            <div class="rating text-warning">
                                <i class="fas fa-star"></i>
                                <span>4.8</span>
                            </div>
                        </div>

                        <p class="text-muted mb-3">
                            Par <span class="text-vert-benin">{{ $product->artisan->user->name }}</span>
                        </p>

                        <div class="mb-4">
                            @if($product->prix_promo)
                                <h4 class="h5 text-success">{{ number_format($product->prix_promo, 0, ',', ' ') }} FCFA</h4>
                                <p class="text-muted mb-0"><del>{{ number_format($product->prix, 0, ',', ' ') }} FCFA</del></p>
                            @else
                                <h4 class="h5 text-success">{{ number_format($product->prix, 0, ',', ' ') }} FCFA</h4>
                            @endif
                        </div>

                        <p class="mb-4">{{ $product->description }}</p>

                        <div class="d-flex gap-3 mb-4">
                            <div class="input-group w-50">
                                <button class="btn btn-outline-secondary" type="button">-</button>
                                <input type="number" class="form-control text-center" value="1"
                                    min="1" max="99">
                                <button class="btn btn-outline-secondary" type="button">+</button>
                            </div>
                            <button class="btn btn-vert flex-grow-1">
                                <i class="fas fa-cart-plus me-2"></i> Ajouter au panier
                            </button>
                        </div>

                        <div class="border-top pt-3">
                            <h5 class="h6">Livraison internationale</h5>
                            <p class="small text-muted">Expédition sous 2-3 jours ouvrés. Délai de livraison: 5-10
                                jours.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>