<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model {
    protected $table = 'mutasi';
    protected $primaryKey = 'id_mutasi'; // Sesuaikan dengan DB
    
    protected $fillable = [
        'id_warga', // Disamakan dengan Controller & Form
        'jenis_mutasi', 
        'tanggal_mutasi', 
        'keterangan'
    ];
    
    public function warga() {
        // Relasi ke model Warga menggunakan id_warga
        return $this->belongsTo(Warga::class, 'id_warga', 'id_warga');
    }
}