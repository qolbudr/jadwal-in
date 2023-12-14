@extends('auth/auth')

@section('title', 'SIJaru - Login')

@section('content')
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left" class="d-flex align-items-center vh-100">
                <div class="wrap">
                    <h1>SIJaru</h1>
                    <p class="auth-subtitle mb-5">Sistem Informasi Penjadwalan Ruangan</p>
                    <form action="{{ URL::to('auth/login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="nip" class="form-control form-control-xl" placeholder="NIP" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" name="remember">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Ingat saya
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <img src="{{ asset('Fakultas Teknik 2.png') }}" class="w-100 h-100" style="object-fit:cover">
        </div>
    </div>
</div>
@endsection