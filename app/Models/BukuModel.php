<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table        = "buku";
    public $incrementing    = false;
    protected $primaryKey   = "kode_buku";
    protected $fillable     = ['kode_buku','judul','pengarang','kategori'];
}