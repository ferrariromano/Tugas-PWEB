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
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary">Tambah Rekam Medis Baru</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Tanggal</th>
                    <th>Diagnosa</th>
                    <th>Tindakan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekam_medis as $rm)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rm->pasien->nama }}</td>
                        <td>{{ $rm->dokter->nama }}</td>
                        <td>{{ $rm->tanggal }}</td>
                        <td>{{ $rm->diagnosa }}</td>
                        <td>{{ $rm->tindakan }}</td>
                        <td>
                            <a href="{{ route('rekam-medis.edit', $rm->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('rekam-medis.destroy', $rm->id) }}" method="POST" class="d-inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus rekam medis ini?')">Hapus</button>
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
                <p>2023 &copy;Clinik Pweb Team</p>
            </div>
            <div class="float-end">
                <p>Dibuat sepenuh  <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                    href="pwebteam">Clinik Pweb Team</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
