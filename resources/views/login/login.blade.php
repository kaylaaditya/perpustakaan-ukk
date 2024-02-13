<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login</title>

    <link rel="stylesheet" href="https:fonts.googleapis.com/css?family+Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page">
    <div style="width: 50vw" class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Halaman Login</b>PERPUSWEB</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <img src="{!! url('logoperpus.png') !!}" style="width: 100px">
                            </div>
                        </div>

                        <div class="text-center mt-2">
                            <h2>SISTEM INFORMASI PERPUSWEB</h2>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="text-center">
                            <p>Halaman Login</p>
                        </div>

                        <div>
                            <form method="POST" action="">
                                @csrf
                                <div class="form-group mt-3">
                                    <label for="username" class="text-md-right">{{ __('Username') }}</label>
                                    <div class="">
                                        <input id="username" class="form-control @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" required autocomplete="username"
                                            autofocus>
                                        @error('username')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="text-md-right">{{ __('Password') }}</label>
                                    <div class="">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>

                                <p class="mt-3 text-center">
                                    Belum punya akun? <a href="{{ 'register' }}"> Register</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- UNTUK FOTO SUPAYA KELUAR --}}
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>

</body>

</html>
