<x-app-layout>
    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">📋 Riwayat Mutasi</h4>
            <a href="{{ route('mutasi.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">Tambah Mutasi</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">NAMA WARGA</th>
                            <th>JENIS MUTASI</th>
                            <th>TANGGAL</th>
                            <th>KETERANGAN</th>
                            <th class="text-end pe-4">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mutasi as $item)
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold">{{ $item->warga->nama_lengkap ?? 'Warga Dihapus' }}</div>
                                <div class="small text-muted">{{ $item->warga->nik ?? '-' }}</div>
                            </td>
                            <td><span class="badge bg-soft-info text-info rounded-pill px-3">{{ $item->jenis_mutasi }}</span></td>
                            <td class="small">{{ \Carbon\Carbon::parse($item->tanggal_mutasi)->format('d M Y') }}</td>
                            <td class="small text-truncate" style="max-width: 200px;">{{ $item->keterangan }}</td>
                            <td class="text-end pe-4">
                                <a href="{{ route('mutasi.edit', $item->id_mutasi) }}" class="btn btn-sm btn-white border"><i class="bi bi-pencil text-primary"></i></a>
                                <form action="{{ route('mutasi.destroy', $item->id_mutasi) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-white border text-danger" onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center py-5 text-muted">Belum ada data mutasi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>