<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard|PERPUSWEB</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        
        <!-- Navbar -->
  @include('layouts.inc_admin.navbar')

        <!-- main sidebar container -->
  @include('layouts.inc_admin.sidebar')
        


        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid mb-2">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>

            <div class="content">
                <div class="row align-items-center justify-content-center" style="height: 60vh">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-center">Selamat datang di aplikasi PERPUS WEB</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    Detail Login
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">Nama</div>
                                <div class="col-7">{{ Auth::user()->nama_lengkap }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Username</div>
                                <div class="col-7">{{ Auth::user()->username }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4">Role</div>
                                <div class="col-7">{{ Auth::user()->user_type }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
        


        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Version 1.0.1
            </div>

            <strong>Copyright &copy; 2024 </strong> All rights reserved.
        </footer>
    </div>

    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>

</body>

</html>
