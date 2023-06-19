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
        <h2>Daftar Pembayaran</h2>
        <a href="{{ route('pembayarans.create') }}" class="btn btn-success mb-3">Tambah Pembayaran</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Pasien</th>
                <th>Nama Obat</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Jumlah Bayar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pembayaran->resep->rekam_medis->pasien->nama }}</td>
                    <td>
                        @foreach($pembayaran->resep->obat as $obat)
                            {{ $obat->nama }}<br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($pembayaran->resep->detail_resep as $detail)
                            {{ $detail->jumlah }}<br>
                        @endforeach
                    </td>
                    <td>Rp {{ number_format($pembayaran->resep->total_harga, 0, '.', '.') }}</td>
                    <td>Rp {{ number_format($pembayaran->jumlah_bayar, 0, '.', '.') }}</td>
                    <td>{{ $pembayaran->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <a href="{{ route('pembayarans.edit', $pembayaran->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
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
