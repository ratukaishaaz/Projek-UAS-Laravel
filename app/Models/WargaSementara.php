<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaSementara extends Model
{
    use HasFactory;

    // WAJIB: Karena di SQL lu nama tabelnya 'warga_sementara'
    protected $table = 'warga_sementara'; 

    // WAJIB: Karena di SQL lu primary key-nya bukan 'id'
    protected $primaryKey = 'id_warga_sementara'; 

    // WAJIB: Agar data bisa masuk lewat WargaSementara::create()
    protected $fillable = [
        'id_kk_induk',
        'nik_sementara',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_masuk',
        'alamat_asal',
        'no_hp',
        'keterangan'
    ];
}