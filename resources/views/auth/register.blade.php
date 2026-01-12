<x-guest-layout>
    <style>
        :root { --accent: #2dd4bf; --bg: #020617; --card-bg: #0f172a; }
        body { background: var(--bg); font-family: 'Plus Jakarta Sans', sans-serif; display: flex; align-items: center; justify-content: center; min-height: 100vh; color: white; }

        .reg-box {
            width: 100%; max-width: 500px; padding: 45px;
            background: var(--card-bg);
            border-radius: 35px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
        }

        .custom-input {
            background: #1e293b !important; 
            border: 1px solid #334155 !important;
            border-radius: 16px !important; 
            color: white !important; /* Warna teks saat mengetik */
            padding: 14px 20px !important;
        }

        /* PERBAIKAN: Supaya placeholder putih dan nampak */
        .custom-input::placeholder {
            color: rgba(255, 255, 255, 0.5) !important; 
            opacity: 1;
        }

        .btn-reg {
            background: transparent !important;
            border: 2px solid var(--accent) !important;
            color: var(--accent) !important;
            font-weight: 800 !important;
            border-radius: 18px !important; padding: 16px !important;
            width: 100%; transition: 0.4s; margin-top: 25px;
            text-transform: uppercase; letter-spacing: 1px;
        }

        .btn-reg:hover {
            background: var(--accent) !important;
            color: #042f2e !important;
            box-shadow: 0 15px 30px rgba(45, 212, 191, 0.3);
            transform: translateY(-3px);
        }

        .form-label { 
            color: #94a3b8; /* Warna label sedikit lebih terang agar terbaca */
            font-weight: 700; 
            font-size: 0.65rem; 
            text-transform: uppercase; 
            margin-bottom: 10px; 
            display: block; 
            margin-left: 5px; 
        }
    </style>

    <div class="reg-box text-center">
        <h2 style="font-weight: 800; letter-spacing: -1px; margin-bottom: 10px;">Bergabunglah.</h2>
        <p style="color: #94a3b8; font-size: 0.85rem; margin-bottom: 40px;">Sistem pendataan Warga.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row text-start">
                <div class="col-12 mb-4">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control custom-input" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control custom-input" placeholder="instansi@sipendawa.id" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control custom-input" placeholder="••••••••" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control custom-input" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-reg">
                CREATE ACCOUNT <i class="fa-solid fa-user-plus ms-2"></i>
            </button>

            <div class="mt-4">
                <a href="{{ route('login') }}" style="color: #64748b; text-decoration: none; font-size: 0.85rem;">
                    Sudah memiliki akses? <span style="color: var(--accent); font-weight: 700;">Masuk Sekarang</span>
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>