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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Pasien
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" readonly class="form-control-plaintext" id="nama" value="{{ $pasien->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea readonly class="form-control-plaintext" id="alamat">{{ $pasien->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon:</label>
                        <input type="text" readonly class="form-control-plaintext" id="telepon" value="{{ $pasien->telepon }}">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('pasiens.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
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
