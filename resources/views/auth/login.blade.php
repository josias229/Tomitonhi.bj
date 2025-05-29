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
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            transition: border-color 0.2s;
        }
        .form-input:focus {
            border-color: #008751;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 135, 81, 0.1);
        }
        .input-group {
            display: flex;
            margin-bottom: 1rem;
        }
        .input-group .form-input {
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
        }
        .btn-primary {
            background-color: #008751;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            border: none;
            font-weight: 500;
            width: 100%;
            transition: background-color 0.2s;
        }
        .btn-primary:hover {
            background-color: #006a40;
        }
        .form-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
        }
        .alert {
            padding: 0.75rem 1.25rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
        .remember-me {
            display: flex;
            align-items: center;
            margin: 1rem 0;
        }
        .remember-me input {
            margin-right: 0.5rem;
        }
    </style>

    <div class="auth-container">
        <h1 class="auth-title">
            <i class="fas fa-user-circle"></i> Connexion à Tomitɔnhi
        </h1>

        <!-- Session Status -->
        <x-auth-session-status class="alert alert-success" :status="session('status')" />

        @if (session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="user_type" value="client">

            <!-- Email ou Téléphone -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    Email ou numéro WhatsApp
                </label>
                <input id="email" type="text" 
                    class="form-input @error('email') border-red-500 @enderror" 
                    name="email" value="{{ old('email') }}" 
                    required autofocus autocomplete="username">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Mot de passe
                </label>
                <div class="input-group">
                    <input id="password" type="password" 
                        class="form-input @error('password') border-red-500 @enderror" 
                        name="password" required autocomplete="current-password">
                    <button type="button" class="toggle-password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me" class="text-sm text-gray-700">
                    Rester connecté
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-link" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif

                <button type="submit" class="btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i> Se connecter
                </button>
            </div>
        </form>

        <div class="form-footer">
            <p class="text-gray-600">
                Nouveau sur Tomitɔnhi ? 
                <a href="{{ route('register') }}" class="text-link">Créer un compte</a>
            </p>
            <p class="text-gray-600 mt-2">
                Vous êtes artisan ? 
                <a href="{{ route('artisan.login') }}" class="text-link">Accéder à l'espace professionnel</a>
            </p>
        </div>
    </div>

    <script>
        document.querySelector('.toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</x-guest-layout>