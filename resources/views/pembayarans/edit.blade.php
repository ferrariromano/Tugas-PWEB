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
        <h1>Edit Pembayaran</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembayarans.update', $pembayaran) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="rekam_medis_id">ID Rekam Medis:</label>
                <select name="rekam_medis_id" id="rekam_medis_id" class="form-control">
                    <option value="">Pilih rekam medis</option>
                    @foreach ($rekamMedis as $rm)
                        <option value="{{ $rm->id }}" {{ $rm->id == $pembayaran->rekam_medis_id ? 'selected' : '' }}>{{ $rm->id }} - {{ $rm->pasien->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_bayar">Jumlah Bayar:</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="{{ $pembayaran->jumlah_bayar }}">
            </div>
            <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                    <option value="">Pilih metode pembayaran</option>
                    <option value="Tunai" {{ $pembayaran->metode_pembayaran == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="Transfer Bank" {{ $pembayaran->metode_pembayaran == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                    <option value="Kartu Kredit" {{ $pembayaran->metode_pembayaran == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
