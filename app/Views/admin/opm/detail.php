<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<section class="p-6">
    <!-- Judul Halaman -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Detail Pesanan</h1>
            <!-- <p class="text-sm text-gray-500"><?= esc($pesanan['tanggal']) ?></p> -->
        </div>
        <!-- ICON HISTORI
        <a href="/admin/opm/riwayat" class="text-gray-600 hover:text-black text-xl transition" title="Riwayat Pesanan">
            <i class="fas fa-history"></i>
        </a> -->
    </div>

    <!-- Kotak Detail -->
    <div class="bg-white rounded-xl shadow-md border p-6 space-y-6">
        <div class="grid md:grid-cols-2 gap-6 text-sm text-gray-700">
            <!-- Kolom Kiri -->
            <div class="space-y-2">
                <div><span class="font-medium text-gray-600">ID Pesanan:</span> <?= esc($pesanan['id']) ?></div>
                <div><span class="font-medium text-gray-600">Jam Masuk:</span> <?= esc($pesanan['jam_masuk']) ?></div>
                <div><span class="font-medium text-gray-600">Nama Klien:</span> <?= esc($pesanan['nama_klien']) ?></div>
                <div><span class="font-medium text-gray-600">Asal Universitas:</span> <?= esc($pesanan['asal_universitas']) ?></div>
                <div><span class="font-medium text-gray-600">WhatsApp:</span> <?= esc($pesanan['whatsapp']) ?></div>
                <div><span class="font-medium text-gray-600">Instagram:</span> <?= esc($pesanan['instagram']) ?></div>
                <div><span class="font-medium text-gray-600">Paket:</span> <?= esc($pesanan['paket']) ?></div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-2">
                <div><span class="font-medium text-gray-600">Waktu:</span> <?= esc($pesanan['waktu']) ?></div>
                <div><span class="font-medium text-gray-600">Tanggal:</span> <?= esc($pesanan['tanggal']) ?></div>
                <div><span class="font-medium text-gray-600">Lokasi:</span> <?= esc($pesanan['lokasi']) ?></div>
                <div><span class="font-medium text-gray-600">Metode Pembayaran:</span> <?= esc($pesanan['metode_pembayaran']) ?></div>
                <div><span class="font-medium text-gray-600">Keterangan:</span> <?= esc($pesanan['keterangan']) ?></div>

                <!-- STATUS PESANAN -->
                <div>
                    <span class="font-medium text-gray-600">Status:</span>
                    <?php
                    $status = $pesanan['status'];
                    $badgeColor = match ($status) {
                        'Menunggu Konfirmasi' => 'bg-yellow-100 text-yellow-800 border-yellow-300',
                        default => 'bg-gray-100 text-gray-800 border-gray-300',
                    };
                    ?>
                    <span class="inline-block px-3 py-1 text-sm border rounded-full <?= $badgeColor ?> ml-2">
                        <?= esc($status) ?>
                    </span>
                </div>

            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex flex-wrap justify-between items-center gap-3 pt-4 border-t">
            <div class="flex gap-3">
                <button class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg text-sm shadow">
                    ✔ Konfirmasi
                </button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-sm shadow">
                    ✖ Tolak
                </button>
            </div>
            <a href="/admin/opm/pesanan" class="ml-auto bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg text-sm">
                Tutup
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>