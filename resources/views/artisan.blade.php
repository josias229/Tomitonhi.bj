@extends('layout.main')

@section('main-content')
    <main class="py-5">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
                <h1 class="h2 mb-3 mb-md-0">Nos Artisans</h1>

                <!-- Filtres (mobile: menu déroulant / desktop: boutons) -->
                <div class="d-flex">
                    <div class="dropdown me-2 d-md-none">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-filter me-1"></i> Filtres
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tous</a></li>
                            <li><a class="dropdown-item" href="#">Textiles</a></li>
                            <!-- autres catégories -->
                        </ul>
                    </div>

                    <div class="btn-group d-none d-md-flex">
                        <button type="button" class="btn btn-outline-secondary active">Tous</button>
                        <button type="button" class="btn btn-outline-secondary">Textiles</button>
                        <button type="button" class="btn btn-outline-secondary">Sculptures</button>
                        <!-- autres catégories -->
                    </div>

                    <div class="ms-2">
                        <select class="form-select">
                            <option>Trier par : Pertinence</option>
                            <option>Note (descendante)</option>
                            <option>Note (ascendante)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Grille artisans -->
            <div class="row g-4">
                @foreach ($artisans as $artisan)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                @if ($artisan->artisan && $artisan->artisan->photo_profil)
                                    @if (str_contains($artisan->artisan->photo_profil, 'https://'))
                                        <img src="{{ $artisan->artisan->photo_profil }}"
                                            class="profile-main-image" alt="Portrait {{ $artisan->name }}">
                                    @else
                                        <img src="{{ Storage::url($artisan->artisan->photo_profil) }}"
                                            class="profile-main-image" alt="Portrait {{ $artisan->name }}">
                                    @endif
                                @else
                                    <img src="https://picsum.photos/id/{{ rand(1, 1000) }}/600/600" class="card-img-top" alt="Artisan">
                                @endif
                            
                                @if ($artisan->ville)
                                    <span class="position-absolute top-0 end-0 bg-vert-benin text-white small p-2">{{ $artisan->ville }}</span>
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h3 class="h5 mb-1">{{ $artisan->name }}</h3>

                                @if ($artisan->artisan && $artisan->artisan->produits->isNotEmpty())
                                    <div class="rating small text-warning mb-2">
                                        <i class="fas fa-star"></i>
                                        <span>4.8 ({{ $artisan->artisan->produits->count() }})</span>
                                    </div>
                                @endif

                                <a href="{{ route('details-artisans', ['artisan' => $artisan->id]) }}"
                                    class="btn btn-sm btn-vert stretched-link">
                                    Voir boutique
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5">
                <div class="pagination-links">
                    {{ $artisans->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </main>
@endsection
