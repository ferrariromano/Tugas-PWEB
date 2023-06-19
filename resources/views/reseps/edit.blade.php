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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reseps.update', $resep) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="rekam_medis_id">Rekam Medis</label>
                <select name="rekam_medis_id" id="rekam_medis_id" class="form-control">
                    <option value="">-- Pilih Rekam Medis --</option>
                    @foreach($rekam_medis as $rm)
                        <option value="{{ $rm->id }}" @if($resep->rekam_medis_id == $rm->id) selected @endif>{{ $rm->pasien->nama }} - {{ $rm->created_at->format('d/m/Y') }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="obat_ids">Obat</label>
                <select name="obat_ids[]" id="obat_ids" class="form-control" multiple>
                    @foreach($obats as $obat)
                        <option value="{{ $obat->id }}" @if(in_array($obat->id, $resep->obat->pluck('id')->toArray())) selected @endif>{{ $obat->nama }} - {{ $obat->stok }} Stok</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Resep</button>
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
