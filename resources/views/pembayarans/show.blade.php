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

        <table class="table table-bordered">
            <tr>
                <td>ID Rekam Medis:</td>
                <td>{{ $pembayaran->rekamMedis->id }}</td>
            </tr>
            <tr>
                <td>Nama Pasien:</td>
                <td>{{ $pembayaran->rekamMedis->pasien->nama }}</td>
            </tr>
            <tr>
                <td>Jumlah Bayar:</td>
                <td>{{ $pembayaran->jumlah_bayar }}</td>
            </tr>
            <tr>
                <td>Metode Pembayaran:</td>
                <td>{{ $pembayaran->metode_pembayaran }}</td>
            </tr>
        </table>

        <a href="{{ route('pembayarans.edit', $pembayaran) }}" class="btn btn-success">Edit</a>

        <form action="{{ route('pembayarans.destroy', $pembayaran) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">Hapus</button>
        </form>
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
