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
        <h1>Buat Resep</h1>
        <form method="POST" action="{{ route('reseps.store') }}">
            @csrf
            <div class="form-group">
                <label for="rekam_medis_id">Rekam Medis ID:</label>
                <select name="rekam_medis_id" class="form-control">
                    @foreach ($rekam_medis as $rm)
                        <option value="{{ $rm->id }}">{{ $rm->id }}</option>
                    @endforeach
                </select>
                @error('rekam_medis_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="obat_id">Obat ID:</label>
                <select name="obat_id" class="form-control">
                    @foreach ($obats as $ob)
                        <option value="{{ $ob->id }}">{{ $ob->nama_obat }}</option>
                    @endforeach
                </select>
                @error('obat_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah" class="form-control">
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Resep</button>
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
