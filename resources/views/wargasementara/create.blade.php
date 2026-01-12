<x-app-layout>
    <div class="container-fluid px-4 py-5" style="background: #f8f9fa;">
        <h4 class="fw-bold mb-4 text-dark">✨ Registrasi Warga Sementara</h4>
        
        @if ($errors->any())
            <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
                <ul class="mb-0 fw-bold">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-lg rounded-4 p-5 bg-white">
            <form action="{{ route('wargasementara.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Nomor NIK</label>
                        <input type="text" name="nik_sementara" class="form-control form-control-lg bg-light border-0" value="{{ old('nik_sementara') }}" required maxlength="16">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control form-control-lg bg-light border-0" value="{{ old('nama_lengkap') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Pilih KK Induk</label>
                        <select name="id_kk_induk" class="form-select form-select-lg bg-light border-0" required>
                            <option value="" disabled selected>-- Pilih KK --</option>
                            @foreach($kk as $item)
                                <option value="{{ $item->id_kk }}" {{ old('id_kk_induk') == $item->id_kk ? 'selected' : '' }}>
                                    {{ $item->no_kk }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select form-select-lg bg-light border-0" required>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control form-control-lg bg-light border-0" value="{{ old('no_hp') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold small text-secondary">Tanggal Datang</label>
                        <input type="date" name="tanggal_masuk" class="form-control form-control-lg bg-light border-0" value="{{ old('tanggal_masuk') }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold small text-secondary">Alamat Asal</label>
                        <textarea name="alamat_asal" class="form-control bg-light border-0" rows="3" required>{{ old('alamat_asal') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold small text-secondary">Keterangan</label>
                        <textarea name="keterangan" class="form-control bg-light border-0" rows="2">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="mt-5 d-flex gap-3">
                    <button type="submit" class="btn btn-dark px-5 py-3 rounded-pill shadow-lg fw-bold">Simpan Data Sementara</button>
                    <a href="{{ route('wargasementara.index') }}" class="btn btn-light px-5 py-3 rounded-pill fw-bold">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>