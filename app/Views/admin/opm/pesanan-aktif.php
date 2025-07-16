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
                <!-- Search by ID or Nama -->
                <input
                    type="text"
                    name="search"
                    placeholder="ID / Nama"
                    class="border rounded px-2 py-1 w-36"
                    value="<?= esc($_GET['search'] ?? '') ?>">

                <!-- Filter by Tanggal -->
                <input
                    type="date"
                    name="tanggal"
                    class="border rounded px-2 py-1 w-36"
                    value="<?= esc($_GET['tanggal'] ?? '') ?>">

                <!-- Filter by Kampus -->
                <input
                    type="text"
                    name="kampus"
                    placeholder="Nama Kampus"
                    class="border rounded px-2 py-1 w-40"
                    value="<?= esc($_GET['kampus'] ?? '') ?>">

                <!-- Filter by Paket (Dropdown dari tabel) -->
                <select name="paket" class="border rounded px-2 py-1 w-32">
                    <option value="">Paket</option>
                    <?php foreach ($paketList as $paket): ?>
                        <option
                            value="<?= esc($paket['nama_paket']) ?>"
                            <?= (($_GET['paket'] ?? '') == $paket['nama_paket']) ? 'selected' : '' ?>>
                            <?= esc($paket['nama_paket']) ?>
                        </option>
                    <?php endforeach ?>
                </select>

                <!-- Submit button -->
                <button
                    type="submit"
                    class="bg-black text-white px-4 py-1 rounded hover:bg-gray-800">
                    Terapkan
                </button>
            </form>


            <!-- Show entries -->
            <div class="flex items-center space-x-2">
                <label for="entries" class="text-gray-700">Show</label>
                <select id="entries" name="show" class="border px-2 py-1 rounded text-sm" onchange="this.form.submit()">
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
                        <th class="p-2 border">ID/Nama</th>
                        <th class="p-2 border">Kampus</th>
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
                    <?php if (empty($pesanan)): ?>
                        <tr>
                            <td colspan="14" class="text-center py-6 text-gray-500 italic">
                                Tidak ada pesanan aktif untuk ditampilkan.
                            </td>
                        </tr>
                    <?php endif ?>
                    <?php foreach ($pesanan as $i => $p): ?>
                        <tr class="border-t hover:bg-gray-50 text-sm">
                            <td class="p-2 border text-center w-8"><?= $i + 1 ?></td>
                            <td class="p-2 border min-w-[180px]">
                                <span class="text-blue-600 underline cursor-pointer" onclick="showDetail(<?= htmlspecialchars(json_encode($p)) ?>)">
                                    <?= $p['id'] ?>
                                </span>
                                <div><?= esc($p['nama_klien']) ?></div>
                            </td>
                            <td class="p-2 border w-40"><?= esc($p['asal_universitas']) ?></td>
                            <td class="p-2 border min-w-[140px]"><?= esc($p['tanggal']) ?> / <?= esc($p['waktu']) ?></td>
                            <td class="p-2 border w-32"><?= esc($p['paket']) ?></td>
                            <td class="p-2 border w-28"><?= esc($p['instagram']) ?></td>
                            <td class="p-2 border w-28"><?= esc($p['whatsapp']) ?></td>
                            <td class="p-2 border min-w-[130px]"><?= esc($p['lokasi']) ?></td>
                            <td class="p-2 border w-32"><?= esc($p['metode_pembayaran']) ?></td>
                            <td class="p-2 border w-28">
                                <span class="px-2 py-1 rounded text-white text-xs
                <?= $p['status_pembayaran'] == 'Belum Bayar' ? 'bg-yellow-500' : ($p['status_pembayaran'] == 'Lunas' ? 'bg-green-600' : ($p['status_pembayaran'] == 'Ditolak' ? 'bg-red-500' : ($p['status_pembayaran'] == 'Belum Lunas' ? 'bg-blue-600' : 'bg-gray-400'))) ?>">
                                    <?= esc($p['status_pembayaran']) ?>
                                </span>
                            </td>
                            <td class="p-2 border min-w-[140px]"><?= esc($p['keterangan']) ?: '-' ?></td>
                            <td class="p-2 border min-w-[120px]">
                                <span class="px-2 py-1 rounded text-white text-xs
                <?= $p['status_pesanan'] == 'Belum Diproses' ? 'bg-red-500' : ($p['status_pesanan'] == 'Editing' ? 'bg-yellow-500' : ($p['status_pesanan'] == 'Selesai' ? 'bg-green-600' : 'bg-gray-400')) ?>">
                                    <?= esc($p['status_pesanan']) ?>
                                </span>
                            </td>
                            <td class="p-2 border min-w-[130px]">
                                <?php if (!empty($p['link_drive'])): ?>
                                    <a href="<?= esc($p['link_drive']) ?>" target="_blank" class="text-blue-600 underline">Lihat</a>
                                <?php else: ?>
                                    -
                                <?php endif ?>
                                <button type="button" class="text-blue-500 underline text-xs ml-1" onclick="openDrivePopup('<?= esc($p['id']) ?>', '<?= esc($p['link_drive']) ?>')">✎</button>
                            </td>


                            <td class="p-2 border">
                                <form action="/admin/opm/pesanan-aktif/status" method="post" onsubmit="return handleStatusChange(this)" class="flex items-center gap-2">
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
        <h2 class="text-lg font-semibold">Input Link Drive</h2>
        <form action="/admin/opm/pesanan-aktif/drive" method="post">
            <input type="hidden" name="id" id="drive-id">
            <label for="driveLink">Link Google Drive:</label>
            <input type="url" id="driveLink" name="link_drive" required class="w-full border rounded px-3 py-2" placeholder="https://drive.google.com/...">
            <button type="submit" class="mt-4 bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Simpan</button>
        </form>
    </div>
</div>

<!-- Modal Invoice Detail -->
<div id="detailModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-8 max-w-3xl w-full mx-auto shadow-lg border border-gray-200 relative text-sm">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-lg">&times;</button>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold">Invoice Pesanan</h2>
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
          <div><strong>Nama Klien</strong></div><div>: ${data.nama_klien}</div>
          <div><strong>Asal Universitas</strong></div><div>: ${data.asal_universitas}</div>
          <div><strong>Paket</strong></div><div>: ${data.paket}</div>
          <div><strong>Tanggal Sesi</strong></div><div>: ${data.tanggal}</div>
          <div><strong>Waktu</strong></div><div>: ${data.waktu}</div>
          <div><strong>Lokasi</strong></div><div>: ${data.lokasi}</div>
          <div><strong>Metode Pembayaran</strong></div><div>: ${data.metode_pembayaran}</div>
          <div><strong>Status Pembayaran</strong></div><div>: ${data.status_pembayaran}</div>
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

<script>
    function openDrivePopup(id, currentLink = '') {
        document.getElementById('drive-id').value = id;
        document.getElementById('driveLink').value = currentLink;
        document.getElementById('popupDrive').classList.remove('hidden');
    }

    function closeDrivePopup() {
        document.getElementById('popupDrive').classList.add('hidden');
    }

    // Validasi: Cegah status 'Selesai' kalau belum ada link
    function handleStatusChange(form) {
        const status = form.querySelector('select[name="status"]').value;
        const id = form.querySelector('input[name="id"]').value;
        const cell = form.closest('tr').querySelector('.link-drive-cell');

        if (status === 'Selesai') {
            const hasLink = cell.querySelector('a');
            if (!hasLink) {
                alert('Masukkan Link Drive terlebih dahulu sebelum mengubah status ke "Selesai".');
                return false;
            }
        }
        return true;
    }
</script>

<?= $this->endSection() ?>