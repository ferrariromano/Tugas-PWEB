@extends('layouts.master')
@section('menu')
@extends('sidebar.form_spesialisasi')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="card">
        <div class="card-header">Daftar Spesialisasi</div>
        <div class="card-body">
            <a href="{{ route('spesialisasi.create') }}" class="btn btn-primary mb-3">Tambah Spesialisasi Baru</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Spesialisasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($spesialisasi as $key => $s)
                        <tr>
                            <td>{{ $spesialisasi->firstItem() + $key }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>
                                <a href="{{ route('spesialisasi.edit', $s->id) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('spesialisasi.destroy', $s->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $spesialisasi->links() }}
        </div>
    </div>


    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Kelompok </p>
            </div>
            <div class="float-end">
                <p>Dibuat sepenuh with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="pwebteam">Kelompok</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
