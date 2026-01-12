<x-app-layout>
    <div class="container-fluid px-4 py-5">
        <h4 class="fw-bold text-dark mb-4 text-center">🔄 Input Mutasi Warga</h4>

        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
                <ul class="mb-0 fw-bold">
                    @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-lg rounded-4 p-5 mx-auto" style="max-width: 700px;">
            <form action="{{ route('mutasi.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Pilih Warga</label>
                    <select name="id_warga" class="form-select form-select-lg bg-light border-0" required>
                        <option value="" disabled selected>-- Pilih NIK / Nama --</option>
                        @foreach($warga as $item)
                            <option value="{{ $item->id_warga }}">{{ $item->nik }} - {{ $item->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Jenis Mutasi</label>
                        <select name="jenis_mutasi" class="form-select form-select-lg bg-light border-0" required>
                            <option value="Datang">Datang</option>
                            <option value="Pindah">Pindah</option>
                            <option value="Meninggal">Meninggal</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Tanggal Mutasi</label>
                        <input type="date" name="tanggal_mutasi" class="form-control form-control-lg bg-light border-0" required>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="form-label fw-bold small text-secondary">Keterangan</label>
                    <textarea name="keterangan" class="form-control bg-light border-0" rows="3" placeholder="Contoh: Pindah ke alamat baru..."></textarea>
                </div>

                <div class="mt-5 d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill shadow-lg fw-bold w-100">Simpan Mutasi</button>
                    <a href="{{ route('mutasi.index') }}" class="btn btn-light px-4 py-3 rounded-pill fw-bold border">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>