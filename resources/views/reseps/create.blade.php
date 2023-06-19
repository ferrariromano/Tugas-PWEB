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
        <h2>Buat Resep Baru</h2>
        <form action="{{ route('reseps.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="rekam_medis_id">Nama Pasien</label>
                <select name="rekam_medis_id" id="rekam_medis_id" class="form-control">
                    @foreach ($rekam_medis as $rm)
                        <option value="{{ $rm->id }}">{{ $rm->pasien->nama }} - {{ $rm->tanggal }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="obat_id">Nama Obat</label>
                <select name="obat_id" id="obat_id" class="form-control">
                    @foreach ($obats as $ob)
                        <option value="{{ $ob->id }}">{{ $ob->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
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
