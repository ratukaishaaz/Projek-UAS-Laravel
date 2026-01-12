<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\KartuKeluarga;
use App\Models\WargaSementara;
use App\Models\Mutasi;
use App\Models\User;

class DashboardController extends Controller {
    public function index() {
        // Mengirimkan variabel secara individual agar tidak "Undefined"
        return view('dashboard', [
            'total_kk'              => KartuKeluarga::count(),
            'total_penduduk'        => Warga::count(),
            'total_warga_sementara' => WargaSementara::count(),
            'total_mutasi'          => Mutasi::count(),
            'total_admin'           => User::count(),
            'recentWarga'           => Warga::latest()->take(5)->get(),
        ]);
    }
}