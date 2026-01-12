<x-app-layout>
    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-0 text-dark">📋 Data Warga Sementara</h4>
                <p class="text-muted small">Daftar penduduk non-permanen yang terdata di sistem.</p>
            </div>
            <a href="{{ route('wargasementara.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-plus-lg me-2"></i>Tambah Warga Sementara
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
                            <th class="ps-4">NIK SEMENTARA</th>
                            <th>NAMA LENGKAP</th>
                            <th>ALAMAT ASAL</th>
                            <th>KETERANGAN</th>
                            <th>TGL MASUK</th>
                            <th class="text-end pe-4">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($warga as $item)
                        <tr>
                            <td class="ps-4 small text-secondary">{{ $item->nik_sementara }}</td>
                            <td class="fw-bold text-dark">{{ $item->nama_lengkap }}</td>
                            <td class="small">{{ Str::limit($item->alamat_asal, 30) }}</td>
                            <td>
                                <span class="badge bg-soft-info text-info rounded-pill px-3">
                                    {{ $item->keterangan ?? '-' }}
                                </span>
                            </td>
                            <td class="small">
                                {{ $item->tanggal_masuk ? \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') : '-' }}
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('wargasementara.edit', $item->id_warga_sementara) }}" class="btn btn-sm btn-white border shadow-sm">
                                        <i class="bi bi-pencil-square text-primary"></i>
                                    </a>
                                    <form action="{{ route('wargasementara.destroy', $item->id_warga_sementara) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white border shadow-sm text-danger" onclick="return confirm('Yakin hapus data ini?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted small">Belum ada data warga sementara.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>