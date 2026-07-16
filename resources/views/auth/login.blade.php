<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Portal Layanan Diskominsa') }} - Masuk</title>
    
    <!-- Tailwind CSS v3 via CDN dengan Konfigurasi Kustom -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#071E3D',    /* Sangat Gelap */
                            royal: '#1F4287',   /* Biru Terang */
                            teal: '#278EA5',    /* Tosca */
                            cyan: '#21E6C1',    /* Cyan Menyala */
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: 0, transform: 'translateY(40px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #278EA5; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #1F4287; }

        /* Input autofill fix for dark borders */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px white inset !important;
        }
    </style>
</head>
<body class="h-full antialiased overflow-x-hidden selection:bg-brand-cyan selection:text-brand-dark">

<!-- Notifikasi Session -->
@if (session('status'))
    <div class="fixed top-5 right-5 z-50 bg-brand-teal text-white px-6 py-3 rounded-xl shadow-2xl text-sm border border-brand-cyan animate-fade-in-up">
        <i class="fa-solid fa-circle-check mr-2"></i> {{ session('status') }}
    </div>
@endif

<div class="flex min-h-screen">
    
    <!-- SISI KIRI: FORM LOGIN (Interaktif & Bersih) -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 py-12 sm:px-16 lg:px-24 bg-white relative z-10 shadow-[20px_0_50px_rgba(0,0,0,0.05)]">
        
        <div class="mx-auto w-full max-w-md animate-fade-in-up" style="opacity: 0;">
            
            <!-- Logo Mobile Only -->
            <div class="lg:hidden flex items-center justify-center gap-3 mb-10">
                <div class="w-12 h-12 bg-gradient-to-tr from-brand-royal to-brand-teal rounded-xl flex items-center justify-center text-white shadow-lg">
                    <i class="fa-solid fa-fingerprint text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-brand-dark tracking-tight">DISKOMINSA</h1>
            </div>

            <div class="mb-10 text-center lg:text-left">
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-brand-dark mb-2">Selamat Datang! <span class="text-brand-teal"></span></h2>
                <p class="text-sm sm:text-base text-gray-500">Silakan masukkan kredensial Anda untuk mengakses portal layanan.</p>
            </div>

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Input Email -->
                <div class="group">
                    <label for="email" class="block text-sm font-medium text-brand-dark mb-2 transition-colors group-focus-within:text-brand-teal">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-brand-teal transition-colors">
                            <i class="fa-regular fa-envelope text-lg"></i>
                        </div>
                        <input id="email" name="email" type="email" required value="{{ old('email') }}" autofocus
                            class="block w-full rounded-2xl border-2 border-gray-100 bg-gray-50/50 pl-12 pr-4 py-3.5 text-brand-dark placeholder-gray-400 focus:bg-white focus:border-brand-teal focus:ring-0 focus:outline-none transition-all duration-300 hover:border-gray-200" 
                            placeholder="Example@gmail.com">
                    </div>
                    @if ($errors->get('email'))
                        <p class="mt-2 text-sm text-red-500 font-medium bg-red-50 py-1 px-3 rounded-lg"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Input Password -->
                <div class="group">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-medium text-brand-dark transition-colors group-focus-within:text-brand-teal">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-semibold text-brand-teal hover:text-brand-royal transition-colors">Lupa sandi?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-brand-teal transition-colors">
                            <i class="fa-solid fa-lock-open text-lg"></i>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="block w-full rounded-2xl border-2 border-gray-100 bg-gray-50/50 pl-12 pr-12 py-3.5 text-brand-dark placeholder-gray-400 focus:bg-white focus:border-brand-teal focus:ring-0 focus:outline-none transition-all duration-300 hover:border-gray-200" 
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-brand-teal transition-colors focus:outline-none">
                            <i id="eye-icon" class="fa-regular fa-eye-slash text-lg"></i>
                        </button>
                    </div>
                    @if ($errors->get('password'))
                        <p class="mt-2 text-sm text-red-500 font-medium bg-red-50 py-1 px-3 rounded-lg"><i class="fa-solid fa-circle-exclamation mr-1"></i> {{ $errors->first('password') }}</p>
                    @endif
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <label class="flex items-center cursor-pointer group select-none">
                        <div class="relative flex items-center justify-center">
                            <input type="checkbox" name="remember" id="remember_me" class="peer appearance-none w-5 h-5 border-2 border-gray-300 rounded-lg checked:bg-brand-teal checked:border-brand-teal focus:outline-none transition-all">
                            <i class="fa-solid fa-check absolute text-white text-xs opacity-0 peer-checked:opacity-100 transition-opacity"></i>
                        </div>
                        <span class="ml-3 text-sm text-gray-600 group-hover:text-brand-dark transition-colors">Ingat sesi saya</span>
                    </label>
                </div>

                <!-- Tombol Submit Dinamis -->
                <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-2xl text-brand-dark bg-brand-cyan hover:bg-brand-teal hover:text-white hover:shadow-[0_0_20px_rgba(33,230,193,0.4)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-teal transition-all duration-300 overflow-hidden">
                    <!-- Efek kilap pada tombol -->
                    <div class="absolute inset-0 bg-white/20 translate-x-[-100%] skew-x-[-15deg] group-hover:animate-[shine_1.5s_ease-in-out]"></div>
                    <span class="relative flex items-center gap-2 z-10">
                        Masuk ke Portal <i class="fa-solid fa-arrow-right-to-bracket transition-transform group-hover:translate-x-1"></i>
                    </span>
                </button>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Warga baru? 
                <a href="{{ route('register') }}" class="font-bold text-brand-royal hover:text-brand-cyan transition-colors relative after:content-[''] after:absolute after:w-full after:scale-x-0 after:h-[2px] after:bottom-0 after:left-0 after:bg-brand-cyan after:origin-bottom-right after:transition-transform after:duration-300 hover:after:scale-x-100 hover:after:origin-bottom-left">Buat akun sekarang</a>
            </p>
        </div>
    </div>

    <!-- SISI KANAN: BRANDING (Desain Baru dengan Tema Gelap & Elemen Melayang) -->
    <div class="hidden lg:flex lg:w-1/2 bg-brand-dark relative overflow-hidden items-center justify-center">
        <!-- Latar Belakang Gradient Dinamis -->
        <div class="absolute inset-0 bg-gradient-to-br from-brand-dark via-brand-royal to-brand-dark"></div>
        
        <!-- Elemen Dekoratif Bercahaya (Glows) -->
        <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-brand-teal/30 rounded-full blur-[100px] animate-pulse-slow"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-brand-cyan/20 rounded-full blur-[100px] animate-pulse-slow" style="animation-delay: 2s;"></div>

        <!-- Kontainer Kaca (Glassmorphism) -->
        <div class="relative z-10 w-10/12 max-w-lg">
            
            <!-- Elemen Abstrak Melayang 1 -->
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-gradient-to-tr from-brand-teal to-brand-cyan rounded-3xl opacity-80 blur-[2px] animate-float rotate-12 shadow-[0_0_30px_rgba(33,230,193,0.5)]"></div>
            
            <!-- Elemen Abstrak Melayang 2 -->
            <div class="absolute -bottom-10 -left-10 w-16 h-16 bg-gradient-to-br from-brand-royal to-brand-teal rounded-full opacity-90 blur-[1px] animate-float-delayed shadow-xl"></div>

            <!-- Card Utama -->
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 p-10 rounded-[2.5rem] shadow-2xl relative overflow-hidden">
                <!-- Efek Kaca Diagonal -->
                <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-white/10 to-transparent transform -skew-y-12 origin-top-left"></div>

                <div class="relative z-10">
                    <!-- Ikon Utama -->
                    <div class="w-16 h-16 bg-brand-cyan/20 rounded-2xl flex items-center justify-center mb-8 border border-brand-cyan/30 shadow-[0_0_15px_rgba(33,230,193,0.3)]">
                        <i class="fa-solid fa-network-wired text-3xl text-brand-cyan"></i>
                    </div>

                    <h1 class="text-4xl font-bold text-white mb-4 leading-tight">
                        Portal Layanan <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-cyan to-brand-teal">
                           Diskominsa
                        </span>
                    </h1>
                    
                    <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                        Dinas Komunikasi, Informatika dan Persandian Aceh Barat
                    </p>

                    <!-- Indikator Layanan -->
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 bg-black/20 p-4 rounded-2xl border border-white/5 hover:bg-black/30 transition-colors cursor-default">
                            <div class="w-10 h-10 bg-brand-royal/50 rounded-full flex items-center justify-center text-brand-cyan">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-medium text-sm">Layanan Website & Email</h4>
                                <p class="text-gray-400 text-xs mt-0.5">Pembuatan domain desa & ASN</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 bg-black/20 p-4 rounded-2xl border border-white/5 hover:bg-black/30 transition-colors cursor-default">
                            <div class="w-10 h-10 bg-brand-royal/50 rounded-full flex items-center justify-center text-brand-cyan">
                                <i class="fa-solid fa-file-signature"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-medium text-sm">Tanda Tangan Elektronik (TTE)</h4>
                                <p class="text-gray-400 text-xs mt-0.5">Layanan legalitas digital</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Kanan -->
            <div class="mt-8 text-center">
                <p class="text-brand-teal/70 text-sm font-medium tracking-wider uppercase">
                    &copy; 2026 Diskominsa Aceh Barat
                </p>
            </div>
        </div>
    </div>

</div>

<!-- Script Interaktivitas Tambahan -->
<style>
    @keyframes shine {
        100% { transform: translateX(200%) skew-x(-15deg); }
    }
</style>
<script>
    // Logika Mata Password
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }
</script>

</body>
</html>