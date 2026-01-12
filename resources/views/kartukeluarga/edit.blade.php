<x-app-layout>
    <div class="container-fluid px-4 py-5">
        <h4 class="fw-bold mb-4 text-center">✏️ Edit Kartu Keluarga</h4>
        
        <div class="card border-0 shadow-lg rounded-4 p-5 mx-auto" style="max-width: 700px;">
            
            @if ($errors->any())
                <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
                    <ul class="mb-0 fw-bold small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kartukeluarga.update', $kk->id_kk) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Nomor KK</label>
                    <input type="text" name="no_kk" class="form-control form-control-lg bg-light border-0" value="{{ old('no_kk', $kk->no_kk) }}" required maxlength="16">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Alamat</label>
                    <textarea name="alamat" class="form-control bg-light border-0" rows="3" required>{{ old('alamat', $kk->alamat) }}</textarea>
                </div>

                <div class="row g-4">
                    <div class="col-6">
                        <label class="form-label fw-bold small text-secondary">RT</label>
                        <input type="text" name="rt" class="form-control form-control-lg bg-light border-0" value="{{ old('rt', $kk->rt) }}" required maxlength="3">
                    </div>
                    <div class="col-6">
                        <label class="form-label fw-bold small text-secondary">RW</label>
                        <input type="text" name="rw" class="form-control form-control-lg bg-light border-0" value="{{ old('rw', $kk->rw) }}" required maxlength="3">
                    </div>
                </div>

                <div class="mt-5 d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill shadow-lg fw-bold w-100">Update Perubahan</button>
                    <a href="{{ route('kartukeluarga.index') }}" class="btn btn-light px-4 py-3 rounded-pill fw-bold border">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>