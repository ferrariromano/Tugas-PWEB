@extends('layouts.master')
@section('menu')
@extends('sidebar.form_dokter')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="card">
        <div class="card-header">Daftar Dokter</div>
        <div class="card-body">
            <a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">Tambah Dokter Baru</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokter as $key => $d)
                        <tr>
                            <td>{{ $dokter->firstItem() + $key }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->spesialisasi->nama }}</td>
                            <td>{{ $d->jenis_kelamin }}</td>
                            <td>
                                <a href="{{ route('dokter.edit', $d->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('dokter.destroy', $d->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $dokter->links() }}
        </div>
    </div>


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
