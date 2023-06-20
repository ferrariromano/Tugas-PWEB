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
        <h1>Detail Pembayaran</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $pembayaran->id }}</td>
                </tr>
                <tr>
                    <th>Rekam Medis ID</th>
                    <td>{{ $pembayaran->rekamMedis->id }}</td>
                </tr>
                <tr>
                    <th>Jumlah Bayar</th>
                    <td>{{ $pembayaran->jumlah_bayar }}</td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <td>{{ $pembayaran->metode_pembayaran }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <td>{{ $pembayaran->created_at->format('d-m-Y H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('pembayarans.index') }}" class="btn btn-secondary">Kembali</a>
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
