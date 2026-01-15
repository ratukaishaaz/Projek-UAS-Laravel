<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-800 text-dark mb-1">Registrasi Penduduk Tetap</h3>
            <p class="text-muted small">Pastikan NIK dan data lainnya sudah sesuai dengan dokumen KTP-el.</p>
        </div>
        <a href="{{ route('warga.index') }}" class="btn btn-light rounded-3 border fw-bold text-teal-primary shadow-sm">
            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card card-custom bg-white p-4 p-md-5">
                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">NIK (Nomor Induk Kependudukan)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="fa-solid fa-id-card text-teal-primary"></i></span>
                                <input type="text" name="nik" class="form-control form-control-lg border-0 bg-light fw-600" placeholder="16 digit NIK" required maxlength="16">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control form-control-lg border-0 bg-light fw-600" placeholder="Sesuai KTP" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Hubungkan Ke Kartu Keluarga</label>
                            <select name="id_kk" class="form-select form-select-lg border-0 bg-light fw-600 text-teal-primary shadow-none" required>
                                <option value="" disabled selected>-- Pilih Nomor KK --</option>
                                @foreach($kk as $k)
                                    <option value="{{ $k->id_kk }}">{{ $k->no_kk }} - {{ $k->alamat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Jenis Kelamin</label>
                            <div class="d-flex gap-4 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="L" checked>
                                    <label class="form-check-label fw-600" for="L">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="P">
                                    <label class="form-check-label fw-600" for="P">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Status Dalam Keluarga</label>
                            <select name="status_dalam_keluarga" class="form-select form-select-lg border-0 bg-light fw-600 shadow-none" required>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                                <option value="Anggota Lain">Anggota Lain</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control form-control-lg border-0 bg-light fw-600 shadow-none" required>
                        </div>
                    </div>

                    <div class="mt-5 border-top pt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-teal px-5 py-3 shadow-lg">
                            <i class="fa-solid fa-user-check me-2"></i>Verifikasi & Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>