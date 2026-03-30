<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kredit</title>
    <!-- Tambahkan CSS bawaan Laravel (Vite) -->
    @vite('resources/css/app.css')
</head>
<body class="bg-light">

    <!-- Navbar sederhana -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Aplikasi Kredit</a>
        </div>
    </nav>

    <!-- Konten utama -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; {{ date('Y') }} Aplikasi Kredit. Semua Hak Dilindungi.
    </footer>

    <!-- Tambahkan JS bawaan Laravel (Vite) -->
    @vite('resources/js/app.js')
</body>
</html>