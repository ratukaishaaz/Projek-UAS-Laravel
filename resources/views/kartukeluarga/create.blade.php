<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-800 text-dark mb-1">Registrasi Kartu Keluarga</h3>
            <p class="text-muted small">Input data dokumen Kartu Keluarga baru ke dalam basis data sistem pusat.</p>
        </div>
        <a href="{{ route('kartukeluarga.index') }}" class="btn btn-light rounded-3 border fw-bold text-teal-primary shadow-sm">
            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-custom bg-white p-4 p-md-5">
                <form action="{{ route('kartukeluarga.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label fw-800 text-dark small text-uppercase" style="letter-spacing: 1px;">Nomor Kartu Keluarga (16 Digit)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="fa-solid fa-address-card text-teal-primary"></i></span>
                                <input type="text" name="no_kk" class="form-control form-control-lg border-0 bg-light fw-600" placeholder="Contoh: 3201xxxxxxxxxxxx" required maxlength="16">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-800 text-dark small text-uppercase" style="letter-spacing: 1px;">Alamat Domisili</label>
                            <textarea name="alamat" class="form-control border-0 bg-light rounded-4 p-3 fw-medium" rows="3" placeholder="Masukkan alamat lengkap (Nama Jalan, Kompleks, No. Rumah)..." required></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase" style="letter-spacing: 1px;">Rukun Tetangga (RT)</label>
                            <input type="text" name="rt" class="form-control form-control-lg border-0 bg-light fw-600 text-center" placeholder="001" required maxlength="3">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase" style="letter-spacing: 1px;">Rukun Warga (RW)</label>
                            <input type="text" name="rw" class="form-control form-control-lg border-0 bg-light fw-600 text-center" placeholder="001" required maxlength="3">
                        </div>
                    </div>

                    <div class="mt-5 border-top pt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-teal px-5 py-3 shadow-lg">
                            <i class="fa-solid fa-save me-2"></i>Simpan Kartu Keluarga
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>