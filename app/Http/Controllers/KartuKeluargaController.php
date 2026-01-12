<?php
namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller {
    public function index() {
        $kk = KartuKeluarga::all();
        return view('kartukeluarga.index', compact('kk'));
    }

    public function create() {
        return view('kartukeluarga.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'no_kk' => 'required|digits:16|unique:kartu_keluarga,no_kk',
            'alamat' => 'required',
            'rt' => 'required|max:3',
            'rw' => 'required|max:3',
        ]);

        KartuKeluarga::create($data);
        return redirect()->route('kartukeluarga.index')->with('success', 'Data KK berhasil disimpan!');
    }

    public function edit($id) {
        $kk = KartuKeluarga::findOrFail($id);
        return view('kartukeluarga.edit', compact('kk'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'no_kk' => 'required|digits:16|unique:kartu_keluarga,no_kk,'.$id.',id_kk',
            'alamat' => 'required',
            'rt' => 'required|max:3',
            'rw' => 'required|max:3'
        ]);

        $kk = KartuKeluarga::findOrFail($id);
        $kk->update($data);
        return redirect()->route('kartukeluarga.index')->with('success', 'Data KK berhasil diperbarui!');
    }

    public function destroy($id) {
        KartuKeluarga::findOrFail($id)->delete();
        return redirect()->route('kartukeluarga.index')->with('success', 'Data KK dihapus!');
    }
}