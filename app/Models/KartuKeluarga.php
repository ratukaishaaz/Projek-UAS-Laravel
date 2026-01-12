<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model {
    protected $table = 'kartu_keluarga'; //
    protected $primaryKey = 'id_kk'; //

    protected $fillable = [
        'no_kk', 
        'alamat', 
        'rt', 
        'rw',
        'tanggal_buat' // Tambahkan ini agar bisa diisi via form
    ];

    public function warga() {
        // Relasi One-to-Many ke tabel Warga
        return $this->hasMany(Warga::class, 'id_kk', 'id_kk');
    }
}