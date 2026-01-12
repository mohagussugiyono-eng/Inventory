@extends('Master.Layouts.app_login', ['title' => 'Register'])

@section('content')
    <div class="container-login100">
        <div class="wrap-login100 p-6">

            <div class="d-flex justify-content-center align-items-center">
                @if ($web->web_logo == '' || $web->web_logo == 'default.png')
                    <img src="{{ url('/assets/default/web/default.png') }}" height="75px" alt="logo">
                @else
                    <img src="{{ asset('storage/web/' . $web->web_logo) }}" height="75px" alt="logo">
                @endif
            </div>

            <div class="text-center">
                <h4 class="fw-bold mt-4 text-black text-uppercase">
                    {{ $web->web_nama }} <span class="text-gray">| REGISTER</span>
                </h4>
            </div>

            <form method="POST" action="{{ url('/register') }}">
                @csrf

                <div class="wrap-input100 validate-input input-group">
                    <a class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-account text-muted ms-1"></i>
                    </a>
                    <input name="user_nmlengkap" class="input100 border-start-0 form-control" type="text"
                        placeholder="Nama Lengkap">
                </div>

                <div class="wrap-input100 validate-input input-group">
                    <a class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-account-circle text-muted ms-1"></i>
                    </a>
                    <input name="user_nama" class="input100 border-start-0 form-control" type="text"
                        placeholder="Username">
                </div>

                <div class="wrap-input100 validate-input input-group">
                    <a class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-email text-muted ms-1"></i>
                    </a>
                    <input name="user_email" class="input100 border-start-0 form-control" type="email"
                        placeholder="Email">
                </div>

                <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                    <a class="input-group-text bg-white text-muted">
                        <i class="zmdi zmdi-eye text-muted"></i>
                    </a>
                    <input name="password" class="input100 border-start-0 form-control" type="password"
                        placeholder="Password">
                </div>

                <div class="container-login100-form-btn mt-3">
                    <button class="login100-form-btn btn btn-primary">
                        Register
                    </button>
                </div>
            </form>

            <br>
            <p class="text-center">
                Sudah punya akun?
                <a href="{{ url('/admin/login') }}">Login di sini</a>
            </p>

        </div>
    </div>
@endsection
