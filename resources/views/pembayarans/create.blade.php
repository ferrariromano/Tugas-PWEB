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
        <h1>Tambah Pembayaran</h1>
        <form method="POST" action="{{ route('pembayarans.store') }}">
            @csrf
            <div class="form-group">
                <label for="rekam_medis_id">Rekam Medis ID:</label>
                <select name="rekam_medis_id" id="rekam_medis_id" class="form-control">
                    @foreach ($rekamMedis as $rm)
                        <option value="{{ $rm->id }}">{{ $rm->id }}</option>
                    @endforeach
                </select>
                @error('rekam_medis_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_bayar">Jumlah Bayar:</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control">
                @error('jumlah_bayar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran:</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                    <option value="cash">Cash</option>
                    <option value="debit">Debit</option>
                    <option value="kredit">Kredit</option>
                </select>
                @error('metode_pembayaran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pembayaran</button>
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
