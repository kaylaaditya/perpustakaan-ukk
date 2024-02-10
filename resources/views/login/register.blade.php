<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https:fonts.googleapis.com/css?family+Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">

</head>

<body class="hold-transition login-page">
    <div style="width: 50vw" class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Register</b>PERPUSWEB</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="row justify-content-center">
                            <div class="col-4">
                                <img src="http://localhost:8000/logoperpus.png" style="width: 100px">
                            </div>
                        </div>
                        <div class="text-center mt-2" style="margin-bottom: 20px;"> <!-- Added margin-bottom -->
                            <h2>SISTEM INFORMASI PERPUSWEB</h2>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center">
                            <p>Halaman Register</p>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('register') }}" id="registrasiForm">
                                @csrf
                                {{-- USERNAME --}}
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
                                
                                {{-- PASSWORD --}}
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

                                {{-- EMAIL --}}
                                <div class="form-group mt-3">
                                    <label for="email" class="text-md-right">{{ __('Email   ') }}</label>
                                    <div class="">
                                        <input id="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
                                        @error('email')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- NAMA LENGKAP --}}
                                <input type="hidden" name="user_type" value="peminjam">
                                <div class="form-group mt-3">
                                    <label for="nama_lengkap" class="text-md-right">{{ __('Nama Lengkap   ') }}</label>
                                    <div class="">
                                        <input id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap"
                                            autofocus>
                                        @error('nama_lengkap')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- ALAMAT --}}
                                <div class="form-group mt-3">
                                    <label for="alamat" class="text-md-right">{{ __('Alamat   ') }}</label>
                                    <div class="">
                                        <input id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                            name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat"
                                            autofocus>
                                        @error('alamat')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>
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

    <script>
    function validateForm() {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var nama_lengkap = document.getElementById('nama_lengkap').value;
        var alamat = document.getElementById('alamat').value;

        // Contoh validasi sederhana
        if (username === '' || email === '' || password === '' || nama_lengkap === '' || alamat === '') {
            alert('Mohon isi semua kolom');
            return;
        }

        // Proses pendaftaran atau tindakan lainnya dapat ditambahkan di sini

        alert('Pendaftaran berhasil!');
        document.getElementById('registrasiForm').reset();
    }
</script>




</body>

</html>

{{-- 52.39 --}}
