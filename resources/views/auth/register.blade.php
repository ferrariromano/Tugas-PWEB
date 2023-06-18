
@extends('layouts.app')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">DAFTAR</h1>
                    <p class="auth-subtitle mb-5">masukkan data anda untuk mendaftar ke situs web kami</p>

                    <form method="POST" action="{{ route('register') }}" class="md-float-material">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Masukkan nama anda">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- insert defaults --}}
                        <input type="hidden" class="image" name="image" value="photo_defaults.jpg">

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>``
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pasien">Pasien</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Masukkan password">
                            <div class="form-control-icon">
                              <i class="bi bi-shield-lock"></i>
                            </div>
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password">
                              <i class="bi bi-eye"></i>
                            </button>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>

                          <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Ulangi password">
                            <div class="form-control-icon">
                              <i class="bi bi-shield-check"></i>
                            </div>
                            <button type="button" class="btn btn-outline-secondary toggle-password" data-target="password_confirmation">
                              <i class="bi bi-eye"></i>
                            </button>
                          </div>

                          <script>
                            const togglePasswordBtns = document.querySelectorAll('.toggle-password');
                            togglePasswordBtns.forEach(btn => {
                              btn.addEventListener('click', function() {
                                const targetId = this.getAttribute('data-target');
                                const targetInput = document.querySelector(`[name="${targetId}"]`);
                                const currentType = targetInput.getAttribute('type');
                                if (currentType === 'password') {
                                  targetInput.setAttribute('type', 'text');
                                  this.innerHTML = '<i class="bi bi-eye-slash"></i>';
                                } else {
                                  targetInput.setAttribute('type', 'password');
                                  this.innerHTML = '<i class="bi bi-eye"></i>';
                                }
                              });
                            });
                          </script>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Daftar</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah Punya Akun ? <a href="{{ route('login') }}"
                        class="font-bold">Login</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
@endsection

