<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Portal Layanan & E-Tracking Diskominsa</title>
    <!-- Tailwind & FontAwesome -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js untuk Animasi & Interaksi Ringan (Tanpa Beban) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50/50">

    <!-- Kontainer Utama dengan state Alpine.js -->
    <div x-data="{ sidebarOpen: false, activeTab: 'semua', trackingModal: false, selectedTrack: {} }" class="flex h-screen overflow-hidden">

        <!-- ========================================== -->
        <!-- SIDEBAR (NAVIGASI UTAMA) -->
        <!-- ========================================== -->
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-20 bg-slate-900/40 lg:hidden" @click="sidebarOpen = false"></div>

        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-68 transition-transform duration-300 transform bg-slate-900 lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-xl">
            <!-- Branding Header -->
            <div class="flex items-center gap-3 px-6 h-20 border-b border-slate-800/60 bg-slate-950/20">
                <div class="w-9 h-9 rounded-xl bg-emerald-500 flex items-center justify-center text-white shadow-lg shadow-emerald-500/20 animate-pulse">
                    <i class="fa-solid fa-satellite-dish text-sm"></i>
                </div>
                <div>
                    <span class="text-sm font-bold tracking-wider text-white block">DISKOMINSA</span>
                    <span class="text-[10px] text-slate-400 font-medium block uppercase tracking-tight">Kab. Aceh Barat</span>
                </div>
            </div>

            <!-- Menu Navigasi Berdasarkan Layanan Anda -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto custom-scrollbar">
                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-2">Utama</div>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-white bg-emerald-600/10 border-l-4 border-emerald-500 rounded-r-xl transition-all">
                    <i class="fa-solid fa-grid-horizontal text-emerald-400 w-5"></i>
                    <span class="text-sm font-medium">Dashboard Overview</span>
                </a>

                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 pt-4 mb-2">Layanan Digital</div>
                <!-- 1. Teknis & Website Desa/Pesantren -->
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all group">
                    <i class="fa-solid fa-globe w-5 group-hover:text-emerald-400 transition-colors"></i>
                    <span class="text-sm font-medium">Web Desa & Ponpes</span>
                </a>
                <!-- 2. Gemail ASN & Instansi -->
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all group">
                    <i class="fa-solid fa-envelope-open-text w-5 group-hover:text-emerald-400 transition-colors"></i>
                    <span class="text-sm font-medium">Email ASN & Instansi</span>
                </a>
                <!-- 3. Cloud Government -->
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all group">
                    <i class="fa-solid fa-cloud-arrow-up w-5 group-hover:text-emerald-400 transition-colors"></i>
                    <span class="text-sm font-medium">Cloud Government</span>
                </a>
                <!-- 4. Layanan TTE -->
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all group">
                    <i class="fa-solid fa-file-signature w-5 group-hover:text-emerald-400 transition-colors"></i>
                    <span class="text-sm font-medium">Layanan TTE</span>
                </a>

                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 pt-4 mb-2">Sub Layanan & Support</div>
                <!-- Sub Layanan: Riset PW OTP -->
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all group bg-amber-500/5 border border-amber-500/10">
                    <i class="fa-solid fa-key-skeleton w-5 text-amber-400"></i>
                    <span class="text-sm font-medium">Riset PW OTP</span>
                </a>
                <!-- 5. Layanan Bantuan -->
                <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all group">
                    <i class="fa-solid fa-headset w-5 group-hover:text-emerald-400 transition-colors"></i>
                    <span class="text-sm font-medium">Helpdesk Bantuan</span>
                </a>
            </nav>

            <!-- Bottom Profile / Logout -->
            <div class="p-4 border-t border-slate-800/60 bg-slate-950/10">
    <!-- Form Logout Laravel -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-slate-400 hover:text-rose-400 hover:bg-rose-500/5 rounded-xl transition-all text-left">
            <i class="fa-solid fa-power-off text-sm"></i>
            <span class="text-sm font-medium">Keluar Sistem</span>
        </button>
    </form>
</div>
        </aside>

        <!-- ========================================== -->
        <!-- AREA KONTEN UTAMA -->
        <!-- ========================================== -->
        <div class="flex flex-col flex-1 overflow-hidden">
            
            <!-- TOP NAVBAR -->
            <header class="flex items-center justify-between px-8 py-4 bg-white border-b border-slate-100 shadow-sm z-10">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="text-slate-500 hover:text-slate-800 lg:hidden focus:outline-none">
                        <i class="fa-solid fa-bars-staggered text-xl"></i>
                    </button>
                    <div>
                        <h2 class="text-md font-bold text-slate-800">Portal Layanan & E-Tracking</h2>
                        <p class="text-[11px] text-slate-400 font-medium">Diskominsa Kabupaten Aceh Barat</p>
                    </div>
                </div>

                <!-- Aksi Pengguna & Notifikasi -->
                <div class="flex items-center gap-4">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="relative w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 text-slate-500 hover:text-emerald-600 hover:bg-emerald-50 transition-all flex items-center justify-center">
                            <i class="fa-regular fa-bell text-lg"></i>
                            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-amber-500 rounded-full"></span>
                        </button>
                        <!-- Dropdown Notif Ringan -->
                        <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-80 bg-white border border-slate-100 rounded-2xl shadow-xl py-2 z-30">
                            <div class="px-4 py-2 border-b border-slate-50 font-bold text-xs text-slate-700">Notifikasi Masuk</div>
                            <a href="#" class="block px-4 py-3 hover:bg-slate-50 transition-colors">
                                <p class="text-xs text-slate-600 font-medium">Permohonan OTP Reset Password Baru masuk dari NIP. 19890123...</p>
                                <span class="text-[10px] text-slate-400">2 menit yang lalu</span>
                            </a>
                        </div>
                    </div>

                    <!-- Profil Admin -->
                    <div class="flex items-center gap-3 pl-2 border-l border-slate-100">
                        <img class="w-9 h-9 rounded-xl object-cover ring-2 ring-emerald-50" src="https://ui-avatars.com/api/?name=Admin+Diskominsa&background=10b981&color=fff" alt="Avatar">
                        <div class="hidden md:block text-left">
                            <p class="text-xs font-bold text-slate-700">Admin Diskominsa</p>
                            <p class="text-[10px] text-slate-400 font-medium">Petugas Teknis</p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ISI UTAMA DASHBOARD -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50/60 p-8">
                
                <!-- Welcome Banner Ringan & Anggun -->
                <div class="mb-8 p-6 bg-gradient-to-r from-slate-900 to-slate-800 rounded-3xl text-white relative overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md">
                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <span class="px-3 py-1 bg-emerald-500/20 text-emerald-400 rounded-full text-[10px] font-bold tracking-wider uppercase inline-block mb-2 border border-emerald-500/30">Monitoring Sistem</span>
                            <h1 class="text-xl md:text-2xl font-bold tracking-tight">Rancang Bangun Portal Layanan E-Tracking</h1>
                            <p class="text-xs text-slate-400 mt-1 font-medium">Kelola dan tracking seluruh pengajuan layanan digital internal maupun eksternal Aceh Barat.</p>
                        </div>
                        <div class="text-xs font-medium bg-white/5 border border-white/10 px-4 py-2 rounded-2xl backdrop-blur-sm">
                            <i class="fa-regular fa-clock text-emerald-400 mr-2 animate-spin-slow"></i>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                        </div>
                    </div>
                    <!-- Dekorasi Background Transparan Ringan -->
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-emerald-500/10 rounded-full blur-2xl"></div>
                </div>

                <!-- ========================================== -->
                <!-- 5 KARTU COUNTER LAYANAN UTAMA -->
                <!-- ========================================== -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 mb-8">
                    <!-- 1. Web Desa / Ponpes -->
                    <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-md mb-4"><i class="fa-solid fa-globe"></i></div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Web Desa/Ponpes</p>
                        <p class="text-xl font-black text-slate-800 mt-1">14 <span class="text-xs font-medium text-slate-400">Berkas</span></p>
                    </div>
                    <!-- 2. Gemail ASN -->
                    <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-md mb-4"><i class="fa-solid fa-envelope-open-text"></i></div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Email ASN</p>
                        <p class="text-xl font-black text-slate-800 mt-1">45 <span class="text-xs font-medium text-slate-400">Akun</span></p>
                    </div>
                    <!-- 3. Cloud Government -->
                    <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-md mb-4"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Cloud Gov</p>
                        <p class="text-xl font-black text-slate-800 mt-1">8 <span class="text-xs font-medium text-slate-400">Instansi</span></p>
                    </div>
                    <!-- 4. Layanan TTE -->
                    <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                        <div class="w-10 h-10 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center text-md mb-4"><i class="fa-solid fa-file-signature"></i></div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Layanan TTE</p>
                        <p class="text-xl font-black text-slate-800 mt-1">29 <span class="text-xs font-medium text-slate-400">Sertifikat</span></p>
                    </div>
                    <!-- 5. Riset PW OTP (Sub Layanan) -->
                    <div class="p-5 bg-white rounded-2xl border border-amber-100 bg-amber-50/10 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-md mb-4"><i class="fa-solid fa-key-skeleton"></i></div>
                        <p class="text-[11px] font-bold text-amber-700 uppercase tracking-wider">Request OTP PW</p>
                        <p class="text-xl font-black text-amber-900 mt-1">12 <span class="text-xs font-medium text-amber-500">Antrean</span></p>
                    </div>
                </div>

                <!-- ========================================== -->
                <!-- E-TRACKING LIVE DATA & AKTIVITAS -->
                <!-- ========================================== -->
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                    <!-- Filter Tab Interaktif Ringan -->
                    <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white">
                        <div>
                            <h2 class="text-lg font-bold text-slate-800">E-Tracking Antrean Layanan</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Pantau status berkas secara realtime dan interaktif.</p>
                        </div>
                        <div class="flex flex-wrap gap-1.5 bg-slate-50 p-1.5 rounded-2xl border border-slate-200/60 w-max">
                            <button @click="activeTab = 'semua'" :class="activeTab === 'semua' ? 'bg-white text-slate-800 shadow-sm font-bold' : 'text-slate-500 hover:text-slate-800'" class="px-4 py-1.5 text-xs font-medium rounded-xl transition-all">Semua</button>
                            <button @click="activeTab = 'proses'" :class="activeTab === 'proses' ? 'bg-white text-slate-800 shadow-sm font-bold' : 'text-slate-500 hover:text-slate-800'" class="px-4 py-1.5 text-xs font-medium rounded-xl transition-all">Diproses</button>
                            <button @click="activeTab = 'otp'" :class="activeTab === 'otp' ? 'bg-white text-slate-800 shadow-sm font-bold' : 'text-slate-500 hover:text-slate-800'" class="px-4 py-1.5 text-xs font-medium rounded-xl transition-all">Riset PW OTP</button>
                        </div>
                    </div>

                    <!-- Tabel Utama -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-slate-500">
                            <thead class="text-xs text-slate-400 bg-slate-50/50 border-b border-slate-100 font-bold uppercase tracking-wider">
                                <tr>
                                    <th scope="col" class="px-6 py-4">ID Pemohon / Instansi</th>
                                    <th scope="col" class="px-6 py-4">Jenis Layanan</th>
                                    <th scope="col" class="px-6 py-4">Progress Tracking</th>
                                    <th scope="col" class="px-6 py-4">Status Akhir</th>
                                    <th scope="col" class="px-6 py-4 text-center">Detail Tracking</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                
                                <!-- Baris Data 1 (Layanan Website) -->
                                <tr x-show="activeTab === 'semua' || activeTab === 'proses'" class="hover:bg-slate-50/60 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-slate-700 text-sm">Pondok Pesantren Bahrul Ulum</div>
                                        <div class="text-[11px] text-slate-400 font-medium">Kec. Johan Pahlawan</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold bg-blue-50 text-blue-600 border border-blue-100">Web Ponpes</span>
                                    </td>
                                    <td class="px-6 py-4 w-1/3">
                                        <!-- Mini Tracking Progress Bar -->
                                        <div class="w-full">
                                            <div class="flex justify-between text-[10px] text-slate-400 mb-1 font-semibold">
                                                <span>Tahap 3: Pembuatan Sistem</span>
                                                <span>75%</span>
                                            </div>
                                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                                <div class="h-full bg-blue-500 rounded-full transition-all duration-500" style="width: 75%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-bold text-amber-700 bg-amber-50 rounded-full border border-amber-100"><span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-ping"></span>Diproses</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <!-- Pemicu Modal Tracking Ringan -->
                                        <button @click="selectedTrack = { nama: 'Ponpes Bahrul Ulum', jenis: 'Pembuatan Website', t1: 'Selesai', t2: 'Selesai', t3: 'Sedang Berjalan', t4: 'Belum' }; trackingModal = true" class="px-3 py-1.5 bg-slate-50 hover:bg-emerald-50 text-slate-600 hover:text-emerald-600 rounded-xl text-xs font-bold border border-slate-200 transition-colors">
                                            <i class="fa-solid fa-route mr-1"></i> Track
                                        </button>
                                    </td>
                                </tr>

                                <!-- Baris Data 2 (Sub Layanan Riset PW OTP) -->
                                <tr x-show="activeTab === 'semua' || activeTab === 'otp'" class="hover:bg-slate-50/60 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-slate-700 text-sm">Dr. Syarifah, M.Si (NIP. 1980021...)</div>
                                        <div class="text-[11px] text-slate-400 font-medium">Dinas Kesehatan Aceh Barat</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 rounded-lg text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-100">Riset PW OTP</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full">
                                            <div class="flex justify-between text-[10px] text-slate-400 mb-1 font-semibold">
                                                <span>Tahap 2: Menunggu Verifikasi OTP</span>
                                                <span>40%</span>
                                            </div>
                                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                                <div class="h-full bg-amber-500 rounded-full" style="width: 40%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-1 text-xs font-bold text-purple-700 bg-purple-50 rounded-full border border-purple-100">Validasi OTP</span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button @click="selectedTrack = { nama: 'Dr. Syarifah, M.Si', jenis: 'Riset Password Akun', t1: 'Selesai', t2: 'Menunggu Kode OTP', t3: 'Belum', t4: 'Belum' }; trackingModal = true" class="px-3 py-1.5 bg-slate-50 hover:bg-emerald-50 text-slate-600 hover:text-emerald-600 rounded-xl text-xs font-bold border border-slate-200 transition-colors">
                                            <i class="fa-solid fa-route mr-1"></i> Track
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

        <!-- ========================================== -->
        <!-- INTERACTIVE E-TRACKING MODAL (POP-UP JALUR PROSES) -->
        <!-- ========================================== -->
        <div x-show="trackingModal" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
            <!-- Background Overlay Halus -->
            <div x-show="trackingModal" x-transition.opacity class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="trackingModal = false"></div>
            
            <!-- Isi Modal -->
            <div x-show="trackingModal" x-transition.scale.85 class="relative bg-white rounded-3xl shadow-2xl border border-slate-100 w-full max-w-lg p-6 overflow-hidden z-10">
                <div class="flex justify-between items-center pb-4 border-b border-slate-100">
                    <div>
                        <h3 class="font-bold text-slate-800 text-base" x-text="selectedTrack.nama"></h3>
                        <p class="text-xs text-slate-400" x-text="'Layanan: ' + selectedTrack.jenis"></p>
                    </div>
                    <button @click="trackingModal = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-lg"></i></button>
                </div>

                <!-- Jalur Tracking Interaktif Step-by-Step -->
                <div class="py-6 space-y-6 relative before:absolute before:inset-0 before:left-4 before:top-8 before:w-0.5 before:bg-slate-100">
                    
                    <!-- Step 1 -->
                    <div class="flex items-start gap-4 relative">
                        <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold z-10 shadow-lg shadow-emerald-500/20">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-800">Tahap 1: Berkas Diterima / Diinput</h4>
                            <p class="text-[11px] text-slate-400 mt-0.5">Permohonan terdaftar di sistem Portal Utama.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex items-start gap-4 relative">
                        <div :class="selectedTrack.t2 === 'Selesai' ? 'bg-emerald-500 text-white shadow-emerald-500/20' : (selectedTrack.t2 === 'Menunggu Kode OTP' ? 'bg-amber-500 text-white shadow-amber-500/20 animate-pulse' : 'bg-slate-200 text-slate-400')" class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold z-10 shadow-lg">
                            <i :class="selectedTrack.t2 === 'Selesai' ? 'fa-solid fa-check' : 'fa-solid fa-spinner animate-spin-slow'"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-800">Tahap 2: Verifikasi Data & OTP Teknis</h4>
                            <p class="text-[11px] text-slate-400 mt-0.5" x-text="selectedTrack.t2 === 'Selesai' ? 'Data ASN/Instansi dinyatakan Valid.' : 'Sistem menunggu input kode unik OTP / kelengkapan berkas.'"></p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex items-start gap-4 relative">
                        <div :class="selectedTrack.t3 === 'Sedang Berjalan' ? 'bg-blue-500 text-white shadow-blue-500/20 animate-pulse' : (selectedTrack.t3 === 'Selesai' ? 'bg-emerald-500 text-white' : 'bg-slate-200 text-slate-400')" class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold z-10 shadow-lg">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-800">Tahap 3: Eksekusi Tim Teknis Diskominsa</h4>
                            <p class="text-[11px] text-slate-400 mt-0.5">Pembuatan akun gemail, setup cloud server, config web, atau sinkronisasi sertifikat TTE.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex items-start gap-4 relative">
                        <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-400 flex items-center justify-center text-xs font-bold z-10">
                            <i class="fa-solid fa-flag-checkered"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-slate-800">Tahap 4: Penyerahan Layanan & Selesai</h4>
                            <p class="text-[11px] text-slate-400 mt-0.5">Akun/Sistem diserahkan kepada instansi/ASN pemohon.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button @click="trackingModal = false" class="px-4 py-2 bg-slate-800 hover:bg-slate-950 text-white rounded-xl text-xs font-bold transition-colors">Tutup Pandangan</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Tambahan Style Kustom untuk Scrollbar Halus -->
    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: rgba(0,0,0,0.05); }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
        [x-cloak] { display: none !important; }
        .animate-spin-slow { animation: spin 4s linear infinite; }
    </style>
</body>
</html>