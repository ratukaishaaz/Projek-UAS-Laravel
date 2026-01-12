<x-app-layout>
    <style>
        .form-input-custom {
            border: 2px solid #f1f3f5 !important;
            transition: all 0.3s ease;
        }
        .form-input-custom:focus {
            border-color: #0d6efd !important;
            background-color: #fff !important;
            box-shadow: 0 8px 20px rgba(13, 110, 253, 0.08) !important;
        }
        .card-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .section-title {
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #6c757d;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        .section-title::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
            margin-left: 15px;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                {{-- Header Section --}}
                <div class="d-flex align-items-center justify-content-between mb-5">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-2">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('wargasementara.index') }}" class="text-decoration-none">Warga Sementara</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </nav>
                        <h2 class="fw-bold text-dark m-0">Informasi Profil Warga</h2>
                    </div>
                    <a href="{{ route('wargasementara.index') }}" class="btn btn-outline-dark rounded-pill px-4 fw-bold">
                        <i class="bi bi-x-lg me-2"></i>Batal
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4 p-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-exclamation-octagon-fill me-2 h5 mb-0"></i>
                            <strong class="h6 mb-0">Mohon periksa kembali:</strong>
                        </div>
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card card-glass shadow-lg rounded-5 border-0">
                    <div class="card-body p-5">
                        <form action="{{ route('wargasementara.update', $warga->id_warga_sementara) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- Section 1: Domisili --}}
                            <div class="section-title">Informasi Domisili Sementara</div>
                            <div class="row mb-5">
                                <div class="col-12">
                                    <label class="form-label fw-bold small">KK Induk Penjamin</label>
                                    <select name="id_kk_induk" class="form-select form-select-lg form-input-custom bg-light rounded-4 py-3 shadow-none" required>
                                        @foreach($kk as $item)
                                            <option value="{{ $item->id_kk }}" {{ $warga->id_kk_induk == $item->id_kk ? 'selected' : '' }}>
                                                {{ $item->no_kk }} — {{ $item->alamat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Section 2: Biodata --}}
                            <div class="section-title">Identitas Pribadi</div>
                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">NIK Sementara</label>
                                    <input type="text" name="nik_sementara" class="form-control form-control-lg form-input-custom bg-light rounded-4 py-3 shadow-none" value="{{ old('nik_sementara', $warga->nik_sementara) }}" required placeholder="16 Digit NIK">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control form-control-lg form-input-custom bg-light rounded-4 py-3 shadow-none" value="{{ old('nama_lengkap', $warga->nama_lengkap) }}" required placeholder="Nama sesuai dokumen">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Jenis Kelamin</label>
                                    <div class="d-flex gap-4 pt-2">
                                        <div class="form-check custom-radio">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="L" {{ $warga->jenis_kelamin == 'L' ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="lk">Laki-laki</label>
                                        </div>
                                        <div class="form-check custom-radio">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="P" {{ $warga->jenis_kelamin == 'P' ? 'checked' : '' }}>
                                            <label class="form-check-label fw-semibold" for="pr">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Tanggal Mulai Menetap</label>
                                    <input type="date" name="tanggal_masuk" class="form-control form-control-lg form-input-custom bg-light rounded-4 py-3 shadow-none" value="{{ old('tanggal_masuk', $warga->tanggal_masuk) }}" required>
                                </div>
                            </div>

                            {{-- Section 3: Kontak & Alamat --}}
                            <div class="section-title">Kontak & Alamat Asal</div>
                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <label class="form-label fw-bold small">Alamat Lengkap Asal (Sesuai KTP)</label>
                                    <textarea name="alamat_asal" class="form-control form-input-custom bg-light rounded-4 shadow-none p-3" rows="3" required placeholder="Jl. Nama Jalan, No, RT/RW, Kec, Kota/Kab...">{{ old('alamat_asal', $warga->alamat_asal) }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Nomor WhatsApp</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0 rounded-start-4 px-3">+62</span>
                                        <input type="text" name="no_hp" class="form-control form-control-lg form-input-custom bg-light border-start-0 rounded-end-4 py-3 shadow-none" value="{{ old('no_hp', $warga->no_hp) }}" placeholder="8123456789">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">Keterangan Tambahan</label>
                                    <input type="text" name="keterangan" class="form-control form-control-lg form-input-custom bg-light rounded-4 py-3 shadow-none" value="{{ old('keterangan', $warga->keterangan) }}" placeholder="Misal: Mahasiswa, Pekerja Proyek">
                                </div>
                            </div>

                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold py-3 shadow-lg" style="letter-spacing: 1px;">
                                    SIMPAN PERUBAHAN DATA
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-5 mb-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Logo_Garuda_Pancasila_Gold.png" alt="Logo" style="height: 30px; opacity: 0.3;">
                    <p class="text-muted small mt-2 fw-semibold" style="letter-spacing: 2px;">SIPENDAWA DIGITAL SYSTEM</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>