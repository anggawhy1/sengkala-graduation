<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-6 space-y-8">

    <!-- Header Notifikasi + Tombol Tandai -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Notifikasi</h2>
        <a href="<?= base_url('admin/notifikasi/tandaiSemuaSudahDibaca') ?>"
           class="text-sm text-blue-600 hover:underline hover:text-blue-800">
            Tandai semua sudah dibaca
        </a>
    </div>

    <?php if (empty($notifikasi)): ?>
        <p class="text-gray-500 text-sm">Tidak ada notifikasi baru saat ini.</p>
    <?php endif; ?>

    <?php
    // Sortir tanggal terbaru ke atas
    krsort($notifikasi);
    ?>

    <?php foreach ($notifikasi as $tanggal => $items): ?>
        <div class="space-y-4 mt-6">
            <!-- Tanggal -->
            <h3 class="text-base font-semibold text-gray-600 border-b border-gray-200 pb-1">
                <?= esc($tanggal) ?>
            </h3>

            <?php foreach ($items as $n): ?>
                <?php
                    $dibaca = isset($n['is_read']) && $n['is_read'] == 1;

                    $classNama    = $dibaca ? 'text-gray-600' : 'font-semibold text-gray-800';
                    $classStatus  = $dibaca ? 'text-gray-600' : 'font-semibold text-gray-800';
                    $classPaket   = $dibaca ? 'text-gray-600' : 'font-semibold text-gray-800';
                    $classTanggal = $dibaca ? 'text-gray-600' : 'font-semibold text-gray-800';
                    $classId      = $dibaca ? 'text-gray-600' : 'font-semibold text-blue-600';
                ?>
                <div class="bg-white border border-gray-200 rounded-lg shadow-sm transition hover:shadow-md">
                    <div class="flex items-start md:items-center justify-between px-4 py-3 border-b bg-gray-300">
                        <div class="text-xs text-gray-600 font-medium">
                            🕒 <?= esc($n['waktu']) ?>
                        </div>
                        <a href="<?= base_url('admin/opm/pesanan/detail/' . $n['id']) ?>"
                           class="text-sm text-blue-600 hover:underline">
                            Lihat Detail
                        </a>
                    </div>
                    <div class="px-4 py-3 text-sm leading-relaxed <?= $dibaca ? 'text-gray-500' : 'text-gray-800' ?>">
                        <p>
                            Pesanan baru dari <span class="<?= $classNama ?>"><?= esc($n['nama']) ?></span>
                            telah masuk dan <span class="<?= $classStatus ?>">menunggu konfirmasi</span>.
                            Pesanan ini menggunakan <span class="<?= $classPaket ?>">paket <?= esc($n['paket']) ?></span>
                            dan dijadwalkan untuk sesi pemotretan pada
                            <span class="<?= $classTanggal ?>"><?= date('d M Y', strtotime($n['tanggal_sesi'])) ?></span>.
                            ID pesanan: <span class="<?= $classId ?>">#<?= esc($n['id']) ?></span>.
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>
