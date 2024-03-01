<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan|PERPUSWEB</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-spacing: 0;
        }

        .table td,
        .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead tr {
            background-color: rgb(96 165 250);
        }

        .table tbody tr {
            background-color: rgb(241 245 249);
            font-size: smaller;
        }

        .table thead th {
            vertical-align: bottom;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .card {
            margin: 15px;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 0.125);
            border-radius: 4px;
        }

        .card-body {
            padding: 15px;
        }

        .card-header {
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
        }

        .text-title {
            text-align: center;
            font-weight: bold;
        }

        .w-full {
            width: 100%;
        }
        .w-half {
            width: 50%;
        }
        .margin-top {
            margin-top: 1.25rem;
        }
    </style>
</head>

<body>
    <div class="w-full">
        <div class="card">
            <div class="card-header">
                <table class="w-full">
                    <tr>
                        <td class="text-title w-full">
                            <h2>Perpusweb</h2>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Pengembalian</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_peminjaman as $data)
                            <tr>
                                <td>
                                    {{ $data->id }}
                                </td>
                                <td>
                                    {{ $data->nama_peminjam }}
                                </td>
                                <td>
                                    {{ $data->judul }}
                                </td>
                                <td>
                                    {{ $data->tgl_pinjam }}
                                </td>
                                <td>
                                    {{ $data->tgl_pengembalian }}
                                </td>
                                <td>
                                    {{ $data->status_peminjam }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>
