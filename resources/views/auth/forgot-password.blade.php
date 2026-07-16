<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemulihan Sandi - Portal Layanan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; margin: 0; 
        }
    </style>
</head>
<body class="bg-white min-h-screen font-sans antialiased text-slate-800">

    <div class="min-h-screen grid grid-cols-1 lg:grid-cols-12">
        
        <!-- KOLOM KIRI: Form Input (Clean White Background) -->
        <div class="lg:col-span-6 flex flex-col justify-between p-8 sm:p-12 lg:p-16 xl:p-20">
            <div>
                <!-- Logo / Icon Kecil -->
                <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-teal-50 text-teal-600 mb-6 shadow-sm">
                    <i class="fa-solid fa-shield-halved text-xl"></i>
                </div>

                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Pemulihan Sandi</h2>
                <p class="text-sm text-slate-500 mt-2 mb-8 leading-relaxed">Lengkapi kredensial data diri Anda untuk meminta kode verifikasi dan mengatur ulang kata sandi.</p>

                <form method="POST" action="{{ route('asn.forgot-password.proses') }}" class="space-y-5">
                    @csrf

                    <!-- Bagian 1: Data Verifikasi -->
                    <div class="space-y-4">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">1. Data Verifikasi Identitas</label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1.5">Nama Lengkap</label>
                                <input name="nama" type="text" required
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-slate-700 focus:bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 text-sm transition-all outline-none" 
                                    placeholder="Nama Lengkap">
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1.5">Nomor ASN / NIK</label>
                                <input name="nip" type="number" required
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-slate-700 focus:bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 text-sm transition-all outline-none" 
                                    placeholder="Nomor ASN / NIK">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1.5">Nama Instansi</label>
                                <input name="instansi" type="text" required
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-slate-700 focus:bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 text-sm transition-all outline-none" 
                                    placeholder="Nama Instansi">
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1.5">Alamat Email</label>
                                <input name="email" type="email" required
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-slate-700 focus:bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 text-sm transition-all outline-none" 
                                    placeholder="nama@email.com">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1.5">Nomor HP / WhatsApp</label>
                            <div class="flex gap-2">
                                <input id="phone" name="phone" type="number" required
                                    class="flex-1 rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-slate-700 focus:bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 text-sm transition-all outline-none" 
                                    placeholder="08123456789">
                                <button type="button" id="btn-otp" onclick="kirimOTP()" 
                                    class="px-5 py-2.5 bg-teal-50 text-teal-700 font-semibold text-xs rounded-xl hover:bg-teal-100 transition-all border border-teal-200 whitespace-nowrap">
                                    <span id="text-otp">Minta OTP</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100 my-4">

                    <!-- Bagian 2: Buat Sandi Baru -->
                    <div class="space-y-4">
                        <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">2. Pengaturan Sandi Baru</label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1.5">Kode OTP (6 Digit)</label>
                                <input name="otp_code" type="number" required maxlength="6"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 tracking-widest text-base font-bold text-slate-800 text-center focus:bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 transition-all outline-none placeholder:font-normal placeholder:tracking-normal placeholder:text-sm" 
                                    placeholder="• • • • • •">
                            </div>

                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1.5">Kata Sandi Baru</label>
                                <input name="password" type="password" required minlength="8"
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50/50 px-4 py-2.5 text-slate-700 focus:bg-white focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 text-sm transition-all outline-none" 
                                    placeholder="Min. 8 Karakter">
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="pt-3">
                        <button type="submit" 
                            class="w-full flex justify-center items-center gap-2 py-3.5 px-4 text-sm font-bold rounded-xl text-slate-900 bg-[#21E6C1] hover:bg-[#1fd4b0] shadow-md shadow-teal-500/10 hover:shadow-teal-500/20 hover:-translate-y-0.5 transition-all duration-300">
                            Verifikasi & Simpan Sandi Baru <i class="fa-solid fa-arrow-right text-xs"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer Link Kembali -->
            <div class="mt-8 pt-4 border-t border-slate-100 flex items-center justify-between text-xs">
                <a href="{{ route('login') }}" class="font-medium text-slate-500 hover:text-teal-600 transition-colors flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Login
                </a>
                <span class="text-slate-400">© 2026 Diskominsa</span>
            </div>
        </div>

        <!-- KOLOM KANAN: Dekorasi & Informasi (Nuansa Biru Gelap & Tosca ala Referensi) -->
        <div class="hidden lg:col-span-6 lg:flex flex-col justify-between bg-gradient-to-br from-[#071E3D] via-[#1F4287] to-[#071E3D] p-12 text-white relative overflow-hidden">
            <!-- Elemen Cahaya Dekoratif Latar Belakang -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#21E6C1]/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-[#278EA5]/20 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Header Kanan -->
            <div class="flex justify-end">
                <div class="px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/10 text-xs font-medium text-[#21E6C1]">
                    Portal Keamanan ASN
                </div>
            </div>

            <!-- Konten Tengah (Glassmorphism Card) -->
            <div class="my-auto max-w-lg bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl relative">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-[#21E6C1]/20 text-[#21E6C1] mb-6 border border-[#21E6C1]/30">
                    <i class="fa-solid fa-shield-cat text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold tracking-tight text-white mb-2">Pemulihan Akun Aman</h3>
                <p class="text-sm text-slate-300 leading-relaxed mb-6">
                    Sistem verifikasi berlapis memastikan hanya Anda yang memiliki akses penuh untuk memperbarui kredensial layanan instansi.
                </p>
                
                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 rounded-2xl bg-white/5 border border-white/5">
                        <div class="w-8 h-8 rounded-lg bg-teal-500/20 text-[#21E6C1] flex items-center justify-center text-xs font-bold">01</div>
                        <div class="text-xs">
                            <p class="font-semibold text-white">Validasi NIP & Data Instansi</p>
                            <p class="text-slate-400">Pencocokan data kepegawaian resmi.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 p-3 rounded-2xl bg-white/5 border border-white/5">
                        <div class="w-8 h-8 rounded-lg bg-teal-500/20 text-[#21E6C1] flex items-center justify-center text-xs font-bold">02</div>
                        <div class="text-xs">
                            <p class="font-semibold text-white">Kode Verifikasi OTP Instan</p>
                            <p class="text-slate-400">Dikirim langsung via WhatsApp terdaftar.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Kanan -->
            <div class="text-xs text-slate-400 flex items-center justify-between">
                <span>Dinas Komunikasi, Informatika dan Persandian</span>
                <span class="text-[#21E6C1]">Secure System</span>
            </div>
        </div>

    </div>

    <!-- Script Interaktif Ringan -->
    <script>
        function kirimOTP() {
            const phoneInput = document.getElementById('phone');
            const phone = phoneInput.value;
            const btnOtp = document.getElementById('btn-otp');
            const textOtp = document.getElementById('text-otp');

            if(!phone) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nomor Belum Diisi',
                    text: 'Silakan isi Nomor HP / WhatsApp terlebih dahulu!',
                    confirmButtonColor: '#0f766e',
                });
                phoneInput.focus();
                return;
            }

            btnOtp.disabled = true;
            btnOtp.classList.add('opacity-50', 'cursor-not-allowed');
            
            Swal.fire({
                icon: 'success',
                title: 'OTP Dikirim!',
                text: `Kode verifikasi dikirim ke: ${phone}`,
                showConfirmButton: false,
                timer: 2000
            });

            let timeLeft = 60;
            const countdown = setInterval(() => {
                if(timeLeft <= 0) {
                    clearInterval(countdown);
                    btnOtp.disabled = false;
                    btnOtp.classList.remove('opacity-50', 'cursor-not-allowed');
                    textOtp.innerText = "Minta OTP";
                } else {
                    textOtp.innerText = `${timeLeft}s`;
                    timeLeft -= 1;
                }
            }, 1000);
        }
    </script>
</body>
</html>