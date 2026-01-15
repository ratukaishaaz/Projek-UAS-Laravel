<x-guest-layout>
    <style>
        /* Styling khusus input agar terlihat modern dan konsisten */
        .form-group { margin-bottom: 25px; text-align: left; }
        
        .form-label { 
            color: #94a3b8; 
            font-weight: 700; 
            font-size: 0.7rem; 
            text-transform: uppercase; 
            margin-left: 5px; 
            margin-bottom: 10px; 
            display: block; 
            letter-spacing: 1px;
        }
        
        .custom-input {
            background: rgba(30, 41, 59, 0.5) !important;
            border: 1px solid rgba(51, 65, 85, 0.8) !important;
            border-radius: 18px 0 0 18px !important; /* Disesuaikan untuk grup mata */
            padding: 15px 22px !important;
            color: white !important; 
            transition: 0.3s ease;
        }

        .custom-input::placeholder {
            color: rgba(255, 255, 255, 0.4) !important;
            opacity: 1;
        }

        .custom-input:focus {
            border-color: #2dd4bf !important;
            box-shadow: 0 0 0 5px rgba(45, 212, 191, 0.15) !important;
            background: rgba(30, 41, 59, 0.8) !important;
        }

        /* Styling untuk icon mata */
        .input-group-text {
            background: rgba(30, 41, 59, 0.5) !important;
            border: 1px solid rgba(51, 65, 85, 0.8) !important;
            border-left: none !important;
            border-radius: 0 18px 18px 0 !important;
            color: #2dd4bf !important;
            padding-right: 20px !important;
            cursor: pointer;
        }

        .btn-glow {
            background: #0d9488 !important; 
            color: white !important;
            font-weight: 800 !important;
            border-radius: 18px !important;
            padding: 16px !important;
            width: 100%; 
            border: none;
            transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 10px;
        }

        .btn-glow:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(13, 148, 136, 0.4);
            background: #2dd4bf !important;
            color: #042f2e !important;
        }

        .auth-footer-link {
            color: #64748b;
            font-size: 0.85rem;
            text-decoration: none;
            transition: 0.3s;
        }

        .auth-footer-link span { color: #2dd4bf; font-weight: 700; }
        .auth-footer-link:hover { color: white; }

        .form-check-input:checked {
            background-color: #0d9488 !important;
            border-color: #2dd4bf !important;
        }
    </style>

    <div class="text-center">
        <p class="text-white-50 small mb-5" style="letter-spacing: 3px; text-transform: uppercase;">
            <i class="fa-solid fa-shield-halved me-2"></i> Sistem Informasi Pendataan Warga
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control custom-input" 
                       style="border-radius: 18px !important;"
                       placeholder="Enter your official email" required autofocus>
            </div>

            <div class="form-group">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label mb-0">Password</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="small text-decoration-none" style="color: #2dd4bf; font-size: 0.65rem; font-weight: 700;">Lupa kata sandi?</a>
                    @endif
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control custom-input" 
                           placeholder="••••••••" required>
                    <span class="input-group-text" onclick="togglePassword()">
                        <i class="fa-solid fa-eye-slash" id="toggleIcon"></i>
                    </span>
                </div>
            </div>

            <div class="form-check text-start mb-4 ms-1">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me" style="background-color: #1e293b; border-color: #334155;">
                <label class="form-check-label small text-white-50" for="remember_me">
                    Ingat akun saya
                </label>
            </div>

            <button type="submit" class="btn btn-glow">
                LOGIN <i class="fa-solid fa-right-to-bracket ms-2"></i>
            </button>

            <div class="mt-5">
                <a href="{{ route('register') }}" class="auth-footer-link">
                    Belum memiliki akses?<span> Register admin </span>
                </a>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            }
        }
    </script>
</x-guest-layout>