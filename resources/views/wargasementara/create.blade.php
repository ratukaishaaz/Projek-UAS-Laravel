<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-800 text-dark mb-1 text-uppercase">Warga Sementara</h3>
            <p class="text-muted small">Registrasi data tamu atau penduduk non-permanen.</p>
        </div>
        <a href="{{ route('wargasementara.index') }}" class="btn btn-light rounded-3 border fw-bold text-teal-primary shadow-sm">
            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-custom bg-white p-4 p-md-5">
                <form action="{{ route('wargasementara.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Nomor Identitas (NIK/Passport)</label>
                            <input type="text" name="nik" class="form-control form-control-lg border-0 bg-light fw-600 shadow-none" placeholder="Masukkan No. Identitas" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-lg border-0 bg-light fw-600 shadow-none" placeholder="Nama Lengkap Sesuai Identitas" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-800 text-dark small text-uppercase">Alamat Daerah Asal</label>
                            <textarea name="alamat_asal" class="form-control border-0 bg-light rounded-4 p-3 fw-medium" rows="2" placeholder="Masukkan alamat lengkap daerah asal..." required></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Tanggal Kedatangan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="fa-solid fa-clock-rotate-left text-teal-primary"></i></span>
                                <input type="date" name="tanggal_masuk" class="form-control form-control-lg border-0 bg-light fw-600 shadow-none" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Keperluan Kunjungan</label>
                            <input type="text" name="keterangan" class="form-control form-control-lg border-0 bg-light fw-600 shadow-none" placeholder="Contoh: Kunjungan Keluarga / Pekerjaan">
                        </div>
                    </div>

                    <div class="mt-5 border-top pt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-teal px-5 py-3 shadow-lg">
                            <i class="fa-solid fa-user-plus me-2"></i>Daftarkan Warga
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>