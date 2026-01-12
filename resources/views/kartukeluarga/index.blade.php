<x-app-layout>
    <div class="container-fluid px-4 py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">📂 Database Kartu Keluarga</h4>
            <a href="{{ route('kartukeluarga.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">Tambah KK</a>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">NOMOR KK</th>
                            <th>ALAMAT</th>
                            <th class="text-center">RT/RW</th>
                            <th class="text-end pe-4">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kk as $item)
                        <tr>
                            <td class="ps-4 fw-bold text-dark">{{ $item->no_kk }}</td>
                            <td class="small">{{ $item->alamat }}</td>
                            <td class="text-center small">{{ $item->rt }} / {{ $item->rw }}</td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('kartukeluarga.edit', $item->id_kk) }}" class="btn btn-sm btn-white border shadow-sm">
                                        <i class="bi bi-pencil-square text-primary"></i>
                                    </a>
                                    <form action="{{ route('kartukeluarga.destroy', $item->id_kk) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white border shadow-sm text-danger" onclick="return confirm('Hapus KK ini?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center py-5 text-muted">Data KK masih kosong.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>