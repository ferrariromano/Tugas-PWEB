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
        <h1>Daftar Resep</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pasien</th>
                    <th>Obat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reseps as $resep)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $resep->created_at->format('d/m/Y') }}</td>
                        <td>{{ $resep->rekam_medis->pasien->nama }}</td>
                        <td>
                            @foreach($resep->obat as $obat)
                                {{ $obat->nama }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('reseps.edit', $resep) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('reseps.destroy', $resep) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Anda yakin ingin menghapus resep ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('reseps.create') }}" class="btn btn-primary">Tambah Resep</a>
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
