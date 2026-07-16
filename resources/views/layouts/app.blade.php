<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Layanan Diskominsa Aceh Barat</title>
    
    <!-- Pemanggilan CSS bawaan -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* CSS Murni Dasar agar rapi */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f7f6; }
        .navbar { background-color: #004a87; color: white; padding: 15px 20px; display: flex; justify-content: space-between; }
        .navbar a { color: white; text-decoration: none; margin-left: 15px; }
        .container { padding: 20px; min-height: 80vh; }
        .footer { background-color: #333; color: white; text-align: center; padding: 10px; margin-top: auto; }
    </style>
</head>
<body>

    <!-- NAVBAR SEDERHANA -->
    <nav class="navbar">
        <div>
            <strong>DISKOMINSA ACEH BARAT</strong>
        </div>
        <div>
            <a href="/">Beranda</a>
            
            <!-- Logika simpel: Jika belum login tampilkan tombol Login, jika sudah login tampilkan Dashboard -->
            @guest
                <a href="{{ route('login') }}">Login Admin</a>
            @else
                <a href="{{ route('dashboard') }}">Dashboard Saya</a>
                
                <!-- Form Logout Standar Laravel -->
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:white; cursor:pointer; margin-left:15px; font-size:16px;">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </nav>

    <!-- AREA KONTEN UTAMA YANG BERUBAH-UBAH -->
    <div class="container">
        @yield('content')
    </div>

    <!-- FOOTER UTAMA -->
    <footer class="footer">
        <p>&copy; 2026 Diskominsa Aceh Barat</p>
    </footer>

</body>
</html>