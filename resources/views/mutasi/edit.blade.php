<x-app-layout>
    <div class="container-fluid px-4 py-5" style="background: #f8f9fa; min-height: 100vh;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-warning text-white p-3 rounded-4 shadow-sm me-3">
                        <i class="bi bi-pencil-square fs-4"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-dark mb-0">Edit Data Mutasi</h4>
                        <p class="text-muted small mb-0">Perbarui riwayat perpindahan atau status warga.</p>
                    </div>
                </div>

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
                    <form action="{{ route('mutasi.update', $mutasi->id_mutasi) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-secondary">Nama Warga (Tetap)</label>
                            <select name="id_warga" class="form-select form-select-lg bg-light border-0" required>
                                @foreach($warga as $item)
                                    <option value="{{ $item->id_warga }}" {{ $mutasi->id_warga == $item->id_warga ? 'selected' : '' }}>
                                        {{ $item->nik }} - {{ $item->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-secondary">Jenis Mutasi</label>
                                <select name="jenis_mutasi" class="form-select form-select-lg bg-light border-0" required>
                                    <option value="Datang" {{ $mutasi->jenis_mutasi == 'Datang' ? 'selected' : '' }}>Datang</option>
                                    <option value="Pindah" {{ $mutasi->jenis_mutasi == 'Pindah' ? 'selected' : '' }}>Pindah</option>
                                    <option value="Meninggal" {{ $mutasi->jenis_mutasi == 'Meninggal' ? 'selected' : '' }}>Meninggal</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-secondary">Tanggal Mutasi</label>
                                <input type="date" name="tanggal_mutasi" class="form-control form-control-lg bg-light border-0" value="{{ old('tanggal_mutasi', $mutasi->tanggal_mutasi) }}" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="form-label fw-bold small text-secondary">Keterangan</label>
                            <textarea name="keterangan" class="form-control bg-light border-0" rows="3" placeholder="Alasan pindah, lokasi tujuan, dsb...">{{ old('keterangan', $mutasi->keterangan) }}</textarea>
                        </div>

                        <div class="mt-5 d-flex gap-3">
                            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill shadow-lg fw-bold">
                                <i class="bi bi-save me-2"></i>Update Mutasi
                            </button>
                            <a href="{{ route('mutasi.index') }}" class="btn btn-light px-5 py-3 rounded-pill fw-bold border">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>