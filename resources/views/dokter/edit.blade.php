@extends('layouts.master')
@section('menu')
@extends('sidebar.form_dokter')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="card">
        <div class="card-header">Edit Dokter</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)<li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama Dokter</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $dokter->nama) }}">
                </div>
                <div class="form-group">
                    <label for="spesialisasi_id">Spesialisasi</label>
                    <select name="spesialisasi_id" id="spesialisasi_id" class="form-control">
                        <option value="">-- Pilih Spesialisasi --</option>
                        @foreach ($spesialisasi as $s)
                            <option value="{{ $s->id }}" {{ old('spesialisasi_id', $dokter->spesialisasi_id) == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki" {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $dokter->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>


    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Kelompok 1</p>
            </div>
            <div class="float-end">
                <p>Dibuat sepenuh  <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                    href="http://localcoffe.com">Kelompok 1 </a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
