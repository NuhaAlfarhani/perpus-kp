<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;
    protected $table        = "pinjam";
    protected $primaryKey   = "id_pinjam";
    protected $fillable     = ['id_petugas','nis','kode_buku'];

    //relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'id_petugas');
    }

    //relasi ke siswa
    public function anggota()
    {
        return $this->belongsTo('App\Models\AnggotaModel', 'nis');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'kode_buku');
    }
}