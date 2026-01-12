<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model {
    protected $table = 'warga';
    
    // SESUAI SQL: Primary key-nya adalah id_warga
    protected $primaryKey = 'id_warga'; 

    protected $fillable = [
        'id_kk', 
        'nik', 
        'nama_lengkap', // SESUAI SQL: Bukan 'nama'
        'jenis_kelamin', 
        'tempat_lahir',
        'tanggal_lahir', 
        'agama',
        'pekerjaan',
        'status_perkawinan',
        'status_dalam_keluarga'
    ];

    public function kartuKeluarga() {
        // Foreign key di tabel warga adalah id_kk
        // Primary key di tabel kartu_keluarga adalah id_kk
        return $this->belongsTo(KartuKeluarga::class, 'id_kk', 'id_kk');
    }
}