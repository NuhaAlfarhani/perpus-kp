<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model BukuModel
use App\Models\AnggotaModel;

class AnggotaController extends Controller
{
    //method untuk tampil data anggota
    public function anggotatampil()
    {
        $dataanggota = AnggotaModel::orderby('nis', 'ASC')
        ->paginate(10);

        return view('halaman/view_anggota',['anggota'=>$dataanggota]);
    }

    //method untuk tambah data anggota
    public function anggotatambah(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama_anggota' => 'required',
            'kelas' => 'required'
        ]);

        AnggotaModel::create([
            'nis' => $request->nis,
            'nama_anggota' => $request->nama_anggota,
            'kelas' => $request->kelas
        ]);

        return redirect('/anggota/tampil');
    }

     //method untuk hapus data anggota
     public function anggotahapus($nis)
     {
         $dataanggota=AnggotaModel::find($nis);
         $dataanggota->delete();
 
         return redirect()->back();
     }

     //method untuk edit data anggota
    public function anggotaedit($nis, Request $request)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama_anggota' => 'required',
            'kelas' => 'required'
        ]);

        $nis = AnggotaModel::find($nis);
        $nis->nis = $request->nis;
        $nis->nama_anggota = $request->nama_anggota;
        $nis->kelas = $request->kelas;

        $nis->save();

        return redirect()->back();
    }
}