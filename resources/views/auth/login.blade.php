<x-guest-layout>
    <style>
        /* Styling khusus input agar terlihat modern dan konsisten */
        .form-group { margin-bottom: 25px; text-align: left; }
        
        .form-label { 
            color: #94a3b8; /* Diperjelas sedikit dari warna sebelumnya */
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
            border-radius: 18px !important;
            padding: 15px 22px !important;
            color: white !important; /* Warna ketikan dipastikan putih */
            transition: 0.3s ease;
        }

        /* PERBAIKAN: Agar placeholder nampak jelas (Putih Transparan) */
        .custom-input::placeholder {
            color: rgba(255, 255, 255, 0.4) !important;
            opacity: 1;
        }

        .custom-input:focus {
            border-color: #2dd4bf !important;
            box-shadow: 0 0 0 5px rgba(45, 212, 191, 0.15) !important;
            background: rgba(30, 41, 59, 0.8) !important;
        }

        /* Tombol Akses Utama dengan efek Glow Teal */
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

        /* Custom Checkbox agar tidak default biru */
        .form-check-input:checked {
            background-color: #0d9488 !important;
            border-color: #2dd4bf !important;
        }
    </style>

    <div class="text-center">
        <p class="text-white-50 small mb-5" style="letter-spacing: 3px; text-transform: uppercase;">
            <i class="fa-solid fa-shield-halved me-2"></i> Area Akses Terbatas
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control custom-input" 
                       placeholder="Masukkan email resmi Anda" required autofocus>
            </div>

            <div class="form-group">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label mb-0">Kata Sandi</label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="small text-decoration-none" style="color: #2dd4bf; font-size: 0.65rem; font-weight: 700;">LUPA?</a>
                    @endif
                </div>
                <input type="password" name="password" class="form-control custom-input" 
                       placeholder="••••••••" required>
            </div>

            <div class="form-check text-start mb-4 ms-1">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me" style="background-color: #1e293b; border-color: #334155;">
                <label class="form-check-label small text-white-50" for="remember_me">
                    Biarkan saya tetap masuk
                </label>
            </div>

            <button type="submit" class="btn btn-glow">
                AKSES DASHBOARD <i class="fa-solid fa-right-to-bracket ms-2"></i>
            </button>

            <div class="mt-5">
                <a href="{{ route('register') }}" class="auth-footer-link">
                    Belum memiliki akses? <span>Registrasi Admin</span>
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>