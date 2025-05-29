<x-guest-layout>
    <style>
        .auth-container {
            max-width: 28rem;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .auth-title {
            color: #008751;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #2d3748;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }
        .form-input:focus {
            border-color: #008751;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 135, 81, 0.1);
        }
        .input-group {
            display: flex;
        }
        .input-group .form-input {
            flex: 1;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .toggle-password {
            background-color: #f8f9fa;
            border: 1px solid #e2e8f0;
            border-left: 0;
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
            padding: 0 0.75rem;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .btn-primary {
            background-color: #008751;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            border: none;
            font-weight: 500;
            transition: background-color 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-primary:hover {
            background-color: #006a40;
        }
        .btn-block {
            width: 100%;
        }
        .form-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
        }
        .text-error {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .text-link {
            color: #008751;
            text-decoration: none;
            font-weight: 500;
        }
        .text-link:hover {
            color: #006a40;
            text-decoration: underline;
        }
        .flex-between {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .whatsapp-prefix {
            background-color: #f8f9fa;
            border: 1px solid #e2e8f0;
            border-right: 0;
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
            padding: 0.75rem;
            font-size: 0.875rem;
            color: #4a5568;
        }
    </style>

    <div class="auth-container">
        <h1 class="auth-title">
            <i class="fas fa-user-plus me-2"></i>Créer un compte
        </h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 rounded-lg">
                <ul class="text-red-600">
                    @foreach ($errors->all() as $error)
                        <li class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i> {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="hidden" name="role" value="client">

            <!-- Nom Complet -->
            <div class="form-group">
                <label for="name" class="form-label">Nom complet*</label>
                <input id="name" type="text" 
                    class="form-input @error('name') border-red-500 @enderror" 
                    name="name" value="{{ old('name') }}" 
                    required autofocus autocomplete="name">
                @error('name')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">Email*</label>
                <input id="email" type="email" 
                    class="form-input @error('email') border-red-500 @enderror" 
                    name="email" value="{{ old('email') }}" 
                    required autocomplete="email">
                @error('email')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- WhatsApp -->
            <div class="form-group">
                <label for="whatsapp" class="form-label">WhatsApp*</label>
                <div class="input-group">
                    <span class="whatsapp-prefix">+229</span>
                    <input id="whatsapp" type="tel" 
                        class="form-input @error('whatsapp') border-red-500 @enderror" 
                        name="whatsapp" value="{{ old('whatsapp') }}"
                        pattern="[5-9][0-9]{7}" 
                        title="8 chiffres commençant par 5,6,7,8 ou 9"
                        required>
                </div>
                <small class="text-gray-500">Format: 61234567 (sans le 0)</small>
                @error('whatsapp')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div class="form-group">
                <label for="password" class="form-label">Mot de passe*</label>
                <div class="input-group">
                    <input id="password" type="password" 
                        class="form-input @error('password') border-red-500 @enderror" 
                        name="password" required autocomplete="new-password">
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <small class="text-gray-500">Minimum 8 caractères</small>
                @error('password')
                    <p class="text-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmation mot de passe -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirmer le mot de passe*</label>
                <div class="input-group">
                    <input id="password_confirmation" type="password" 
                        class="form-input" 
                        name="password_confirmation" required autocomplete="new-password">
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="form-group mt-6">
                <button type="submit" class="btn-primary btn-block">
                    <i class="fas fa-user-plus me-2"></i> S'inscrire
                </button>
            </div>
        </form>

        <div class="form-footer">
            <p class="text-gray-600">
                Déjà inscrit ? 
                <a href="{{ route('login') }}" class="text-link">Connectez-vous</a>
            </p>
            <p class="text-gray-600 mt-2">
                Vous êtes artisan ? 
                <a href="{{ route('artisan.register') }}" class="text-link">Devenir artisan</a>
            </p>
        </div>
    </div>

    <script>
        // Gestion de l'affichage du mot de passe
        document.querySelectorAll('.toggle-password').forEach(function(button) {
            button.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });

        // Validation du format WhatsApp
        document.getElementById('whatsapp')?.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</x-guest-layout>