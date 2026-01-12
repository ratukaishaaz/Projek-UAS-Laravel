<x-app-layout>
    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-0 text-dark">👥 Data Warga Utama</h4>
                <p class="text-muted small">Kelola data seluruh penduduk tetap di sistem.</p>
            </div>
            <a href="{{ route('warga.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-plus-lg me-2"></i>Tambah Warga
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4 rounded-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">NIK</th>
                            <th>NAMA LENGKAP</th>
                            <th>NO. KK</th>
                            <th>JK</th>
                            <th>STATUS</th>
                            <th class="text-end pe-4">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($warga as $item)
                        <tr>
                            <td class="ps-4 small text-secondary">{{ $item->nik }}</td>
                            <td class="fw-bold text-dark">{{ $item->nama_lengkap }}</td>
                            <td class="small">{{ $item->kartuKeluarga->no_kk ?? 'Tidak Ada KK' }}</td>
                            <td>
                                <span class="badge {{ $item->jenis_kelamin == 'L' ? 'bg-soft-primary text-primary' : 'bg-soft-danger text-danger' }} rounded-pill px-3">
                                    {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td><span class="text-muted small">{{ $item->status_dalam_keluarga }}</span></td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('warga.edit', $item->id_warga) }}" class="btn btn-sm btn-white border shadow-sm">
                                        <i class="bi bi-pencil-square text-primary"></i>
                                    </a>
                                    <form action="{{ route('warga.destroy', $item->id_warga) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white border shadow-sm text-danger" onclick="return confirm('Hapus data warga ini?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted small">Belum ada data warga utama.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>