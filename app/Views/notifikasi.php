<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-6 space-y-8">
    <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Notifikasi</h2>

    <?php foreach ($notifikasi as $tanggal => $items): ?>
        <div>
            <h3 class="text-base font-semibold text-gray-600 border-b border-gray-200 pb-1 mb-4">
                <?= esc($tanggal) ?>
            </h3>

            <div class="space-y-4">
                <?php foreach ($items as $n): ?>
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm transition hover:shadow-md">
                        <div class="flex items-start md:items-center justify-between px-4 py-3 border-b bg-gray-300">
                            <div class="text-xs text-gray-600 font-medium">
                                🕒 <?= esc($n['waktu']) ?>
                            </div>
                            <a href="#" class="text-sm text-blue-600 hover:underline">Lihat Detail</a>
                        </div>
                        <div class="px-4 py-3">
                            <p class="text-gray-800 font-semibold mb-1"><?= esc($n['nama']) ?></p>
                            <p class="text-sm text-gray-600"><?= esc($n['aktivitas']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection() ?>