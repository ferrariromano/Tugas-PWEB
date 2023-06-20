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
        <form method="POST" action="{{ route('pembayarans.update', $pembayaran->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="rekam_medis_id">Rekam Medis ID:</label>
                <select name="rekam_medis_id" id="rekam_medis_id" class="form-control">
                    @foreach ($rekamMedis as $rm)
                        <option value="{{ $rm->id }}" {{ $pembayaran->rekam_medis_id == $rm->id ? 'selected' : '' }}>{{ $rm->id }}</option>
                    @endforeach
                </select>
                @error('rekam_medis_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_bayar">Jumlah Bayar:</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" value="{{ $pembayaran->jumlah_bayar }}">
                @error('jumlah_bayar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                    <option value="cash" {{ $pembayaran->metode_pembayaran == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="debit" {{ $pembayaran->metode_pembayaran == 'debit' ? 'selected' : '' }}>Debit</option>
                    <option value="kredit" {{ $pembayaran->metode_pembayaran == 'kredit' ? 'selected' : '' }}>Kredit</option>
                </select>
                @error('metode_pembayaran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
