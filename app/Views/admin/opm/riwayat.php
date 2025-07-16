<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-6 space-y-6">
    <h2 class="text-2xl font-bold text-gray-700">RIWAYAT PESANAN</h2>

    <div class="bg-white rounded-lg shadow-md p-6 text-sm">
        <div class="overflow-x-auto">
            <?php if (empty($pesanan)) : ?>
                <div class="text-center text-gray-500 italic py-4">Tidak ada data riwayat pesanan.</div>
            <?php else : ?>
                <table class="min-w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-2 border w-10">No</th>
                            <th class="p-2 border min-w-[180px]">ID / Nama</th>
                            <th class="p-2 border min-w-[120px]">Paket</th>
                            <th class="p-2 border min-w-[120px]">Tgl Sesi</th>
                            <th class="p-2 border min-w-[150px]">Lokasi</th>
                            <th class="p-2 border min-w-[130px]">Metode Bayar</th>
                            <th class="p-2 border min-w-[100px]">Total</th>
                            <th class="p-2 border min-w-[120px]">Status Bayar</th>
                            <th class="p-2 border min-w-[130px]">Link Drive</th>
                            <th class="p-2 border min-w-[140px]">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $i => $row) : ?>
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-2 border text-center"><?= $i + 1 ?></td>
                                <td class="p-2 border">
                                    <div class="font-medium"><?= esc($row['id']) ?></div>
                                    <div><?= esc($row['nama_lengkap']) ?></div>
                                </td>
                                <td class="p-2 border"><?= esc($row['nama_paket']) ?></td>
                                <td class="p-2 border"><?= esc($row['tanggal_sesi']) ?></td>
                                <td class="p-2 border"><?= esc($row['lokasi']) ?></td>
                                <td class="p-2 border"><?= esc($row['metode_pembayaran']) ?></td>
                                <td class="p-2 border">Rp. <?= number_format($row['total_tagihan'], 0, ',', '.') ?></td>
                                <td class="p-2 border">
                                    <span class="px-2 py-1 rounded text-white text-xs
                                        <?= $row['status_pembayaran'] == 'Lunas' ? 'bg-green-600' : ($row['status_pembayaran'] == 'Belum Lunas' ? 'bg-yellow-500' : 'bg-gray-400') ?>">
                                        <?= esc($row['status_pembayaran']) ?>
                                    </span>
                                </td>
                                <td class="p-2 border">
                                    <?php if (!empty($row['link_drive'])) : ?>
                                        <a href="<?= esc($row['link_drive']) ?>" target="_blank" class="text-blue-600 underline">Lihat</a>
                                    <?php else : ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td class="p-2 border"><?= esc($row['keterangan']) ?: '-' ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
