<x-app-layout>
    <div class="container-fluid px-4 py-5">
        <h4 class="fw-bold mb-4">Registrasi Warga Utama</h4>

        @if ($errors->any())
            <div class="alert alert-danger rounded-4 shadow-sm mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-lg rounded-4 p-5">
            <form action="{{ route('warga.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">NIK (16 Digit)</label>
                        <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required maxlength="16">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Pilih No. KK</label>
                        <select name="id_kk" class="form-select form-select-lg bg-light border-0" required>
                            <option value="" disabled selected>-- Pilih KK --</option>
                            @foreach($kk as $item)
                                <option value="{{ $item->id_kk }}" {{ old('id_kk') == $item->id_kk ? 'selected' : '' }}>
                                    {{ $item->no_kk }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status Keluarga</label>
                        <select name="status_dalam_keluarga" class="form-select" required>
                            <option value="Kepala Keluarga" {{ old('status_dalam_keluarga') == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                            <option value="Istri" {{ old('status_dalam_keluarga') == 'Istri' ? 'selected' : '' }}>Istri</option>
                            <option value="Anak" {{ old('status_dalam_keluarga') == 'Anak' ? 'selected' : '' }}>Anak</option>
                            <option value="Lainnya" {{ old('status_dalam_keluarga') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="mt-5 d-flex gap-3">
                    <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill shadow fw-bold">Simpan Data</button>
                    <a href="{{ route('warga.index') }}" class="btn btn-light px-5 py-3 rounded-pill">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>