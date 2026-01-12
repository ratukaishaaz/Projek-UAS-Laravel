<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WargaController extends Controller {
    
    public function index() {
        $warga = Warga::with('kartuKeluarga')->get();
        return view('warga.index', compact('warga'));
    }

    public function create() {
        $kk = KartuKeluarga::all();
        return view('warga.create', compact('kk'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nik' => 'required|digits:16|unique:warga,nik',
            'nama_lengkap' => 'required|string|max:100', // Sesuai SQL: nama_lengkap
            'id_kk' => 'required|exists:kartu_keluarga,id_kk', // PK adalah id_kk
            'jenis_kelamin' => 'required|in:L,P', // Sesuai SQL: L atau P
            'tanggal_lahir' => 'required|date',
            'status_dalam_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Lainnya'
        ]);

        Warga::create($data);
        return redirect()->route('warga.index')->with('success', 'Data warga berhasil disimpan!');
    }

    public function edit($id) {
        $warga = Warga::findOrFail($id);
        $kk = KartuKeluarga::all();
        return view('warga.edit', compact('warga', 'kk'));
    }

    public function update(Request $request, $id) {
        $warga = Warga::findOrFail($id);

        $data = $request->validate([
            'nik' => ['required', 'digits:16', Rule::unique('warga')->ignore($warga->id_warga, 'id_warga')],
            'nama_lengkap' => 'required|string|max:100',
            'id_kk' => 'required|exists:kartu_keluarga,id_kk',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'status_dalam_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Lainnya'
        ]);

        $warga->update($data);
        return redirect()->route('warga.index')->with('success', 'Data warga diperbarui!');
    }

    public function destroy($id) {
        Warga::findOrFail($id)->delete();
        return redirect()->route('warga.index')->with('success', 'Data warga dihapus!');
    }
}