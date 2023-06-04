@extends('layouts.master')
@section('menu')
@extends('sidebar.form_pasien')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <h2>Daftar Pasien</h2>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary">Tambah Pasien</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasien as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>
                        <a href="{{ route('pasien.show', $p->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-warning">Ubah</a>
                        <form action="{{ route('pasien.destroy', $p->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Kelompok 1</p>
            </div>
            <div class="float-end">
                <p>Dibuat sepenuh  <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                    href="http://localcoffe.com">Kelompok 1</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
