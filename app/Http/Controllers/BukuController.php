<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

//panggil model BukuModel
use App\Models\BukuModel;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    //method untuk tampil data buku
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('kode_buku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku',['buku'=>$databuku]);
    }

    //method untuk tambah data buku
    public function bukutambah(Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required'
        ]);

        BukuModel::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'kategori' => $request->kategori
        ]);

        return redirect('/buku');
    }

     //method untuk hapus data buku
     public function bukuhapus($kode_buku)
     {
         $databuku=BukuModel::find($kode_buku);
         $databuku->delete();
 
         return redirect()->back();
     }

     //method untuk edit data buku
    public function bukuedit($kode_buku, Request $request)
    {
        $this->validate($request, [
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori' => 'required'
        ]);

        $kode_buku = BukuModel::find($kode_buku);
        $kode_buku->judul      = $request->judul;
        $kode_buku->pengarang  = $request->pengarang;
        $kode_buku->kategori   = $request->kategori;

        $kode_buku->save();

        return redirect('/buku');
    }

    public function downloadpdf()
    {
        $data = BukuModel::all();
        $pdf = Pdf::loadView('halaman.view_buku-pdf', ['data'=>$data])->setPaper('A4', 'portrait');
        return $pdf->download('buku.pdf');
    }
}   
