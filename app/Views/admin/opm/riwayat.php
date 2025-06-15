<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<section class="p-6 space-y-6">
    <h1 class="text-2xl font-semibold text-gray-800">RIWAYAT PESANAN</h1>

    <!-- Kotak Gabungan Filter + Tabel -->
    <div class="bg-white rounded shadow-md p-4 text-sm space-y-4">

        <!-- Filter + Show Entries -->
        <div class="flex flex-wrap justify-between items-center gap-4 text-sm mt-4">

            <!-- Form Filter -->
            <form action="" method="get" class="flex flex-wrap gap-2 items-center">
                <input type="text" name="search" placeholder="ID / Nama" value="<?= $_GET['search'] ?? '' ?>" class="border rounded px-2 py-1 w-36">
                <input type="date" name="tanggal" value="<?= $_GET['tanggal'] ?? '' ?>" class="border rounded px-2 py-1 w-36">
                <input type="text" name="kampus" placeholder="Nama Kampus" value="<?= $_GET['kampus'] ?? '' ?>" class="border rounded px-2 py-1 w-40">
                <select name="paket" class="border rounded px-2 py-1 w-32">
                    <option value="">Paket</option>
                    <option <?= (@$_GET['paket'] == 'Single A') ? 'selected' : '' ?>>Single A</option>
                    <option <?= (@$_GET['paket'] == 'Couple A') ? 'selected' : '' ?>>Couple A</option>
                    <option <?= (@$_GET['paket'] == 'Group A') ? 'selected' : '' ?>>Group A</option>
                </select>
                <button type="submit" class="bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Terapkan</button>
            </form>

            <!-- Show Entries -->
            <div class="flex items-center space-x-2">
                <label for="entries" class="text-gray-700">Show</label>
                <select id="entries" name="entries" class="border px-2 py-1 rounded text-sm">
                    <option <?= (@$_GET['entries'] == '5') ? 'selected' : '' ?>>5</option>
                    <option <?= (@$_GET['entries'] == '10') ? 'selected' : '' ?>>10</option>
                    <option <?= (@$_GET['entries'] == '25' || !isset($_GET['entries'])) ? 'selected' : '' ?>>25</option>
                    <option <?= (@$_GET['entries'] == '50') ? 'selected' : '' ?>>50</option>
                    <option <?= (@$_GET['entries'] == '100') ? 'selected' : '' ?>>100</option>
                </select>
                <span class="text-gray-700">entries</span>
            </div>

        </div>


        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 text-left text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="border p-2">No</th>
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">ID/Nama Klien</th>
                        <th class="border p-2">Asal Universitas</th>
                        <th class="border p-2">Whatsapp</th>
                        <th class="border p-2">Instagram</th>
                        <th class="border p-2">Paket</th>
                        <th class="border p-2">Tanggal/Sesi</th>
                        <th class="border p-2">Lokasi</th>
                        <th class="border p-2">Pembayaran</th>
                        <th class="border p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($riwayat as $i => $r): ?>
                        <tr>
                            <td class="border p-2"><?= $i + 1 ?></td>
                            <td class="border p-2"><?= $r['tanggal'] ?></td>
                            <td class="border p-2"><?= $r['id'] ?><br><span class="text-gray-500"><?= $r['nama_klien'] ?></span></td>
                            <td class="border p-2"><?= $r['asal_universitas'] ?></td>
                            <td class="border p-2"><?= $r['whatsapp'] ?></td>
                            <td class="border p-2"><?= $r['instagram'] ?></td>
                            <td class="border p-2"><?= $r['paket'] ?></td>
                            <td class="border p-2"><?= $r['tanggal_sesi'] ?></td>
                            <td class="border p-2"><?= $r['lokasi'] ?></td>
                            <td class="border p-2"><?= $r['pembayaran'] ?></td>
                            <td class="border p-2">
                                <?php if ($r['status'] == 'Selesai'): ?>
                                    <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Selesai</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- Footer pagination dummy -->
        <div class="flex justify-between items-center mt-4 text-gray-600 text-sm">
            <div>Showing 1 to <?= count($riwayat) ?> of <?= count($riwayat) ?> entries</div>
            <div class="space-x-1">
                <button class="px-3 py-1 border rounded hover:bg-gray-100 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100 bg-black text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">Next</button>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>