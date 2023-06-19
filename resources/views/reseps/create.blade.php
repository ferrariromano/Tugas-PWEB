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
        <h1>Tambah Resep Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reseps.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="rekam_medis_id">Rekam Medis</label>
                <select name="rekam_medis_id" id="rekam_medis_id" class="form-control">
                    <option value="">-- Pilih Rekam Medis --</option>
                    @foreach($rekam_medis as $rm)
                        <option value="{{ $rm->id }}">{{ $rm->pasien->nama }} - {{ $rm->created_at->format('d/m/Y') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="obat_ids">Obat</label>
                <select name="obat_ids[]" id="obat_ids" class="form-control" multiple>
                    @foreach($obats as $obat)
                        <option value="{{ $obat->id }}">{{ $obat->nama }} - {{ $obat->stok }} Stok</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Resep</button>
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
