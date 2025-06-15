<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-6 space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-700">Jadwal & Slot</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-4 text-sm">

        <!-- Filter tanggal + jumlah tampilan -->
        <form action="/admin/jadwal" method="get" class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <label for="tanggal" class="font-semibold">Pilih Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" value="<?= $_GET['tanggal'] ?? date('Y-m-d') ?>" class="border border-gray-300 rounded px-2 py-1">
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

        <!-- Jadwal tabel -->
        <form action="/admin/jadwal/perbarui" method="post">
            <input type="hidden" name="tanggal" value="<?= $_GET['tanggal'] ?? date('Y-m-d') ?>">
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border p-2">Sesi</th>
                            <th class="border p-2">Slot</th>
                            <th class="border p-2">Fotografer</th>
                            <th class="border p-2">Jam</th>
                            <th class="border p-2">Klien</th>
                            <th class="border p-2">Lokasi</th>
                            <th class="border p-2">Kontak</th>
                            <th class="border p-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $index => $j): ?>
                            <tr class="border-t">
                                <td class="border p-2"><?= $j['sesi'] ?></td>
                                <td class="border p-2"><?= $j['slot'] ?></td>
                                <td class="border p-2">
                                    <input type="text" name="jadwal[<?= $index ?>][fotografer]" value="<?= $j['fotografer'] ?>" class="border w-full px-1 rounded">
                                </td>
                                <td class="border p-2">
                                    <input type="text" name="jadwal[<?= $index ?>][jam]" value="<?= $j['jam'] ?>" class="border w-full px-1 rounded">
                                </td>
                                <td class="border p-2">
                                    <input type="text" name="jadwal[<?= $index ?>][klien]" value="<?= $j['klien'] ?>" class="border w-full px-1 rounded">
                                </td>
                                <td class="border p-2">
                                    <input type="text" name="jadwal[<?= $index ?>][lokasi]" value="<?= $j['lokasi'] ?>" class="border w-full px-1 rounded">
                                </td>
                                <td class="border p-2">
                                    <input type="text" name="jadwal[<?= $index ?>][kontak]" value="<?= $j['kontak'] ?>" class="border w-full px-1 rounded">
                                </td>
                                <td class="border p-2 text-center">
                                    <?php if ($j['kontak']): ?>
                                        <?php
                                            $pesan = rawurlencode("Halo {$j['klien']}, kami mengingatkan jadwal sesi foto Anda pada tanggal " . ($_GET['tanggal'] ?? date('Y-m-d')) . " jam {$j['jam']} di {$j['lokasi']}. Terima kasih!");
                                            $waLink = "https://wa.me/{$j['kontak']}?text={$pesan}";
                                        ?>
                                        <a href="<?= $waLink ?>" target="_blank" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 text-xs">Kirim</a>
                                    <?php else: ?>
                                        <span class="text-gray-400 italic">-</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <button type="submit" class="bg-black text-white px-5 py-2 rounded hover:bg-gray-800">Perbarui</button>
            </div>
        </form>

        <!-- Pagination Dummy -->
        <div class="flex justify-between items-center mt-6 text-sm text-gray-600">
            <div>Showing 1 to <?= count($jadwal) ?> of <?= count($jadwal) ?> entries</div>
            <div class="space-x-1">
                <button class="px-3 py-1 border rounded hover:bg-gray-100 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100 bg-black text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">Next</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
