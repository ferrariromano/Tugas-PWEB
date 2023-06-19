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
        <h2>Edit Pembayaran</h2>
        <form action="{{ route('pembayarans.update', $pembayaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="resep_id">Resep:</label>
                <select class="form-control @error('resep_id') is-invalid @enderror" id="resep_id" name="resep_id">
                    <option value="">-- Pilih Resep --</option>
                    @foreach($reseps as $resep)
                        <option value="{{ $resep->id }}" {{ $pembayaran->resep_id == $resep->id ? 'selected' : '' }}>
                            {{ $resep->rekam_medis->pasien->nama }} - {{ $resep->obat->implode('nama', ', ') }}
                        </option>
                    @endforeach
                </select>
                @error('resep_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jumlah_bayar">Jumlah Bayar:</label>
                <input type="number" class="form-control @error('jumlah_bayar') is-invalid @enderror" id="jumlah_bayar" name="jumlah_bayar" value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}">
                @error('jumlah_bayar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
