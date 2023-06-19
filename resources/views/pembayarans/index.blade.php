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
        <h1>Daftar Pembayaran</h1>

        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ route('pembayarans.create') }}" class="btn btn-primary">Tambah Pembayaran</a>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Rekam Medis</th>
                    <th>Jumlah Bayar</th>
                    <th>Metode Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembayaran->rekamMedis->id }}</td>
                    <td>{{ $pembayaran->jumlah_bayar }}</td>
                    <td>{{ $pembayaran->metode_pembayaran }}</td>
                    <td>
                        <a href="{{ route('pembayarans.show', $pembayaran) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('pembayarans.edit', $pembayaran) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('pembayarans.destroy', $pembayaran) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">Hapus</button>
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
