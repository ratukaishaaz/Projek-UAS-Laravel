<x-guest-layout>
    <style>
        /* CSS Base sama dengan di atas */
        .btn-logout { background: transparent !important; color: #64748b !important; border: 1px solid #334155 !important; border-radius: 12px !important; font-size: 0.8rem; padding: 8px 15px !important; }
    </style>

    <div class="auth-box text-center">
        <i class="fa-solid fa-envelope-circle-check mb-4" style="font-size: 4rem; color: var(--accent); filter: drop-shadow(0 0 20px rgba(45, 212, 191, 0.5));"></i>
        <h2 class="fw-800">Verifikasi Email</h2>
        <p style="color: #94a3b8; font-size: 0.9rem; margin-bottom: 30px; line-height: 1.6;">
            Terima kasih telah bergabung! Silakan verifikasi email Anda melalui tautan yang baru saja kami kirimkan.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success bg-success-subtle border-0 text-success small mb-4" style="border-radius: 12px;">
                Tautan verifikasi baru telah dikirimkan ke email Anda.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-glow mb-3">KIRIM ULANG EMAIL VERIFIKASI</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-logout mt-2">Log Out</button>
        </form>
    </div>
</x-guest-layout>