<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    
</head>
<body class="bg-gray-100">
    
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8">Selamat datang di Perpustakaan Digital</h1>
        
        <p class="text-lg mb-4">Selamat Datang di Perpustakaan Digital Kami!
        Dapatkan akses ke koleksi terbaru dari berbagai genre, penulis terkenal, dan topik menarik.</p>

        <a href="{{ route('layouts.tabel-data') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Jelajahi Koleksi</a>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
