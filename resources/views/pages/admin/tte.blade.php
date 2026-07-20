<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan TTE | Admin Diskominsa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/zen.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50/50">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside class="fixed inset-y-0 left-0 z-30 w-68 bg-slate-900 flex flex-col shadow-xl lg:static lg:translate-x-0">
            <div class="flex items-center gap-3 px-6 h-20 border-b border-slate-800/60">
                <div class="w-9 h-9 rounded-xl bg-emerald-500 flex items-center justify-center text-white shadow-lg"><i class="fa-solid fa-satellite-dish text-sm"></i></div>
                <div><span class="text-sm font-bold text-white block">DISKOMINSA</span><span class="text-[10px] text-slate-400 block uppercase">Kab. Aceh Barat</span></div>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-2">Utama</div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all">
                    <i class="fa-solid fa-grid-horizontal w-5"></i><span class="text-sm font-medium">Dashboard Overview</span>
                </a>
                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 pt-4 mb-2">Layanan Digital</div>
                <a href="/admin/web-desa" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all">
                    <i class="fa-solid fa-globe w-5"></i><span class="text-sm font-medium">Web Desa & Ponpes</span>
                </a>
                <a href="/admin/email-asn" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all">
                    <i class="fa-solid fa-envelope-open-text w-5"></i><span class="text-sm font-medium">Email ASN & Instansi</span>
                </a>
                <a href="/admin/cloud-gov" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all">
                    <i class="fa-solid fa-cloud-arrow-up w-5"></i><span class="text-sm font-medium">Cloud Government</span>
                </a>
                <!-- Aktif -->
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-white bg-emerald-600/10 border-l-4 border-emerald-500 rounded-r-xl transition-all">
                    <i class="fa-solid fa-file-signature text-emerald-400 w-5"></i><span class="text-sm font-medium">Layanan TTE</span>
                </a>
            </nav>
            <div class="p-4 border-t border-slate-800/60"><form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-slate-400 hover:text-rose-400 hover:bg-rose-500/5 rounded-xl transition-all text-left"><i class="fa-solid fa-power-off text-sm"></i><span class="text-sm font-medium">Keluar Sistem</span></button></form></div>
        </aside>

        <!-- AREA KONTEN -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-8 py-4 bg-white border-b border-slate-100 shadow-sm">
                <h2 class="text-md font-bold text-slate-800">Penerbitan & Otorisasi Tanda Tangan Elektronik (TTE)</h2>
                <div class="flex items-center gap-3"><span class="px-2.5 py-1 bg-blue-50 text-blue-600 text-[10px] font-bold border border-blue-200 rounded-lg"><i class="fa-solid fa-shield-check mr-1"></i>BSrE Connected</span></div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50/60 p-8">
                <!-- Data Table -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100 font-bold text-slate-800 text-sm">Daftar Sertifikat Digital Pejabat Daerah</div>
                    <table class="w-full text-sm text-left text-slate-500">
                        <thead class="text-xs text-slate-400 bg-slate-50/50 font-bold uppercase border-b border-slate-100">
                            <tr>
                                <th class="px-6 py-4">Nama Pejabat / Jabatan</th>
                                <th class="px-6 py-4">NIP Otoritas</th>
                                <th class="px-6 py-4">Masa Berlaku Sertifikat</th>
                                <th class="px-6 py-4">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <tr class="hover:bg-slate-50/40">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-700">Mahdi, S.Sos</div>
                                    <div class="text-[11px] text-slate-400 font-medium">Kepala Dinas Kependudukan & Pencatatan Sipil</div>
                                </td>
                                <td class="px-6 py-4 font-mono text-xs text-slate-600">197611022003121002</td>
                                <td class="px-6 py-4 text-xs font-semibold text-slate-600">20 Desember 2027</td>
                                <td class="px-6 py-4"><span class="px-2.5 py-0.5 bg-emerald-50 text-emerald-600 rounded-md text-xs font-bold border border-emerald-100">Tersertifikasi</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>

    </div>
</body>
</html>