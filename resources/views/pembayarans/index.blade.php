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
        <a href="{{ route('pembayarans.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rekam Medis ID</th>
                    <th>Jumlah Bayar</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayarans as $pembayaran)
                    <tr>
                        <td>{{ $pembayaran->id }}</td>
                        <td>{{ $pembayaran->rekamMedis->id }}</td>
                        <td>{{ $pembayaran->jumlah_bayar }}</td>
                        <td>{{ $pembayaran->metode_pembayaran }}</td>
                        <td>{{ $pembayaran->created_at->format('d-m-Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('pembayarans.show', $pembayaran->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('pembayarans.edit', $pembayaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pembayarans.destroy', $pembayaran->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
