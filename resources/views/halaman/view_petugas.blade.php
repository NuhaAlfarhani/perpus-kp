@include('header')
@section('title', 'Petugas')

@section('isihalaman')
    <h3><center>Daftar Pengurus Perpustakaan Pondok Pesantren Tebu Ireng</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPetugasTambah"> 
        Tambah Data Petugas 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Petugas</td>
                <td align="center">Nama Petugas</td>
                <td align="center">HP</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($petugas as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $petugas->firstItem() }}</td>
                    <td align="center">{{$p->id_petugas}}</td>
                    <td align="center">{{$p->nama_petugas}}</td>
                    <td align="center">{{$p->hp}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPetugasEdit{{$p->id_petugas}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data petugas -->
                        <div class="modal fade" id="modalPetugasEdit{{$p->id_petugas}}" tabindex="-1" role="dialog" aria-labelledby="modalPetugasEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPetugasEditLabel">Form Edit Data Petugas</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpetugastaedit" id="formpetugasedit" action="/petugas/edit/{{ $p->id_petugas}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_petugas" class="col-sm-4 col-form-label">ID Petugas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_petugas" name="id_petugas" value="{{$p->id_petugas}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{$p->nama_petugas}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hp" class="col-sm-4 col-form-label">Hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $p->hp}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="petugastambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="/petugas/hapus/{{$p->id_petugas}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $petugas->currentPage() }} <br />
    Jumlah Data : {{ $petugas->total() }} <br />
    Data Per Halaman : {{ $petugas->perPage() }} <br />

    {{ $petugas->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Petugas -->
    <div class="modal fade" id="modalPetugasTambah" tabindex="-1" role="dialog" aria-labelledby="modalPetugasTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPetugasTambahLabel">Form Input Data Petugas</h5>
                </div>
                <div class="modal-body">
                    <form name="formpetugastambah" id="formpetugastambah" action="/petugas/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukan Nama Petugas">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-4 col-form-label">HP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukan HP">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="petugastambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data buku -->
    
@endsection

@include('menu')
@include('banner')
@yield('isihalaman')

@include('footer')