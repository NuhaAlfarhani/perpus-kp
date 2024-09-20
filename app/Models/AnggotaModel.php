<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table        = "anggota";
    public $incrementing    = false;
    protected $primaryKey   = "nis";
    protected $fillable     = ['nis','nama_anggota','kelas'];
}