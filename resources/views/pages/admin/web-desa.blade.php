<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Desa & Ponpes | Admin Diskominsa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50/50">
    <div x-data="{ sidebarOpen: false, filterTab: 'semua', detailModal: false, selectedItem: {} }" class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <aside class="fixed inset-y-0 left-0 z-30 w-68 bg-slate-900 flex flex-col shadow-xl lg:static lg:translate-x-0">
            <div class="flex items-center gap-3 px-6 h-20 border-b border-slate-800/60">
                <div class="w-9 h-9 rounded-xl bg-emerald-500 flex items-center justify-center text-white shadow-lg"><i class="fa-solid fa-satellite-dish text-sm"></i></div>
                <div>
                    <span class="text-sm font-bold tracking-wider text-white block">DISKOMINSA</span>
                    <span class="text-[10px] text-slate-400 font-medium block uppercase">Kab. Aceh Barat</span>
                </div>
            </div>
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 mb-2">Utama</div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all">
                    <i class="fa-solid fa-grid-horizontal w-5"></i><span class="text-sm font-medium">Dashboard Overview</span>
                </a>
                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-4 pt-4 mb-2">Layanan Digital</div>
                <!-- Aktif -->
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-white bg-emerald-600/10 border-l-4 border-emerald-500 rounded-r-xl transition-all">
                    <i class="fa-solid fa-globe text-emerald-400 w-5"></i><span class="text-sm font-medium">Web Desa & Ponpes</span>
                </a>
                <a href="/admin/email-asn" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all">
                    <i class="fa-solid fa-envelope-open-text w-5"></i><span class="text-sm font-medium">Email ASN & Instansi</span>
                </a>
                <a href="/admin/cloud-gov" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all">
                    <i class="fa-solid fa-cloud-arrow-up w-5"></i><span class="text-sm font-medium">Cloud Government</span>
                </a>
                <a href="/admin/tte" class="flex items-center gap-3 px-4 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800/50 rounded-xl transition-all">
                    <i class="fa-solid fa-file-signature w-5"></i><span class="text-sm font-medium">Layanan TTE</span>
                </a>
            </nav>
            <div class="p-4 border-t border-slate-800/60"><form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-slate-400 hover:text-rose-400 hover:bg-rose-500/5 rounded-xl transition-all text-left"><i class="fa-solid fa-power-off text-sm"></i><span class="text-sm font-medium">Keluar Sistem</span></button></form></div>
        </aside>

        <!-- AREA KONTEN -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-8 py-4 bg-white border-b border-slate-100 shadow-sm">
                <h2 class="text-md font-bold text-slate-800">Manajemen Pembuatan Layanan Website</h2>
                <div class="flex items-center gap-3"><img class="w-9 h-9 rounded-xl" src="https://ui-avatars.com/api/?name=Admin+Diskominsa&background=10b981&color=fff"><span class="text-xs font-bold text-slate-700 hidden md:block">Admin Diskominsa</span></div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50/60 p-8">
                <!-- Top Options -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                    <div class="flex gap-1.5 bg-slate-200/60 p-1 rounded-xl">
                        <button @click="filterTab = 'semua'" :class="filterTab === 'semua' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500'" class="px-4 py-1.5 text-xs font-bold rounded-lg transition-all">Semua</button>
                        <button @click="filterTab = 'desa'" :class="filterTab === 'desa' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500'" class="px-4 py-1.5 text-xs font-bold rounded-lg transition-all">Desa</button>
                        <button @click="filterTab = 'ponpes'" :class="filterTab === 'ponpes' ? 'bg-white text-slate-800 shadow-sm' : 'text-slate-500'" class="px-4 py-1.5 text-xs font-bold rounded-lg transition-all">Pesantren</button>
                    </div>
                    <button class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold shadow-sm"><i class="fa-solid fa-plus mr-1.5"></i>Tambah Pengajuan Web</button>
                </div>

                <!-- Data Table -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <table class="w-full text-sm text-left text-slate-500">
                        <thead class="text-xs text-slate-400 bg-slate-50/50 font-bold uppercase tracking-wider border-b border-slate-100">
                            <tr>
                                <th class="px-6 py-4">Nama Entitas / Pemohon</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Rekomendasi Domain</th>
                                <th class="px-6 py-4">Hosting Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <tr x-show="filterTab === 'semua' || filterTab === 'desa'" class="hover:bg-slate-50/40">
                                <td class="px-6 py-4 font-bold text-slate-700">Gampong Drien Rampak</td>
                                <td class="px-6 py-4"><span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded-md text-xs font-medium">Web Desa</span></td>
                                <td class="px-6 py-4 text-slate-600 font-mono text-xs">drienrampak.desa.id</td>
                                <td class="px-6 py-4"><span class="text-emerald-600 font-bold text-xs"><i class="fa-solid fa-circle-check mr-1"></i>Aktif (CPanel)</span></td>
                                <td class="px-6 py-4 text-center">
                                    <button @click="selectedItem = { nama: 'Gampong Drien Rampak', tipe: 'Web Desa', domain: 'drienrampak.desa.id', server: 'Server Utama Cluster A', storage: '2 GB / 5 GB Used' }; detailModal = true" class="px-3 py-1 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-600 border border-slate-200 text-xs font-bold rounded-lg transition-colors">Kelola</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>

        <!-- LIGHTWEIGHT CONFIG MODAL -->
        <div x-show="detailModal" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
            <div x-show="detailModal" x-transition.opacity class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="detailModal = false"></div>
            <div x-show="detailModal" x-transition.scale.90 class="relative bg-white rounded-2xl shadow-xl border border-slate-100 w-full max-w-md p-6 z-10">
                <h3 class="font-bold text-slate-800 text-base mb-2" x-text="selectedItem.nama"></h3>
                <div class="space-y-3 my-4 bg-slate-50 p-4 rounded-xl text-xs">
                    <div class="flex justify-between"><span>Domain Target:</span><span class="font-mono font-bold text-slate-700" x-text="selectedItem.domain"></span></div>
                    <div class="flex justify-between"><span>Lokasi VPS:</span><span class="font-medium text-slate-700" x-text="selectedItem.server"></span></div>
                    <div class="flex justify-between"><span>Alokasi Storage:</span><span class="font-medium text-slate-700" x-text="selectedItem.storage"></span></div>
                </div>
                <div class="flex justify-end gap-2"><button @click="detailModal = false" class="px-3 py-1.5 bg-slate-200 text-slate-700 rounded-lg text-xs font-bold">Tutup</button></div>
            </div>
        </div>

    </div>
</body>
</html>