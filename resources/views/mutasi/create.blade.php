<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-800 text-dark mb-1 text-uppercase">Pencatatan Mutasi</h3>
            <p class="text-muted small">Input data perpindahan penduduk (Datang, Pindah, atau Meninggal).</p>
        </div>
        <a href="{{ route('mutasi.index') }}" class="btn btn-light rounded-3 border fw-bold text-teal-primary shadow-sm">
            <i class="fa-solid fa-arrow-left me-2"></i>Kembali
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card card-custom bg-white p-4 p-md-5 shadow-sm">
                <form action="{{ route('mutasi.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label fw-800 text-dark small text-uppercase">Subjek Warga</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="fa-solid fa-user-tag text-teal-primary"></i></span>
                                <select name="id_warga" class="form-select form-select-lg border-0 bg-light fw-600 shadow-none" required>
                                    <option value="" disabled selected>-- Pilih NIK / Nama --</option>
                                    @foreach($warga as $item)
                                        <option value="{{ $item->id_warga }}">{{ $item->nik }} - {{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Kategori Mutasi</label>
                            <select name="jenis_mutasi" class="form-select form-select-lg border-0 bg-light fw-600 shadow-none" required>
                                <option value="Datang">Kedatangan (Datang)</option>
                                <option value="Pindah">Perpindahan (Keluar)</option>
                                <option value="Meninggal">Kematian (Meninggal)</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-800 text-dark small text-uppercase">Tanggal Mutasi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="fa-solid fa-calendar-day text-teal-primary"></i></span>
                                <input type="date" name="tanggal_mutasi" class="form-control form-control-lg border-0 bg-light fw-600 shadow-none" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-800 text-dark small text-uppercase">Catatan Keterangan</label>
                            <textarea name="keterangan" class="form-control border-0 bg-light rounded-4 p-3 fw-medium" rows="4" placeholder="Alasan pindah, lokasi baru, atau keterangan lainnya..."></textarea>
                        </div>
                    </div>

                    <div class="mt-5 border-top pt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-teal px-5 py-3 shadow-lg">
                            <i class="fa-solid fa-paper-plane me-2"></i>Simpan Mutasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>