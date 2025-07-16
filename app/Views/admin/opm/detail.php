<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<section class="p-6">
    <!-- Judul Halaman -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Detail Pesanan</h1>
            <!-- <p class="text-sm text-gray-500"><?= esc($pesanan['tanggal']) ?></p> -->
        </div>
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
                <form action="/admin/opm/pesanan/konfirmasi/<?= esc($pesanan['id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <button type="button"
                        onclick="openKonfirmasiModal('<?= esc($pesanan['id']) ?>')"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg text-sm shadow">
                        ✔ Konfirmasi
                    </button>
                </form>

                <button onclick="openTolakModal('<?= esc($pesanan['id']) ?>')" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-sm shadow">
                    ✖ Tolak
                </button>

            </div>
            <a href="/admin/opm/pesanan" class="ml-auto bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg text-sm">
                Tutup
            </a>
        </div>
    </div>
</section>

<!-- Modal Konfirmasi Tolak -->
<div id="tolakModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md text-sm">
        <h2 class="text-lg font-semibold mb-4">Konfirmasi Penolakan</h2>
        <p class="mb-4">Apakah Anda yakin ingin menolak pesanan ini? Tindakan ini akan <strong>menghapus seluruh data</strong> terkait dari sistem.</p>
        <form id="tolakForm" method="post" action="">
            <?= csrf_field() ?>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeTolakModal()" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Batal</button>
                <button type="submit" class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700">Tolak Pesanan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Pesanan -->
<div id="konfirmasiModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md text-sm relative">
        <button onclick="closeKonfirmasiModal()" class="absolute top-2 right-3 text-gray-500 hover:text-black text-xl">&times;</button>

        <h2 class="text-lg font-semibold mb-4 text-green-700">Konfirmasi Pesanan</h2>
        <p class="mb-6">Apakah Anda yakin ingin <strong>mengonfirmasi</strong> pesanan ini?</p>

        <form id="formKonfirmasi" method="POST">
            <?= csrf_field() ?>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeKonfirmasiModal()" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Ya, Konfirmasi</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openKonfirmasiModal(pesananId) {
        const form = document.getElementById('formKonfirmasi');
        form.action = `/admin/opm/pesanan/konfirmasi/${pesananId}`;
        document.getElementById('konfirmasiModal').classList.remove('hidden');
        document.getElementById('konfirmasiModal').classList.add('flex');
    }

    function closeKonfirmasiModal() {
        document.getElementById('konfirmasiModal').classList.add('hidden');
        document.getElementById('konfirmasiModal').classList.remove('flex');
    }
</script>


<script>
    function openTolakModal(pesananId) {
        const modal = document.getElementById('tolakModal');
        const form = document.getElementById('tolakForm');
        form.action = `/admin/opm/pesanan/tolak/${pesananId}`;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeTolakModal() {
        const modal = document.getElementById('tolakModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>

<?= $this->endSection() ?>