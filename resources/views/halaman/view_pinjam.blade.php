@include('header')
@section('title', 'Peminjaman')

@section('isihalaman')
    <h3><center>Data Peminjaman Buku</center><h3>
    <h3><center>Perpustakaan Pondok Pesantren Tebu Ireng</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPinjamTambah"> 
        Tambah Data Peminjaman 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pinjam</td>
                <td align="center">Nama Petugas</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Judul Buku</td>
                <td align="center">Tanggal Pinjam</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pinjam as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $pinjam->firstItem() }}</td>
                    <td align="center">{{$p->id_pinjam}}</td>
                    <td align="center">{{$p->petugas->nama_petugas}}</td>
                    <td align="center">{{$p->anggota->nama_anggota}}</td>
                    <td align="center">{{$p->buku->judul}}</td>
                    <td align="center">{{$p->created_at}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPinjamEdit{{$p->id_pinjam}}"> 
                            Edit
                        </button>
                        |
                        <a href="/pinjam/hapus/{{$p->id_pinjam}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>

                <div class="modal fade" id="modalPinjamEdit{{$p->id_pinjam}}" tabindex="-1" role="dialog" aria-labelledby="modalPinjamEditLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalPinjamEditLabel">Form Edit Data Peminjaman</h5>
                            </div>
                            <div class="modal-body">

                                <form name="formpinjamedit" id="formpinjamedit" action="/pinjam/edit/{{ $p->id_pinjam}} " method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="form-group row">
                                        <label for="id_pinjam" class="col-sm-4 col-form-label">ID Pinjam</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="{{ $p->id_pinjam}}" readonly>
                                        </div>
                                    </div>

                                    <p>
                                    <div class="form-group row">
                                        <label for="petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                                        <div class="col-sm-8">
                                            <select type="text" class="form-control" id="id_petugas" name="id_petugas">
                                                @foreach ($petugas as $pt)
                                                    @if ($pt->id_petugas == $p->id_petugas)
                                                        <option value="{{ $pt->id_petugas }}" selected>{{ $pt->nama_petugas }}</option>
                                                    @else
                                                        <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <p>
                                    <div class="form-group row">
                                        <label for="anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                        <div class="col-sm-8">
                                            <select type="text" class="form-control" id="nis" name="nis">
                                                @foreach ($anggota as $a)
                                                    @if ($a->nis == $p->nis)
                                                        <option value="{{ $a->nis }}" selected>{{ $a->nama_anggota }}</option>
                                                    @else
                                                        <option value="{{ $a->nis }}">{{ $a->nama_anggota }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <p>
                                    <div class="form-group row">
                                        <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                        <div class="col-sm-8">
                                            <select type="text" class="form-control" id="kode_buku" name="kode_buku">
                                                @foreach ($buku as $bk)
                                                    @if ($bk->kode_buku == $p->kode_buku)
                                                        <option value="{{ $bk->kode_buku }}" selected>{{ $bk->judul }}</option>
                                                    @else
                                                        <option value="{{ $bk->kode_buku }}">{{ $bk->judul }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <p>
                                    <div class="modal-footer">
                                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" name="pinjamtambah" class="btn btn-success">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    Halaman : {{ $pinjam->currentPage() }} <br />
    Jumlah Data : {{ $pinjam->total() }} <br />
    Data Per Halaman : {{ $pinjam->perPage() }} <br />

    {{ $pinjam->links() }}

    <div class="modal fade" id="modalPinjamTambah" tabindex="-1" role="dialog" aria-labelledby="modalPinjamTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPinjamTambahLabel">Form Input Data Peminjaman</h5>
                </div>
                <div class="modal-body">

                    <form name="formpinjamtambah" id="formpinjamtambah" action="/pinjam/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_petugas" name="id_petugas" placeholder="Pilih Nama Petugas">
                                    <option></option>
                                    @foreach($petugas as $pt)
                                        <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="nis" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="nis" name="nis" placeholder="Pilih Nama Anggota">
                                    <option></option>
                                    @foreach($anggota as $a)
                                        <option value="{{ $a->nis }}">{{ $a->nama_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="kode_buku" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Pilih Judul Buku">
                                    <option></option>
                                    @foreach($buku as $bk)
                                        <option value="{{ $bk->kode_buku }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pinjamtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@include('menu')
@include('banner')
@yield('isihalaman')

@include('footer')