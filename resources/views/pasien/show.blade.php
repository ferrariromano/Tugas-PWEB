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

    <h2>Detail Pasien</h2>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $pasien->id }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $pasien->nama }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $pasien->alamat }}</td>
        </tr>
        <tr>
            <th>No Telepon</th>
            <td>{{ $pasien->no_telepon }}</td>
        </tr>
    </table>

    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning">Ubah</a>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">Kembali</a>




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
