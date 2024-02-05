<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard|PERPUSWEB</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">
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
              <h1 class="m-0">Data Buku</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <table class="table table-hover table-striped" id="buku-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun terbit</th>
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
          <div class="row">
            <div class="col-7">
              <div class="row">
                <div class="col-4">Judul</div>
                <div class="col-7 font-weight-bold" id="judulBuku">Judul Buku</div>
              </div>
              <div class="row">
                <div class="col-4">Penerbit</div>
                <div class="col-7 font-weight-bold" id="penerbitBuku">penerbit Buku</div>
              </div>
              <div class="row">
                <div class="col-4">Tahun</div>
                <div class="col-7 font-weight-bold" id="tahunTerbitBuku">2023</div>
              </div>
              <div class="row">
                <div class="col-4">Penulis</div>
                <div class="col-7 font-weight-bold" id="penulisBuku">penulis Buku</div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Pinjam</button>
            {{-- <button type="button" class="btn btn-primary" data-dismiss="modal"><a href="{{ route('form3') }}"></a> Pinjam</button> --}}
          </div>
        </div>

        <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>
        <script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

        <script>
          $(document).ready(function() {
            var t = $('#buku-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{!! route('api.buku') !!}",



              columns: [{
                  data: 'id',
                  name: 'id'
                },
                {
                  data: 'judul',
                  name: 'judul'
                },
                {
                  data: 'penulis',
                  name: 'penulis'
                },
                {
                  data: 'penerbit',
                  name: 'penerbit'
                },
                {
                  data: 'tahun_terbit',
                  name: 'tahun_terbit'
                },
                {
                  // data: 'tahun_terbit',
                  // name: 'tahun_terbit'
                },
              ],
              columnDefs: [{
                targets: -1,
                data: null,
                defaultContent: `<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Preview</button>`,
              }],
            });
            $('#exampleModal').on('show.bs.modal', function(event) {
              var button = $(event.relatedTarget);
              var data = t.row(button.parents('tr')).data();
              var modal = $(this);
              modal.find('#judulBuku').text(data['judul']);
              modal.find('#penerbitBuku').text(data['penerbit']);
              modal.find('#tahunTerbitBuku').text(data['tahun_terbit']);
              modal.find('#penulisBuku').text(data['penulis']);
            })
          });
        </script>


</body>

</html>