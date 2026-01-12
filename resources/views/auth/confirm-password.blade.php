<x-guest-layout>
    <style>
        :root { --accent: #2dd4bf; --bg: #020617; --card-bg: #0f172a; }
        body { background: var(--bg); font-family: 'Plus Jakarta Sans', sans-serif; display: flex; align-items: center; justify-content: center; min-height: 100vh; color: white; }
        .auth-box { width: 100%; max-width: 420px; padding: 40px; background: var(--card-bg); border: 1px solid rgba(255,255,255,0.05); border-radius: 32px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); }
        .custom-input { background: #1e293b !important; border: 1px solid #334155 !important; border-radius: 16px !important; color: white !important; padding: 14px 20px !important; }
        .btn-glow { background: var(--accent) !important; color: #042f2e !important; font-weight: 800 !important; border-radius: 16px !important; padding: 16px !important; width: 100%; border: none; transition: 0.4s; margin-top: 20px; }
    </style>

    <div class="auth-box text-center">
        <i class="fa-solid fa-user-shield mb-4" style="font-size: 3rem; color: var(--accent); filter: drop-shadow(0 0 15px rgba(45, 212, 191, 0.4));"></i>
        <h2 class="fw-800">Konfirmasi Akses</h2>
        <p style="color: #94a3b8; font-size: 0.85rem; margin-bottom: 30px;">Ini adalah area aman. Harap konfirmasi password Anda sebelum melanjutkan.</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="text-start mb-3">
                <label class="small fw-bold text-white-50 ms-2 mb-2">PASSWORD</label>
                <input type="password" name="password" class="form-control custom-input" placeholder="••••••••" required autocomplete="current-password">
            </div>

            <button type="submit" class="btn btn-glow">KONFIRMASI PASSWORD</button>
        </form>
    </div>
</x-guest-layout>