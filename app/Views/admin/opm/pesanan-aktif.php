<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-6 space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-700">TABEL PESANAN AKTIF</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-4 text-sm">
        <!-- Filter + Show entries -->
        <div class="flex flex-wrap justify-between items-center mt-4 gap-4 text-sm">

            <!-- Filter -->
            <form action="" method="get" class="flex flex-wrap gap-2 items-center">
                <input type="text" name="search" placeholder="ID / Nama" class="border rounded px-2 py-1 w-36" value="<?= $_GET['search'] ?? '' ?>">
                <input type="date" name="tanggal" class="border rounded px-2 py-1 w-36" value="<?= $_GET['tanggal'] ?? '' ?>">
                <input type="text" name="kampus" placeholder="Nama Kampus" class="border rounded px-2 py-1 w-40" value="<?= $_GET['kampus'] ?? '' ?>">
                <select name="paket" class="border rounded px-2 py-1 w-32">
                    <option value="">Paket</option>
                    <option <?= ($_GET['paket'] ?? '') == 'Single A' ? 'selected' : '' ?>>Single A</option>
                    <option <?= ($_GET['paket'] ?? '') == 'Couple A' ? 'selected' : '' ?>>Couple A</option>
                    <option <?= ($_GET['paket'] ?? '') == 'Group A' ? 'selected' : '' ?>>Group A</option>
                </select>
                <button type="submit" class="bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Terapkan</button>
            </form>

            <!-- Show entries -->
            <div class="flex items-center space-x-2">
                <label for="entries" class="text-gray-700">Show</label>
                <select id="entries" name="show" class="border px-2 py-1 rounded text-sm">
                    <option <?= ($_GET['show'] ?? '') == '5' ? 'selected' : '' ?>>5</option>
                    <option <?= ($_GET['show'] ?? '') == '10' ? 'selected' : '' ?>>10</option>
                    <option <?= ($_GET['show'] ?? '') == '25' ? 'selected' : '' ?>>25</option>
                    <option <?= ($_GET['show'] ?? '') == '50' ? 'selected' : '' ?>>50</option>
                    <option <?= ($_GET['show'] ?? '') == '100' ? 'selected' : '' ?>>100</option>
                </select>
                <span class="text-gray-700">entries</span>
            </div>
        </div>

        <!-- TABEL -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-2 border">No.</th>
                        <th class="p-2 border">Tanggal</th>
                        <th class="p-2 border">ID/Nama</th>
                        <th class="p-2 border">Asal Univ</th>
                        <th class="p-2 border">Tgl/Waktu Foto</th>
                        <th class="p-2 border">Paket</th>
                        <th class="p-2 border">IG</th>
                        <th class="p-2 border">WA</th>
                        <th class="p-2 border">Lokasi</th>
                        <th class="p-2 border">Pembayaran</th>
                        <th class="p-2 border">Status Bayar</th>
                        <th class="p-2 border">Keterangan</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Link Drive</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pesanan as $i => $p): ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-2 border"><?= $i + 1 ?></td>
                            <td class="p-2 border"><?= esc($p['tanggal']) ?></td>
                            <td class="p-2 border"><?= esc($p['id']) ?> / <?= esc($p['nama_klien']) ?></td>
                            <td class="p-2 border"><?= esc($p['asal_universitas']) ?></td>
                            <td class="p-2 border"><?= esc($p['tanggal']) ?> / <?= esc($p['waktu']) ?></td>
                            <td class="p-2 border"><?= esc($p['paket']) ?></td>
                            <td class="p-2 border"><?= esc($p['instagram']) ?></td>
                            <td class="p-2 border"><?= esc($p['whatsapp']) ?></td>
                            <td class="p-2 border"><?= esc($p['lokasi']) ?></td>
                            <td class="p-2 border"><?= esc($p['metode_pembayaran']) ?></td>
                            <td class="p-2 border"><?= esc($p['status_pembayaran']) ?></td>
                            <td class="p-2 border"><?= esc($p['keterangan']) ?></td>
                            <td class="p-2 border min-w-[130px]">
                                <span class="px-2 py-1 rounded text-white text-xs
    <?= $p['status_pesanan'] == 'Belum Diproses' ? 'bg-red-500' : ($p['status_pesanan'] == 'Editing' ? 'bg-yellow-500' : ($p['status_pesanan'] == 'Selesai' ? 'bg-green-600' : 'bg-gray-400')) ?>">
                                    <?= esc($p['status_pesanan']) ?>
                                </span>
                            </td>

                            <td class="p-2 border link-drive-cell"><?= esc($p['link_drive'] ?? '-') ?></td>
                            <td class="p-2 border">
                                <form onsubmit="return handleStatusChange(this)" class="flex items-center gap-2">
                                    <input type="hidden" name="id" value="<?= esc($p['id']) ?>">
                                    <select name="status" class="border rounded px-2 py-1 text-xs" onchange="checkIfSelesai(this)">
                                        <option <?= $p['status_pesanan'] == 'Belum Diproses' ? 'selected' : '' ?>>Belum Diproses</option>
                                        <option <?= $p['status_pesanan'] == 'Editing' ? 'selected' : '' ?>>Editing</option>
                                        <option <?= $p['status_pesanan'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                    </select>
                                    <button type="submit" class="bg-black text-white text-xs px-2 py-1 rounded">Simpan</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- Dummy Pagination -->
        <div class="flex justify-between items-center mt-6 text-sm text-gray-600">
            <div>Showing 1 to <?= count($pesanan) ?> of <?= count($pesanan) ?> entries</div>
            <div class="space-x-1">
                <button class="px-3 py-1 border rounded hover:bg-gray-100 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100 bg-black text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Popup Modal Upload Link Drive -->
<div id="popupDrive" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow-md w-96 space-y-4 relative text-sm">
        <button onclick="closeDrivePopup()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-lg">&times;</button>
        <h2 class="text-lg font-semibold">Upload Link Drive Foto</h2>
        <form onsubmit="submitDriveLink(event)">
            <label for="driveLink">Link Google Drive:</label>
            <input type="url" id="driveLink" name="driveLink" required class="w-full border rounded px-3 py-2" placeholder="https://drive.google.com/...">
            <button type="submit" class="mt-4 bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Simpan</button>
        </form>
    </div>
</div>

<script>
    function checkIfSelesai(selectElement) {
        if (selectElement.value === 'Selesai') {
            document.getElementById('popupDrive').classList.remove('hidden');
        }
    }

    function handleStatusChange(form) {
        const status = form.querySelector('select[name="status"]').value;
        if (status === 'Selesai') {
            document.getElementById('popupDrive').classList.remove('hidden');
            return false; // stop submit, tunggu link drive dulu
        }
        return true;
    }

    function closeDrivePopup() {
        document.getElementById('popupDrive').classList.add('hidden');
    }

    function submitDriveLink(e) {
        e.preventDefault();
        const link = document.getElementById('driveLink').value;
        const cell = document.querySelector('.link-drive-cell');
        if (cell) {
            cell.innerHTML = `<a href="${link}" target="_blank" class="text-blue-600 underline">Lihat</a>`;
        }
        closeDrivePopup();
        document.getElementById('driveLink').value = '';
    }
</script>

<?= $this->endSection() ?>