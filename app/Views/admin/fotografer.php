<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<section class="p-6 w-full">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold">DAFTAR FOTOGRAFER</h1>

    </div>

    <!-- Subjudul
    <h2 class="text-md font-medium mb-4">Daftar Fotografer</h2> -->

    <!-- Wrapper Putih -->
    <div class="bg-white rounded shadow-md p-4 text-sm space-y-4">

        <!-- Show Entries -->
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
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

        <!-- Kartu Daftar Fotografer -->
        <div class="space-y-4">
            <?php foreach ($fotografer as $f): ?>
                <div class="bg-gray-50 border rounded-lg p-4 flex flex-col gap-4 justify-between h-full">
                    <div class="flex flex-col sm:flex-row sm:items-start gap-4">
                        <!-- Foto Placeholder -->
                        <div class="w-24 h-24 bg-gray-300 rounded"></div>

                        <!-- Info Fotografer -->
                        <div class="flex-1">
                            <div class="grid grid-cols-2 gap-y-1 text-sm text-gray-700">
                                <p><strong>Nama</strong></p>
                                <p>: <?= esc($f['nama']) ?></p>

                                <p><strong>WhatsApp</strong></p>
                                <p>: <?= esc($f['whatsapp']) ?></p>

                                <p><strong>Email</strong></p>
                                <p>: <?= esc($f['email']) ?></p>

                                <p><strong>Status</strong></p>
                                <p>: <?= esc($f['status']) ?></p>

                                <p><strong>Sesi Terdaftar Minggu Ini</strong></p>
                                <p>: <?= esc($f['sesi']) ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Edit -->
                    <div class="flex justify-end">
                        <button onclick="openModal()" class="bg-yellow-300 text-black px-4 py-2 text-sm rounded hover:bg-yellow-400 transition">
                            Edit
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Footer Pagination -->
        <div class="flex justify-between items-center mt-4 text-gray-600 text-sm">
            <div>Showing 1 to <?= count($fotografer) ?> of <?= count($fotografer) ?> entries</div>
            <div class="space-x-1">
                <button class="px-3 py-1 border rounded hover:bg-gray-100 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border rounded bg-black text-white">1</button>
                <button class="px-3 py-1 border rounded hover:bg-gray-100">Next</button>
            </div>
        </div>
    </div>
</section>

<!-- Modal Edit Fotografer -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-md relative">
        <!-- Tombol Close -->
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black">&times;</button>

        <h2 class="text-center text-lg font-semibold mb-4">Edit Data Fotografer</h2>

        <!-- Foto Upload -->
        <div class="flex flex-col items-center mb-4">
            <div class="w-24 h-32 bg-gray-600 rounded mb-2"></div>
            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2-3h6l2 3h4v13H3V7z" />
                </svg>
                <span>Upload Foto</span>
                <input type="file" class="hidden" />
            </label>
        </div>

        <!-- Form Data -->
        <div class="text-sm text-gray-800 space-y-2">
            <div class="flex justify-between">
                <span>Nama</span>
                <span>: Bimbim</span>
            </div>
            <div class="flex justify-between">
                <span>WhatsApp</span>
                <span>: +628 5875 9089</span>
            </div>
            <div class="flex justify-between">
                <span>Email</span>
                <span>: bimmmbim0@gmail.com</span>
            </div>
            <div class="flex justify-between items-center">
                <span>Status</span>
                <span>:
                    <label><input type="checkbox" checked> Aktif</label>
                    <label><input type="checkbox"> Tidak Aktif</label>
                </span>
            </div>
            <div class="flex justify-between">
                <span>Alamat</span>
                <span>: Kasihan, Bantul</span>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="mt-6 flex justify-center">
            <button class="bg-green-400 hover:bg-green-500 text-white px-6 py-2 rounded shadow">
                Simpan
            </button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

<?= $this->endSection() ?>