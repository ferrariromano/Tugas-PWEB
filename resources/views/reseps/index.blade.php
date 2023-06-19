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
        <h2>Daftar Resep</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('reseps.create') }}" class="btn btn-primary">Buat Resep Baru</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reseps as $resep)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $resep->rekam_medis->pasien->nama }}</td>
                        <td>{{ $resep->obat->nama }}</td>
                        <td>{{ $resep->jumlah }}</td>
                        <td>
                            <a href="{{ route('reseps.show', $resep->id) }}" class="btn btn-primary">Lihat</a>
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
