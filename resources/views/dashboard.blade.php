<x-app-layout>
    <div class="container-fluid px-4 py-5" style="background: #f8f9fa;">
        <h2 class="fw-bold text-dark mb-4">Ringkasan Sistem ✨</h2>
        
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4" style="background: linear-gradient(45deg, #2c3e50, #4ca1af);">
                    <div class="card-body p-4 text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-white-50 small fw-bold">TOTAL WARGA</h6>
                                <h2 class="fw-bold mb-0">{{ $total_penduduk }}</h2>
                            </div>
                            <i class="bi bi-people fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4" style="background: linear-gradient(45deg, #11998e, #38ef7d);">
                    <div class="card-body p-4 text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-white-50 small fw-bold">TOTAL KK</h6>
                                <h2 class="fw-bold mb-0">{{ $total_kk }}</h2>
                            </div>
                            <i class="bi bi-card-list fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4">
                <h5 class="fw-bold mb-0">Penduduk Terbaru</h5>
            </div>
            <div class="table-responsive p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">NIK</th>
                            <th>NAMA</th>
                            <th>NO. KK</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentWarga as $warga)
                        <tr>
                            <td class="ps-4 small text-secondary">{{ $warga->nik }}</td>
                            <td class="fw-bold">{{ $warga->nama_lengkap }}</td>
                            <td>{{ $warga->kartuKeluarga->no_kk ?? '-' }}</td>
                            <td><span class="badge bg-primary text-white rounded-pill px-3">{{ $warga->status_dalam_keluarga }}</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center p-5 text-muted">Belum ada data penduduk</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>