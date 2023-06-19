@extends('layouts.master')
@section('menu')
@extends('sidebar.form_spesialisasi')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="card">
        <div class="card-header">Tambah Spesialisasi Baru</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('spesialisasi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Spesialisasi</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>


    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Kelompok </p>
            </div>
            <div class="float-end">
                <p>Dibuat sepenuh with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="pwebteam">Kelompok</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
