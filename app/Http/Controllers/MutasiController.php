<?php
namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Warga;
use Illuminate\Http\Request;

class MutasiController extends Controller {
    public function index() {
        $mutasi = Mutasi::with('warga')->latest()->get();
        return view('mutasi.index', compact('mutasi'));
    }

    public function create() {
        $warga = Warga::all(); 
        return view('mutasi.create', compact('warga'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_warga' => 'required|exists:warga,id_warga',
            'jenis_mutasi' => 'required|in:Datang,Pindah,Meninggal',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable'
        ]);

        Mutasi::create($request->all());
        return redirect()->route('mutasi.index')->with('success', 'Data mutasi berhasil disimpan!');
    }

    public function edit($id) {
        $mutasi = Mutasi::findOrFail($id);
        $warga = Warga::all(); 
        return view('mutasi.edit', compact('mutasi', 'warga'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'id_warga' => 'required|exists:warga,id_warga',
            'jenis_mutasi' => 'required|in:Datang,Pindah,Meninggal',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable'
        ]);

        $mutasi = Mutasi::findOrFail($id);
        $mutasi->update($request->all());
        return redirect()->route('mutasi.index')->with('success', 'Data mutasi berhasil diperbarui!');
    }

    public function destroy($id) {
        Mutasi::findOrFail($id)->delete();
        return redirect()->route('mutasi.index')->with('success', 'Data mutasi dihapus!');
    }
}