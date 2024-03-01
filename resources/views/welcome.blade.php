<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" href="/images/css/app.css" />


</head>

<body class="bg-gray-100">

    <header>
        <div class="container-fluid">
            <div id="welcome-section" class="intro-text">
                <div class="logo">
                    <img src="http://localhost:8000/logoperpus.png" alt="Logo" class="light-background" style="width: 100px;">
                </div>
                <div class="intro-lead-in">Selamat Datang Di Perpustakaan Digital</div>
                <h2>Selamat Datang di Perpustakaan Digital Kami!
                    apatkan akses ke koleksi terbaru dari berbagai genre, penulis terkenal, dan topik menarik.
                </h2>
                <a href="{{ route('login.login') }}" class="page-scroll btn btn-xl">Jelajahi Aplikasi</a>
            </div>
        </div>
    </header>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>