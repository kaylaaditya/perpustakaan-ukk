<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard|PERPUSWEB</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.inc_admin.navbar')
        <!-- main sidebar container -->
        @include('layouts.inc_admin.sidebar')

        <div class="content-wrapper">
            <div class="content-header">`
                <div class="container-fluid mb-2">
                    <h1 class="m-0">Form Data Pinjam </h1>

                </div>
            </div>

            <form action="" method="POST">
                @csrf
                <div class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                {{-- <p>User Id</p> --}}
                                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                                <p>Buku Id</p>
                                <select name="buku_id" id="buku_id" class="form-control"></select>
                                <p>Nama Peminjam</p>
                                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" required readonly value="{{ auth()->user()->nama_lengkap }}">

                                <p class="mt-2">Tanggal Pinjam</p>
                                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required readonly value="{{ now()->format('Y-m-d') }}">

                                <p class="mt-2">Batas Pengembalian</p>
                                <input type="date" class="form-control" id="batas_tgl_pengembalian" name="batas_tgl_pengembalian" required readonly value="{{ now()->addDays(5)->format('Y-m-d') }}">

                                <div class="modal-footer justify-content-between">
                                    <div class="ml-2 text-left mt-3 mb-0">
                                        <a href="{{ 'tabel1' }}" class="btn btn-danger">
                                            Kembali
                                        </a>
                                    </div>
                                    <div class="mr-2 text-right mt-3 mb-0">
                                        <button type="submit" class="btn btn-success">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
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




    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="/adminlte/plugins/select2/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#buku_id").select2({
                ajax: {
                    url: "{{ route('api.select.pinjam') }}",
                    processResults: function(data, page) {
                        let _data = data.map((d) => {
                            return {
                                'id': d.id,
                                'text': `${d.judul} (${d.tahun_terbit}) - ${d.penulis}`,
                                ...d
                            };
                        });
                        return {
                            results: _data
                        };
                    },
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                },
                placeholder: "Pilih Buku",
                allowClear: true
            });
        });
    </script>

</body>

</html>