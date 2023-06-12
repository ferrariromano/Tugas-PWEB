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
    <div class="page-heading">
        <h3>Cookie Example</h3>
    </div>

    <!-- Menampilkan nilai dari cookie -->
    <p>Value of cookie is: {{ $cookieValue }}</p>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Tugas PWEB  </p>
            </div>
            <div class="float-end">
                <p>Dibuat sepenuh  <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                href="http://localcoffe.com">Kelompok 1 </a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
