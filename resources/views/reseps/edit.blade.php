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
        <h1>Edit Resep</h1>
        <form action="{{ route('reseps.update', $resep) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="rekam_medis_id" class="form-label">Rekam Medis ID</label>
                <input type="text" class="form-control @error('rekam_medis_id') is-invalid @enderror" id="rekam_medis_id" name="rekam_medis_id" value="{{ old('rekam_medis_id', $resep->rekam_medis_id) }}">
                @error('rekam_medis_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="obat_id" class="form-label">Obat ID</label>
                <input type="text" class="form-control @error('obat_id') is-invalid @enderror" id="obat_id" name="obat_id" value="{{ old('obat_id', $resep->obat_id) }}">
                @error('obat_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="{{ old('jumlah', $resep->jumlah) }}">
                @error('jumlah')
                    <span class="invalid-feedback">{{ $message }}</span>
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
