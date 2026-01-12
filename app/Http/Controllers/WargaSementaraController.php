<?php

namespace App\Http\Controllers; // Pastikan baris ini ada di baris 3!

use App\Models\WargaSementara;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class WargaSementaraController extends Controller {
    
    public function index() {
        $warga = WargaSementara::latest()->get();
        return view('wargasementara.index', compact('warga'));
    }

    public function create() {
        $kk = KartuKeluarga::all();
        return view('wargasementara.create', compact('kk'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'id_kk_induk' => 'required|exists:kartu_keluarga,id_kk',
            'nik_sementara' => 'required|digits:16|unique:warga_sementara,nik_sementara',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_masuk' => 'required|date',
            'alamat_asal' => 'required|string',
            'no_hp' => 'nullable|string|max:15',
            'keterangan' => 'nullable|string'
        ]);

        WargaSementara::create($data);
        return redirect()->route('wargasementara.index')->with('success', 'Warga sementara berhasil disimpan!');
    }

    public function edit($id) {
        // Laravel akan mencari berdasarkan id_warga_sementara otomatis
        $warga = WargaSementara::findOrFail($id);
        $kk = KartuKeluarga::all();
        return view('wargasementara.edit', compact('warga', 'kk'));
    }

    public function update(Request $request, $id) {
        $warga = WargaSementara::findOrFail($id);

        $data = $request->validate([
            'id_kk_induk' => 'required|exists:kartu_keluarga,id_kk',
            'nik_sementara' => 'required|digits:16|unique:warga_sementara,nik_sementara,' . $id . ',id_warga_sementara',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_masuk' => 'required|date',
            'alamat_asal' => 'required|string',
            'no_hp' => 'nullable|string|max:15',
            'keterangan' => 'nullable|string'
        ]);

        $warga->update($data);
        return redirect()->route('wargasementara.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id) {
        WargaSementara::findOrFail($id)->delete();
        return redirect()->route('wargasementara.index')->with('success', 'Data berhasil dihapus!');
    }
}