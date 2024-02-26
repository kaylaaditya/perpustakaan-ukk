<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Peminjam|PERPUSWEB</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.inc_admin.navbar')

        <!-- main sidebar container -->
        @include('layouts.inc_admin.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h1 class="m-0">Peminjaman Buku</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 d-flex justify-content-start align-items-center">
                            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm mt-2">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>

                        </div>

                        <!-- <div class="col-md-4">
                            <div class="input-group mt-3">
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-striped" id="peminjaman-table">
                                <thead>
                                    <tr>
                                        <th>judul</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Tgl Pengembalian</th>
                                        <!-- <th>Rating</th> -->
                                        <th>Status Peminjam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
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

    <form action="{{ route('pengembalian.saveData') }}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="buku_id" name="buku_id">

                        <div class="form-group">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" name="judul" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" name="tgl_pinjam" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" name="tgl_pengembalian" value="{{ now()->addDays()->format('Y-m-d') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Rating</label>
                            <input type="range" class="form-control-range" name="rating" min="1" max="5" id="markers">
                            <datalistv id="markers">
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
                                <option value="4"></option>
                            </datalistv>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ulasan</label>
                            <textarea name="ulasan" class="form-control"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-lg btn-link" id="lovebtn"><i class="fa fa-heart"></i></button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="submitBtn" class="btn btn-primary">kembalikan</button>
                            {{-- <button type="button" class="btn btn-primary" data-dismiss="modal"><a href="{{ route('form3') }}"></a> Pinjam</button> --}}
                        </div>
                    </div>
    </form>

    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>
    <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            var t = $('#peminjaman-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('api.pinjam', ['id' => auth()->user()->id]) !!}",
                columns: [{
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'nama_peminjam',
                        name: 'nama_peminjam'
                    },
                    {
                        data: 'tgl_pinjam',
                        name: 'tgl_pinjam'
                    },
                    {
                        data: 'tgl_pengembalian',
                        name: 'tgl_pengembalian'
                    },
                    // { 
                    //     data: 'rating',
                    //     name: 'rating'
                    // },
                    {
                        data: 'status_peminjam',
                        name: 'status_peminjam'
                    },
                    {
                        render: function(data, type, row) {
                            if (row['tgl_pengembalian'] == null) {
                                return `<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" name="previewBtn">
    Kembalikan
</button>`;
                            } else {
                                return `<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal" name="previewBtn">
    Info
</button>`;
                            }
                        }
                    },
                ]
            });
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var data = t.row(button.parents('tr')).data();
                var modal = $(this);
                modal.find('[name="judul"]').val(data['judul']);
                modal.find('[name="id"]').val(data['id']);
                modal.find('[name="buku_id"]').val(data['buku_id']);
                modal.find('[name="tgl_pinjam"]').val(data['tgl_pinjam']);
                if (data['koleksi'])
                    modal.find('#lovebtn i').addClass('text-danger');
                else
                    modal.find('#lovebtn i').removeClass('text-danger');

                if (data['tgl_pengembalian'] == null) {
                    modal.find("[name='submitBtn']").attr('disabled', true);
                } else {
                    modal.find("[name='submitBtn']").attr('disabled', false);
                }

            })
            $('#lovebtn').on('click', function(event) {
                var modal = $('#exampleModal');
                var is_loved = modal.find('#lovebtn i').hasClass('text-danger');
                var buku_id = modal.find('[name="buku_id"]').val();
                var user_id = "{{ auth()->user()->id }}";
                var url = "";
                if (is_loved)
                    url = "{{ route('koleksi.destroy') }}?user_id=" + user_id + "&buku_id=" + buku_id;
                else
                    url = "{{ route('koleksi.store') }}";
                var data = {
                    'user_id': user_id,
                    'buku_id': buku_id
                }
                const response = fetch(url, {
                    url: "{{ route('koleksi.store') }}",
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    body: JSON.stringify(data)
                });
                response.then(res => res.json()).then(d => {
                    if (is_loved) {
                        modal.find('#lovebtn i').removeClass('text-danger');
                        alert('Buku telah dikeluarkan dari koleksi')
                    } else {
                        modal.find('#lovebtn i').addClass('text-danger');
                        alert('Buku telag dimasukkan dari koleksi')
                    }
                })
            })

        });
    </script>

</body>

</html>