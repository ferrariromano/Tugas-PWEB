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
        <h2>Edit Rekam Medis</h2>
        <form action="{{ route('rekam-medis.update', $rekam_medis->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="pasien_id">Nama Pasien</label>
                <select name="pasien_id" id="pasien_id" class="form-control">
                    @foreach ($pasiens as $ps)
                        <option value="{{ $ps->id }}" {{ ($ps->id == $rekam_medis->pasien_id) ? 'selected' : '' }}>{{ $ps->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dokter_id">Nama Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-control">
                    @foreach ($dokters as $dt)
                        <option value="{{ $dt->id }}" {{ ($dt->id == $rekam_medis->dokter_id) ? 'selected' : '' }}>{{ $dt->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $rekam_medis->tanggal }}" required>
            </div>
            <div class="form-group">
                <label for="diagnosa">Diagnosa</label>
                <textarea name="diagnosa" id="diagnosa" class="form-control" rows="3" required>{{ $rekam_medis->diagnosa }}</textarea>
            </div>
            <div class="form-group">
                <label for="tindakan">Tindakan</label>
                <textarea name="tindakan" id="tindakan" class="form-control" rows="3" required>{{ $rekam_medis->tindakan }}</textarea>
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
