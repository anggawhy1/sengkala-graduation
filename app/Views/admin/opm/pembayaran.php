<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-6 space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-700">TABEL PEMBAYARAN</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-4 text-sm">
        <!-- Form Filter -->
        <form action="/admin/opm/pembayaran" method="get" class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <label for="tanggal" class="font-semibold">Pilih Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" value="<?= $_GET['tanggal'] ?? '' ?>" class="border border-gray-300 rounded px-2 py-1">
                <button type="submit" class="bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Lihat</button>
            </div>

            <div class="flex items-center gap-2">
                <label for="show" class="text-gray-600">Show</label>
                <select name="show" id="show" class="border border-gray-300 rounded px-2 py-1">
                    <option>5</option>
                    <option selected>10</option>
                    <option>25</option>
                </select>
                <span class="text-gray-600">entries</span>
            </div>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
            <?php if (empty($pembayaran)): ?>
                <div class="text-center text-gray-500 italic py-4">
                    Tidak ada data pembayaran.
                </div>
            <?php else: ?>
                <table class="min-w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-2 border">No.</th>
                            <th class="p-2 border">Tanggal Konfirmasi</th>
                            <th class="p-2 border">ID/Nama Klien</th>
                            <th class="p-2 border">Paket</th>
                            <th class="p-2 border">Total</th>
                            <th class="p-2 border">Sisa Pembayaran</th>
                            <th class="p-2 border">Metode Pembayaran</th>
                            <th class="p-2 border">Bukti</th>
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($pembayaran as $index => $row): ?>
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-2 border"><?= $index + 1 ?></td>
                                <td class="p-2 border"><?= $row['tanggal_konfirmasi'] ?? '-' ?></td>
                                <td class="p-2 border">
                                    <span class="text-blue-600 underline cursor-pointer" onclick="showDetail(<?= htmlspecialchars(json_encode($row)) ?>)">
                                        <?= $row['pesanan_id'] ?>
                                    </span>
                                    <?= $row['nama_klien'] ?>
                                </td>
                                <td class="p-2 border"><?= $row['paket'] ?></td>
                                <td class="p-2 border">Rp. <?= number_format($row['total'], 0, ',', '.') ?></td>
                                <td class="p-2 border">
                                    Rp. <?= number_format(
                                            ($row['status'] == 'Belum Bayar' || $row['status'] == 'Belum Lunas') ? ($row['sisa'] ?? $row['total']) : 0,
                                            0,
                                            ',',
                                            '.'
                                        ) ?>
                                </td>
                                <td class="p-2 border"><?= $row['metode'] ?></td>
                                <td class="p-2 border">
                                    <?php if (!empty($row['bukti']) && $row['bukti'] !== '-'): ?>
                                        <!-- <a href="/uploads/bukti/<?= $row['bukti'] ?>" target="_blank">Lihat</a> -->
                                         <a href="/uploads/bukti/<?= $row['bukti'] ?>?t=<?= time() ?>" target="_blank">Lihat</a>

                                    <?php else: ?>
                                        <span class="text-gray-400 italic">Belum Upload</span>
                                    <?php endif; ?>
                                </td>
                                <td class="p-2 border min-w-[120px]">
                                    <span class="px-2 py-1 rounded text-white text-xs
                                        <?= $row['status'] == 'Belum Bayar' ? 'bg-yellow-500' : ($row['status'] == 'Lunas' ? 'bg-green-600' : ($row['status'] == 'Ditolak' ? 'bg-red-500' : ($row['status'] == 'Belum Lunas' ? 'bg-blue-600' : 'bg-gray-400'))) ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>

                                <td class="p-2 border">
                                    <form action="/admin/opm/pembayaran/update/<?= $row['id_pembayaran'] ?>" method="POST" class="flex items-center gap-2">
                                        <select name="status" class="border rounded px-2 py-1 text-xs">
                                            <option <?= $row['status'] == 'Belum Bayar' ? 'selected' : '' ?>>Belum Bayar</option>
                                            <option <?= $row['status'] == 'Belum Lunas' ? 'selected' : '' ?>>Belum Lunas</option>
                                            <option <?= $row['status'] == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
                                            <option <?= $row['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                                        </select>
                                        <button type="submit" class="bg-black text-white text-xs px-2 py-1 rounded">Simpan</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif; ?>
                    </tbody>
                </table>
        </div>

        <!-- Dummy Pagination -->
        <div class="flex justify-between items-center mt-6 text-sm text-gray-600">
            <div>Showing 1 to <?= count($pembayaran) ?> of <?= count($pembayaran) ?> entries</div>
            <div class="space-x-1">
                <button class="px-3 py-1 border rounded hover:bg-gray-100 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100 bg-black text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="detailModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-3xl w-full mx-auto shadow-lg border border-gray-200 relative text-sm">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-lg">&times;</button>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Invoice Pembayaran</h2>
        </div>
        <div id="detailContent" class="grid grid-cols-2 gap-y-1 gap-x-8 mb-4"></div>
        <hr class="my-4 border-dashed">
        <div id="itemTotal" class="mb-2"></div>
        <hr class="my-4 border-dashed">
        <div id="grandTotal" class="flex justify-between text-base font-semibold"></div>
    </div>
</div>

<script>
    function showDetail(data) {
        const modal = document.getElementById('detailModal');
        const detail = document.getElementById('detailContent');
        const itemTotal = document.getElementById('itemTotal');
        const grandTotal = document.getElementById('grandTotal');

        detail.innerHTML = `
            <div><strong>ID Pembayaran</strong></div><div>: ${data.id_pembayaran}</div>
            <div><strong>ID Pesanan</strong></div><div>: ${data.id}</div>
            <div><strong>Nama Pemesan</strong></div><div>: ${data.nama_klien}</div>
            <div><strong>Paket</strong></div><div>: ${data.paket}</div>
            <div><strong>Tanggal Pemesanan</strong></div><div>: ${data.tanggal_pesan}</div>
            <div><strong>Tanggal Sesi Foto</strong></div><div>: ${data.tanggal_sesi}</div>
            <div><strong>Lokasi Sesi</strong></div><div>: ${data.lokasi}</div>
            <div><strong>Status Pembayaran</strong></div><div>: ${data.status}</div>
            <div><strong>Tanggal Konfirmasi</strong></div><div>: ${data.tanggal_konfirmasi || '-'}</div>
            <div><strong>Sisa Pembayaran</strong></div><div>: Rp. ${parseInt(data.sisa).toLocaleString('id-ID')},-</div>
            <div><strong>Additional</strong></div><div>: ${data.additional || '-'}</div>
            <div><strong>Bukti Transfer</strong></div><div>: ${
                data.bukti && data.bukti !== '-'
                    // ? `<a href="/uploads/bukti/${data.bukti}" target="_blank" class="text-blue-600 underline">Lihat Bukti</a>`
                    ? `<a href="/uploads/bukti/${data.bukti}?t=${Date.now()}" target="_blank" class="text-blue-600 underline">Lihat Bukti</a>`

                    : `<span class="text-gray-400 italic">Belum Upload</span>`
            }</div>
        `;

        itemTotal.innerHTML = `
            <div class="flex justify-between">
                <span>${data.paket} Package</span>
                <span>Rp. ${parseInt(data.total).toLocaleString('id-ID')},-</span>
            </div>
        `;

        grandTotal.innerHTML = `
            <span>Total</span>
            <span>Rp. ${parseInt(data.total).toLocaleString('id-ID')},-</span>
        `;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        document.getElementById('detailModal').classList.add('hidden');
        document.getElementById('detailModal').classList.remove('flex');
    }
</script>

<?= $this->endSection() ?>
