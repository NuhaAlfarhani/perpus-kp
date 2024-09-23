@include('header')
@section('title', 'Anggota')

@section('isihalaman')
<h3>
    <center>Daftar Anggota Perpustakaan Pondok Pesantren Tebu Ireng</center>
</h3>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAnggotaTambah">
    Tambah Data anggota
</button>

<p>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td align="center">No</td>
            <td align="center">NIS</td>
            <td align="center">Nama Anggota</td>
            <td align="center">Kelas</td>
            <td align="center">Aksi</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($anggota as $index=>$a)
        <tr>
            <td align="center" scope="row">{{ $index + $anggota->firstItem() }}</td>
            <td align="center">{{$a->nis}}</td>
            <td align="center">{{$a->nama_anggota}}</td>
            <td align="center">{{$a->kelas}}</td>
            <td align="center">

                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAnggotaEdit{{$a->nis}}">
                    Edit
                </button>
                <div class="modal fade" id="modalAnggotaEdit{{$a->nis}}" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaEditLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAnggotaEditLabel">Form Edit Data Anggota</h5>
                            </div>
                            <div class="modal-body">

                                <form name="formanggotaedit" id="formanggotaedit" action="/anggota/edit/{{ $a->nis}} " method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="form-group row">
                                        <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nis" name="nis" value="{{$a->nis}}" readonly>
                                        </div>
                                    </div>

                                    <p>
                                    <div class="form-group row">
                                        <label for="nama_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ $a->nama_anggota}}">
                                        </div>
                                    </div>

                                    <p>
                                    <div class="form-group row">
                                        <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $a->kelas}}">
                                        </div>
                                    </div>

                                    <p>
                                    <div class="modal-footer">
                                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" name="anggotatambah" class="btn btn-success">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                |
                <a href="/anggota/hapus/{{$a->nis}}" onclick="return confirm('Yakin mau dihapus?')">
                    <button class="btn-danger">
                        Delete
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

Halaman : {{ $anggota->currentPage() }} <br />
Jumlah Data : {{ $anggota->total() }} <br />
Data Per Halaman : {{ $anggota->perPage() }} <br />

{{ $anggota->links() }}

<div class="modal fade" id="modalAnggotaTambah" tabindex="-1" role="dialog" aria-labelledby="modalAnggotaTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAnggotaTambahLabel">Form Input Data Aggota</h5>
            </div>
            <div class="modal-body">
                <form name="formanggotatambah" id="formanggotatambah" action="/anggota/tambah " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukan NIS">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="nama_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" placeholder="Masukan Nama Anggota">
                        </div>
                    </div>

                    <p>
                    <div class="form-group row">
                        <label for="kelas" class="col-sm-4 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                        </div>
                    </div>

                    <p>
                    <div class="modal-footer">
                        <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="anggotatambah" class="btn btn-success">Tambah</button>
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