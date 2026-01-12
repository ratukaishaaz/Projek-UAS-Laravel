<x-guest-layout>
    <div class="auth-box text-center">
        <i class="fa-solid fa-key mb-4" style="font-size: 3.5rem; color: var(--accent);"></i>
        <h2 class="fw-800">Lupa Sandi?</h2>
        <p style="color: #94a3b8; font-size: 0.85rem; margin-bottom: 30px;">Jangan khawatir, masukkan email Anda dan kami akan mengirimkan tautan pemulihan.</p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="text-start mb-4">
                <label class="form-label small fw-bold text-white-50">EMAIL ADDRESS</label>
                <input type="email" name="email" class="form-control custom-input" placeholder="admin@sipendawa.id" required autofocus>
            </div>

            <button type="submit" class="btn btn-glow">KIRIM LINK PEMULIHAN</button>
            
            <div class="mt-4">
                <a href="{{ route('login') }}" style="color: #64748b; text-decoration: none; font-size: 0.85rem;">Kembali ke <span style="color: var(--accent);">Login</span></a>
            </div>
        </form>
    </div>
</x-guest-layout>