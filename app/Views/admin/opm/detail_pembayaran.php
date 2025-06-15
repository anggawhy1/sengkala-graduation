<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-8 max-w-3xl mx-auto bg-white shadow-lg rounded-lg border border-gray-200 text-sm">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Invoice Pembayaran</h2>
        <i class="fas fa-history text-gray-500"></i>
    </div>

    <div class="grid grid-cols-2 gap-y-1 gap-x-8 mb-4">
        <div><strong>ID Pesanan</strong></div>
        <div>: <?= $detail['id'] ?></div>

        <div><strong>Nama Pemesan</strong></div>
        <div>: <?= $detail['nama_klien'] ?></div>

        <div><strong>Paket</strong></div>
        <div>: <?= $detail['paket'] ?></div>

        <div><strong>Tanggal Pemesanan</strong></div>
        <div>: <?= $detail['tanggal_pesan'] ?></div>

        <div><strong>Tanggal Sesi Foto</strong></div>
        <div>: <?= $detail['tanggal_sesi'] ?></div>

        <div><strong>Lokasi Sesi</strong></div>
        <div>: <?= $detail['lokasi'] ?></div>

        <div><strong>Status Pembayaran</strong></div>
        <div>: <?= $detail['status'] ?></div>

        <div><strong>Additional</strong></div>
        <div>: <?= $detail['additional'] ?: '-' ?></div>

        <div><strong>Bukti Transfer</strong></div>
        <div>:
            <a href="/path/to/bukti/<?= $detail['bukti'] ?>" target="_blank" class="text-blue-600 underline">Lihat Bukti</a>
        </div>
    </div>

    <hr class="my-4 border-dashed">

    <div class="mb-2">
        <div class="flex justify-between">
            <span>Couple <?= $detail['paket'] ?> Package</span>
            <span>Rp. <?= number_format($detail['total'], 0, ',', '.') ?>,-</span>
        </div>
        <?php if ($detail['additional'] && $detail['additional'] != '-'): ?>
            <div class="flex justify-between">
                <span>Additional</span>
                <span>Termasuk</span>
            </div>
        <?php endif; ?>
    </div>

    <hr class="my-4 border-dashed">

    <div class="flex justify-between text-base font-semibold">
        <span>Total</span>
        <span>Rp. <?= number_format($detail['total'], 0, ',', '.') ?>,-</span>
    </div>
</div>

<?= $this->endSection() ?>