<div class="flex items-center justify-between mb-1">
    <!-- Judul halaman -->
    <h1 class="text-xl font-semibold text-gray-800"><?= $title ?? '' ?></h1>

    <!-- Header Kanan Atas -->
    <div class="fixed top-0 right-0 z-50 m-4">
        <div class="flex items-center gap-4 bg-white/30 backdrop-blur-md px-4 py-2 rounded-xl shadow-md border border-white/40">

            <!-- Tanggal -->
            <div class="text-sm text-gray-800 font-medium">
                <?= date('d F Y') ?>
            </div>

            <!-- Icon Notifikasi -->
            <a href="/notifikasi" class="relative text-gray-700 hover:text-gray-900 text-lg">
                <i class="fas fa-bell"></i>
            </a>

            <!-- Icon User -->
            <a href="/profil" class="w-8 h-8 rounded-full bg-gray-400 flex items-center justify-center hover:ring-2 hover:ring-gray-500">
                <i class="fas fa-user text-white text-sm"></i>
            </a>
        </div>
    </div>


</div>