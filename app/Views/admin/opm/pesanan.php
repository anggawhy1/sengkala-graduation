<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<section class="p-6 space-y-6">
    <!-- Judul & Icon -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Daftar Pesanan Baru</h1>
    </div>

    <!-- Kotak Putih -->
    <div class="bg-white rounded-xl shadow-md p-4 space-y-4">
        <!-- Filter & Show -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <!-- Filter Tanggal -->
            <form action="/admin/opm/pesanan" method="get" class="flex items-center gap-2">
                <label for="tanggal" class="text-sm font-medium text-gray-700">Pilih Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" value="<?= $_GET['tanggal'] ?? date('Y-m-d') ?>" class="border border-gray-300 rounded px-2 py-1 text-sm">
                <button type="submit" class="bg-black text-white px-4 py-1 text-sm rounded hover:bg-gray-800">Lihat</button>
            </form>

            <!-- Show Entries -->
            <div class="flex items-center space-x-2 ml-auto">
                <label for="entries" class="text-sm text-gray-700">Show</label>
                <select id="entries" name="entries" class="border px-2 py-1 rounded text-sm">
                    <option>5</option>
                    <option selected>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <span class="text-sm text-gray-700">entries</span>
            </div>
        </div>

        <!-- Kartu Pesanan -->
        <div class="grid md:grid-cols-2 gap-6">
            <?php if (count($pesanan) > 0): ?>
                <?php foreach ($pesanan as $p): ?>
                    <div class="bg-gray-50 shadow-sm border rounded-xl p-5 hover:shadow-md transition">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <p class="text-sm text-gray-500">ID Pesanan</p>
                                <p class="text-lg font-semibold text-gray-800"><?= esc($p['id']) ?></p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-500">Jam Masuk</p>
                                <p class="text-lg font-medium text-gray-700"><?= esc($p['jam_masuk']) ?></p>
                            </div>
                        </div>

                        <!-- Nama Klien -->
                        <div class="text-gray-600 text-sm mb-1">
                            <strong>Nama Klien:</strong> <?= esc($p['nama_klien']) ?>
                        </div>

                        <!-- Status Pesanan -->
                        <div class="mb-4">
                            <span class="inline-block text-xs font-medium px-3 py-1 rounded-full 
                        <?php
                        $status = strtolower($p['status']);
                        if (str_contains($status, 'konfirmasi')) echo 'bg-yellow-100 text-yellow-800';
                        elseif (str_contains($status, 'selesai')) echo 'bg-green-100 text-green-800';
                        elseif (str_contains($status, 'batal')) echo 'bg-red-100 text-red-800';
                        else echo 'bg-gray-100 text-gray-800';
                        ?>">
                                <?= esc($p['status']) ?>
                            </span>
                        </div>

                        <!-- Tombol Aksi -->
                        <a href="/admin/opm/pesanan/detail/<?= esc($p['id']) ?>" class="inline-block bg-black text-white px-4 py-2 text-sm rounded hover:bg-gray-800 transition">
                            Lihat Selengkapnya
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center text-gray-500 italic">
                    Tidak ada pesanan untuk tanggal ini.
                </div>
            <?php endif; ?>
        </div>


        <!-- Footer Pagination -->
        <div class="flex justify-between items-center mt-4 text-gray-600 text-sm">
            <div>Showing 1 to <?= count($pesanan) ?> of <?= count($pesanan) ?> entries</div>
            <div class="space-x-1">
                <button class="px-3 py-1 border rounded hover:bg-gray-100 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border rounded bg-black text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">Next</button>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>