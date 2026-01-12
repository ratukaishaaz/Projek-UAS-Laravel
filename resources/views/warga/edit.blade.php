<x-app-layout>
    <div class="container-fluid px-4 py-5" style="background: #f8f9fa;">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <h4 class="fw-bold mb-4 text-dark text-center">✏️ Edit Data Warga Utama</h4>
                
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
                    <form action="{{ route('warga.update', $warga->id_warga) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-secondary">Nomor NIK</label>
                                <input type="text" name="nik" class="form-control form-control-lg bg-light border-0" value="{{ old('nik', $warga->nik) }}" required maxlength="16">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-secondary">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control form-control-lg bg-light border-0" value="{{ old('nama_lengkap', $warga->nama_lengkap) }}" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-bold small text-secondary">Kartu Keluarga (KK)</label>
                                <select name="id_kk" class="form-select form-select-lg bg-light border-0" required>
                                    @foreach($kk as $item)
                                        <option value="{{ $item->id_kk }}" {{ $warga->id_kk == $item->id_kk ? 'selected' : '' }}>
                                            {{ $item->no_kk }} - {{ $item->kepala_keluarga }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-secondary">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control form-control-lg bg-light border-0" value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-secondary">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select form-select-lg bg-light border-0" required>
                                    <option value="L" {{ $warga->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $warga->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-secondary">Status Dalam Keluarga</label>
                                <select name="status_dalam_keluarga" class="form-select form-select-lg bg-light border-0" required>
                                    <option value="Kepala Keluarga" {{ $warga->status_dalam_keluarga == 'Kepala Keluarga' ? 'selected' : '' }}>Kepala Keluarga</option>
                                    <option value="Istri" {{ $warga->status_dalam_keluarga == 'Istri' ? 'selected' : '' }}>Istri</option>
                                    <option value="Anak" {{ $warga->status_dalam_keluarga == 'Anak' ? 'selected' : '' }}>Anak</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-5 d-flex gap-3">
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill shadow-lg fw-bold">Update Data</button>
                            <a href="{{ route('warga.index') }}" class="btn btn-light px-5 py-3 rounded-pill fw-bold">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>