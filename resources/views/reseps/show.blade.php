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
        <h1>Detail Resep</h1>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Rekam Medis ID</th>
                    <td>{{ $resep->rekam_medis_id }}</td>
                </tr>
                <tr>
                    <th>Obat ID</th>
                    <td>{{ $resep->obat_id }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $resep->jumlah }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $resep->created_at }}</td>
                </tr>
                <tr>
                    <th>Diubah Pada</th>
                    <td>{{ $resep->updated_at }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('reseps.edit', $resep) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('reseps.destroy', $resep) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus resep ini?')">Hapus</button>
        </form>
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
