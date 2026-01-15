<x-app-layout>
    <div class="container-fluid px-4 py-4">

        <div class="mb-4">
            <h3 class="fw-800 text-dark mb-1">Ringkasan Sistem</h3>
            <p class="text-muted small">
                Kelola seluruh data kependudukan dalam satu panel terintegrasi.
            </p>
        </div>

        <div class="row g-4 mb-5">

            <!-- KARTU KELUARGA -->
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('kartukeluarga.index') }}" class="text-decoration-none">
                    <div class="card card-menu border-0 shadow-sm rounded-4 p-4 text-white h-100 d-flex flex-column"
                         style="background: linear-gradient(45deg, #0d9488, #2dd4bf);">

                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="small fw-bold opacity-75 mb-1">KARTU KELUARGA</div>
                                <h2 class="fw-800 mb-0">{{ $total_kk }}</h2>
                            </div>
                            <div class="icon-box shadow-sm">
                                <i class="bi bi-file-earmark-text-fill fs-4"></i>
                            </div>
                        </div>

                        <div class="mt-auto small fw-600 opacity-75">
                            Lihat Semua Data <i class="bi bi-chevron-right ms-1"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- WARGA UTAMA -->
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('warga.index') }}" class="text-decoration-none">
                    <div class="card card-menu border-0 shadow-sm rounded-4 p-4 text-white h-100 d-flex flex-column"
                         style="background: linear-gradient(45deg, #059669, #10b981);">

                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="small fw-bold opacity-75 mb-1">WARGA UTAMA</div>
                                <h2 class="fw-800 mb-0">{{ $total_penduduk }}</h2>
                            </div>
                            <div class="icon-box shadow-sm">
                                <i class="bi bi-arrow-left-right fs-4"></i>
                            </div>
                        </div>

                        <div class="mt-auto small fw-600 opacity-75">
                            Kelola Penduduk <i class="bi bi-chevron-right ms-1"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- MUTASI WARGA -->
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('mutasi.index') }}" class="text-decoration-none">
                    <div class="card card-menu border-0 shadow-sm rounded-4 p-4 text-white h-100 d-flex flex-column"
                         style="background: linear-gradient(45deg, #0284c7, #38bdf8);">

                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="small fw-bold opacity-75 mb-1">MUTASI WARGA</div>
                                <h2 class="fw-800 mb-0">{{ $total_mutasi }}</h2>
                            </div>
                            <div class="icon-box shadow-sm">
                                <i class="bi bi-arrow-left-right fs-4"></i>
                            </div>
                        </div>

                        <div class="mt-auto small fw-600 opacity-75">
                            Cek Perpindahan <i class="bi bi-chevron-right ms-1"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- WARGA SEMENTARA -->
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('wargasementara.index') }}" class="text-decoration-none">
                    <div class="card card-menu border-0 shadow-sm rounded-4 p-4 text-white h-100 d-flex flex-column"
                         style="background: linear-gradient(45deg, #4f46e5, #818cf8);">

                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="small fw-bold opacity-75 mb-1">WARGA SEMENTARA</div>
                                <h2 class="fw-800 mb-0">{{ $total_warga_sementara }}</h2>
                            </div>
                            <div class="icon-box shadow-sm">
                                <i class="bi bi-person-vcard fs-4"></i>
                            </div>
                        </div>

                        <div class="mt-auto small fw-600 opacity-75">
                            Lihat Data Tamu <i class="bi bi-chevron-right ms-1"></i>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        <!-- TABLE -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 px-4 border-0">
                <h6 class="fw-800 text-dark mb-0">Penduduk Baru Terdaftar</h6>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small">
                        <tr>
                            <th class="ps-4">NIK</th>
                            <th>NAMA LENGKAP</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentWarga as $rw)
                        <tr>
                            <td class="ps-4 text-muted">{{ $rw->nik }}</td>
                            <td class="fw-bold">{{ $rw->nama_lengkap }}</td>
                            <td>
                                <span class="badge bg-soft-teal text-teal-primary rounded-pill px-3">
                                    {{ $rw->status_dalam_keluarga }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Data belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <style>
        .fw-800 { font-weight: 800; }
        .fw-600 { font-weight: 600; }

        .bg-soft-teal { background-color: #e0f2f1; }
        .text-teal-primary { color: #00897b; }

        .card-menu {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card-menu:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.1) !important;
        }

        .icon-box {
            background: rgba(255, 255, 255, 0.2);
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }
    </style>
</x-app-layout>
