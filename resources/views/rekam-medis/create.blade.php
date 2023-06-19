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
        <h2>Tambah Rekam Medis</h2>
        <form action="{{ route('rekam-medis.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pasien_id">Pasien:</label>
                <select class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id" name="pasien_id">
                    <option value="">-- Pilih Pasien --</option>
                    @foreach($pasien as $p)
                        <option value="{{ $p->id }}" {{ old('pasien_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                    @endforeach
                </select>
                @error('pasien_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="dokter_id">Dokter:</label>
                <select class="form-control @error('dokter_id') is-invalid @enderror" id="dokter_id" name="dokter_id">
                    <option value="">-- Pilih Dokter --</option>
                    @foreach($dokter as $d)
                        <option value="{{ $d->id }}" {{ old('dokter_id') == $d->id ? 'selected' : '' }}>{{ $d->nama }}</option>
                    @endforeach
                </select>
                @error('dokter_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="keluhan">Keluhan:</label>
                <textarea class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan">{{ old('keluhan') }}</textarea>
                @error('keluhan')
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
