<x-app-layout>
    <div class="container-fluid px-4 py-5">
        <h4 class="fw-bold mb-4">🏠 Tambah Kartu Keluarga</h4>
        <div class="card border-0 shadow-lg rounded-4 p-5" style="max-width: 700px;">
            <form action="{{ route('kartukeluarga.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Nomor KK (16 Digit)</label>
                    <input type="text" name="no_kk" class="form-control form-control-lg bg-light border-0" placeholder="Masukkan 16 digit nomor KK" required maxlength="16">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Alamat Lengkap</label>
                    <textarea name="alamat" class="form-control bg-light border-0" rows="3" placeholder="Nama Jalan, No. Rumah, dsb..." required></textarea>
                </div>

                <div class="row g-4">
                    <div class="col-6">
                        <label class="form-label fw-bold small text-secondary">RT</label>
                        <input type="text" name="rt" class="form-control form-control-lg bg-light border-0" placeholder="001" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label fw-bold small text-secondary">RW</label>
                        <input type="text" name="rw" class="form-control form-control-lg bg-light border-0" placeholder="001" required>
                    </div>
                </div>

                <div class="mt-5 d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill shadow-lg fw-bold w-100">Simpan KK</button>
                    <a href="{{ route('kartukeluarga.index') }}" class="btn btn-light px-4 py-3 rounded-pill fw-bold border">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>