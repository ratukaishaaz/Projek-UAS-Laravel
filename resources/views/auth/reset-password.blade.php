<x-guest-layout>
    <div class="auth-box text-center">
        <h2 class="fw-800 mb-2">Update Password</h2>
        <p style="color: #94a3b8; font-size: 0.85rem; margin-bottom: 35px;">Silakan buat password baru yang lebih kuat.</p>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
            <div class="text-start mb-3">
                <label class="form-label small fw-bold text-white-50">EMAIL</label>
                <input type="email" name="email" class="form-control custom-input" value="{{ old('email', $request->email) }}" required readonly>
            </div>

            <div class="text-start mb-3">
                <label class="form-label small fw-bold text-white-50">PASSWORD BARU</label>
                <input type="password" name="password" class="form-control custom-input" placeholder="••••••••" required autofocus>
            </div>

            <div class="text-start mb-4">
                <label class="form-label small fw-bold text-white-50">KONFIRMASI PASSWORD</label>
                <input type="password" name="password_confirmation" class="form-control custom-input" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-glow">RESET PASSWORD</button>
        </form>
    </div>
</x-guest-layout>