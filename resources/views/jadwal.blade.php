@extends('layouts.master')
@section('menu')
@endsection
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="container">
        <h2>Jadwal Dokter</h2>
        <p>Tanggal: {{ date('Y-m-d') }}</p>
        @foreach ($jadwals as $jadwal)
            @if ($jadwal->tanggal == date('Y-m-d'))
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $jadwal->dokter->nama }} - {{ $jadwal->dokter->spesialisasi }}</h5>
                        <p class="card-text">Hari: {{ $jadwal->hari }}</p>
                        <p class="card-text">Tanggal: {{ $jadwal->tanggal }}</p>
                        <p class="card-text">Jam Mulai: {{ $jadwal->jam_mulai }}</p>
                        <p class="card-text">Jam Selesai: {{ $jadwal->jam_selesai }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>


    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Tugas PWEB  </p>
            </div>
            <div class="float-end">
                <p>Dibuat sepenuh  <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="pwebteam">Clinik Pweb Team </a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
