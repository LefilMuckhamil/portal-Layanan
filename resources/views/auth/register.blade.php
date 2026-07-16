<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun - Portal Layanan Diskominsa</title>
    
    <!-- Font Awesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS v3 via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#071E3D',
                            royal: '#1F4287',
                            teal: '#278EA5',
                            cyan: '#21E6C1',
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'slide-in-right': 'slideInRight 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'slide-in-left': 'slideInLeft 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        slideInRight: {
                            '0%': { opacity: 0, transform: 'translateX(50px)' },
                            '100%': { opacity: 1, transform: 'translateX(0)' },
                        },
                        slideInLeft: {
                            '0%': { opacity: 0, transform: 'translateX(-50px)' },
                            '100%': { opacity: 1, transform: 'translateX(0)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #278EA5; border-radius: 4px; }
        
        /* Mencegah background input berubah warna saat autofill dari browser */
        input:-webkit-autofill { -webkit-box-shadow: 0 0 0 30px white inset !important; }
    </style>
</head>

<body class="h-full antialiased overflow-x-hidden selection:bg-brand-cyan selection:text-brand-dark">

    <div class="flex min-h-screen">
        
        <!-- SISI KIRI: BRANDING -->
        <div class="hidden lg:flex lg:w-5/12 bg-brand-dark relative overflow-hidden items-center justify-center animate-slide-in-left opacity-0">
            <div class="absolute inset-0 bg-gradient-to-tr from-brand-dark via-brand-royal to-brand-dark"></div>
            
            <!-- Ornamen Lingkaran Bercahaya -->
            <div class="absolute top-[-10%] right-[-10%] w-80 h-80 bg-brand-cyan/20 rounded-full blur-[80px]"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-96 h-96 bg-brand-teal/20 rounded-full blur-[100px]"></div>

            <div class="relative z-10 w-10/12 text-center">
                <!-- Ikon Floating -->
                <div class="mx-auto w-24 h-24 bg-white/10 backdrop-blur-md rounded-3xl border border-white/20 flex items-center justify-center mb-8 animate-float shadow-[0_0_30px_rgba(33,230,193,0.3)]">
                    <i class="fa-solid fa-user-shield text-5xl text-brand-cyan"></i>
                </div>
                
                <h1 class="text-4xl font-bold text-white mb-4 leading-tight">
                    Bergabung dengan <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-cyan to-brand-teal">
                        Diskominsa
                    </span>
                </h1>
                <p class="text-gray-300 text-lg mb-8">
                    Buat akun Anda untuk mulai mengajukan layanan TTE, Pembuatan Website Desa, dan E-Tracking.
                </p>

                <div class="bg-black/20 p-6 rounded-2xl border border-white/10 backdrop-blur-sm text-left inline-block">
                    <div class="flex items-center gap-3 text-brand-cyan mb-2">
                        <i class="fa-solid fa-circle-check"></i> <span class="text-white text-sm">Akses Layanan 24/7</span>
                    </div>
                    <div class="flex items-center gap-3 text-brand-cyan mb-2">
                        <i class="fa-solid fa-circle-check"></i> <span class="text-white text-sm">E-Tracking Realtime</span>
                    </div>
                    <div class="flex items-center gap-3 text-brand-cyan">
                        <i class="fa-solid fa-circle-check"></i> <span class="text-white text-sm">Keamanan Data Terjamin</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SISI KANAN: FORM REGISTER -->
        <div class="w-full lg:w-7/12 flex flex-col justify-center px-8 py-10 sm:px-16 lg:px-24 bg-white relative z-10 shadow-[-20px_0_50px_rgba(0,0,0,0.05)] animate-slide-in-right opacity-0">
            
            <div class="mx-auto w-full max-w-lg">
                
                <!-- Tombol Kembali ke Login -->
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-400 hover:text-brand-teal transition-colors mb-8 group">
                    <i class="fa-solid fa-arrow-left-long transition-transform group-hover:-translate-x-1"></i> Kembali ke Login
                </a>

                <div class="mb-8">
                    <h2 class="text-3xl font-bold tracking-tight text-brand-dark mb-2">Buat Akun Baru</h2>
                    <p class="text-gray-500 text-sm">Lengkapi data diri Anda di bawah ini dengan benar.</p>
                </div>

                <!-- Form Registrasi -->
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Pilihan Tipe Akun -->
                    <div class="flex gap-4 p-1 bg-gray-100 rounded-2xl mb-2">
                        <button type="button" id="btn-instansi" onclick="setRole('instansi')" class="w-1/2 py-2.5 text-sm font-bold rounded-xl bg-brand-teal text-white shadow-sm transition-all duration-300">
                            Instansi
                        </button>
                        <button type="button" id="btn-asn" onclick="setRole('asn')" class="w-1/2 py-2.5 text-sm font-bold rounded-xl bg-transparent text-gray-500 hover:text-brand-dark transition-all duration-300">
                            ASN
                        </button>
                        <input type="hidden" name="role" id="role_input" value="instansi">
                    </div>

                    <!-- Nama Lengkap -->
                    <div class="group">
                        <label for="name" class="block text-sm font-medium text-brand-dark mb-1 transition-colors group-focus-within:text-brand-teal">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-brand-teal">
                                <i class="fa-regular fa-user text-lg"></i>
                            </div>
                            <input id="name" name="name" type="text" required value="{{ old('name') }}" autofocus
                                class="block w-full rounded-2xl border-2 border-gray-100 bg-gray-50/50 pl-12 pr-4 py-3 text-brand-dark placeholder-gray-400 focus:bg-white focus:border-brand-teal focus:ring-0 transition-all hover:border-gray-200" 
                                placeholder="Contoh: Budi Santoso">
                        </div>
                        @if ($errors->get('name'))
                            <p class="mt-1 text-xs text-red-500 font-medium">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <!-- Alamat Email -->
                    <div class="group">
                        <label for="email" class="block text-sm font-medium text-brand-dark mb-1 transition-colors group-focus-within:text-brand-teal">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-brand-teal">
                                <i class="fa-regular fa-envelope text-lg"></i>
                            </div>
                            <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                class="block w-full rounded-2xl border-2 border-gray-100 bg-gray-50/50 pl-12 pr-4 py-3 text-brand-dark placeholder-gray-400 focus:bg-white focus:border-brand-teal focus:ring-0 transition-all hover:border-gray-200" 
                                placeholder="budi@email.com">
                        </div>
                        @if ($errors->get('email'))
                            <p class="mt-1 text-xs text-red-500 font-medium">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <!-- Input Identitas (KTP / NIP) -->
                    <div class="group">
                        <label id="label-identitas" for="input-identitas" class="block text-sm font-medium text-brand-dark mb-1 transition-colors group-focus-within:text-brand-teal">Nomor KTP (NIK)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-brand-teal">
                                <i id="icon-identitas" class="fa-regular fa-id-card text-lg"></i>
                            </div>
                            <input id="input-identitas" name="nik" type="number" required value="{{ old('nik') ?? old('nip') }}"
                                class="block w-full rounded-2xl border-2 border-gray-100 bg-gray-50/50 pl-12 pr-4 py-3 text-brand-dark placeholder-gray-400 focus:bg-white focus:border-brand-teal focus:ring-0 transition-all hover:border-gray-200" 
                                placeholder="Masukkan 16 digit NIK">
                        </div>
                        @if ($errors->get('nik') || $errors->get('nip'))
                            <p class="mt-1 text-xs text-red-500 font-medium">{{ $errors->first('nik') ?? $errors->first('nip') }}</p>
                        @endif
                    </div>

                    <!-- Input Nomor HP -->
                    <div class="group">
                        <label for="phone" class="block text-sm font-medium text-brand-dark mb-1 transition-colors group-focus-within:text-brand-teal">Nomor WhatsApp / HP</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-brand-teal">
                                <i class="fa-solid fa-phone text-lg"></i>
                            </div>
                            <input id="phone" name="phone" type="number" required value="{{ old('phone') }}"
                                class="block w-full rounded-2xl border-2 border-gray-100 bg-gray-50/50 pl-12 pr-4 py-3 text-brand-dark placeholder-gray-400 focus:bg-white focus:border-brand-teal focus:ring-0 transition-all hover:border-gray-200" 
                                placeholder="08xxxxxxxxxx">
                        </div>
                        @if ($errors->get('phone'))
                            <p class="mt-1 text-xs text-red-500 font-medium">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>

                    <!-- Grid untuk Password & Konfirmasi Password -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        
                        <!-- Password -->
                        <div class="group">
                            <label for="password" class="block text-sm font-medium text-brand-dark mb-1 transition-colors group-focus-within:text-brand-teal">Kata Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-brand-teal">
                                    <i class="fa-solid fa-lock text-lg"></i>
                                </div>
                                <input id="password" name="password" type="password" required
                                    class="block w-full rounded-2xl border-2 border-gray-100 bg-gray-50/50 pl-12 pr-10 py-3 text-brand-dark placeholder-gray-400 focus:bg-white focus:border-brand-teal focus:ring-0 transition-all hover:border-gray-200" 
                                    placeholder="Minimal 8 karakter">
                            </div>
                            @if ($errors->get('password'))
                                <p class="mt-1 text-xs text-red-500 font-medium">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="group">
                            <label for="password_confirmation" class="block text-sm font-medium text-brand-dark mb-1 transition-colors group-focus-within:text-brand-teal">Ulangi Sandi</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-400 group-focus-within:text-brand-teal">
                                    <i class="fa-solid fa-lock-open text-lg"></i>
                                </div>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                    class="block w-full rounded-2xl border-2 border-gray-100 bg-gray-50/50 pl-12 pr-10 py-3 text-brand-dark placeholder-gray-400 focus:bg-white focus:border-brand-teal focus:ring-0 transition-all hover:border-gray-200" 
                                    placeholder="Ketik ulang sandi">
                            </div>
                            @if ($errors->get('password_confirmation'))
                                <p class="mt-1 text-xs text-red-500 font-medium">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="pt-4">
                        <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-2xl text-white bg-brand-royal hover:bg-brand-dark hover:shadow-[0_8px_20px_rgba(31,66,135,0.3)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-teal transition-all duration-300 overflow-hidden">
                            <span class="relative flex items-center gap-2 z-10">
                                Daftar Sekarang <i class="fa-solid fa-user-plus transition-transform group-hover:scale-110"></i>
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Ketentuan -->
                <p class="mt-6 text-center text-xs text-gray-400">
                    Dengan mendaftar, Anda menyetujui <a href="#" class="text-brand-teal hover:underline">Syarat & Ketentuan</a> serta <a href="#" class="text-brand-teal hover:underline">Kebijakan Privasi</a> Portal Layanan Diskominsa.
                </p>
            </div>
        </div>
    </div>

    <!-- Script Logika Pemilihan Role -->
    <script>
        function setRole(role) {
            // Update hidden input untuk dikirim ke Laravel
            document.getElementById('role_input').value = role;
            
            // Ambil elemen-elemen yang perlu diubah
            const btnInstansi = document.getElementById('btn-instansi');
            const btnAsn = document.getElementById('btn-asn');
            const labelIdentitas = document.getElementById('label-identitas');
            const inputIdentitas = document.getElementById('input-identitas');
            const iconIdentitas = document.getElementById('icon-identitas');

            // Class untuk tombol aktif dan tidak aktif agar kode JS lebih rapi
            const activeClass = "w-1/2 py-2.5 text-sm font-bold rounded-xl bg-brand-teal text-white shadow-sm transition-all duration-300";
            const inactiveClass = "w-1/2 py-2.5 text-sm font-bold rounded-xl bg-transparent text-gray-500 hover:text-brand-dark transition-all duration-300";

            if (role === 'instansi') {
                btnInstansi.className = activeClass;
                btnAsn.className = inactiveClass;
                
                labelIdentitas.innerText = "Nomor KTP (NIK)";
                inputIdentitas.name = "nik";
                inputIdentitas.placeholder = "Masukkan 16 digit NIK";
                iconIdentitas.className = "fa-regular fa-id-card text-lg";
            } else {
                btnAsn.className = activeClass;
                btnInstansi.className = inactiveClass;
                
                labelIdentitas.innerText = "Nomor ASN (NIP)";
                inputIdentitas.name = "nip";
                inputIdentitas.placeholder = "Masukkan Nomor Induk Pegawai (NIP)";
                iconIdentitas.className = "fa-regular fa-id-badge text-lg";
            }
        }
    </script>
</body>
</html>