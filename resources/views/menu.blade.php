<!--awal MENU NAVBAR-->
<div style="background:rgba(63, 67, 102, 0.562);padding:auto;">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('buku')}}">Data Buku</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('anggota')}}">Data Anggota</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('petugas')}}">Data Petugas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('pinjam')}}">Data Peminjaman</a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!--akhir MENU NAVBAR-->