@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="container">
        <h2>Daftar Rekam Medis</h2>

        <div class="mb-3">
            <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary">Tambah Rekam Medis</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pasien</th>
                    <th scope="col">Dokter</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Diagnosa</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekam_medis as $rm)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $rm->pasien->nama }}</td>
                        <td>{{ $rm->dokter->nama }}</td>
                        <td>{{ $rm->tanggal }}</td>
                        <td>{{ $rm->diagnosa }}</td>
                        <td>{{ $rm->keterangan }}</td>
                        <td>
                            @if ($rm->status_pembayaran)
                                <span class="badge badge-success">Sudah Bayar</span>
                            @else
                                <span class="badge badge-danger">Belum Bayar</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('rekam-medis.edit', $rm) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('rekam-medis.destroy', $rm) }}" method="post" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
