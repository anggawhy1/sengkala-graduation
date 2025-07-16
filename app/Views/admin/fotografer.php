<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<section class="p-6 w-full">
    <!-- Header + Tambah -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold">DAFTAR FOTOGRAFER</h1>
    </div>

    <!-- List Fotografer -->
    <div class="bg-white rounded shadow-md p-4 text-sm space-y-4">
        <div class="flex justify-between items-center mb-2">
            <div class="flex items-center space-x-2">
                <label class="text-sm text-gray-700">Show</label>
                <select id="entries" class="border px-2 py-1 rounded text-sm">
                    <option>5</option>
                    <option selected>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <span class="text-sm text-gray-700">entries</span>
            </div>
            <button onclick="openTambahModal()" class="bg-black text-white px-3 py-1 text-xs rounded hover:bg-gray-800">+ Tambah</button>
        </div>

        <div class="space-y-4">
            <?php foreach ($fotografer as $f): ?>
                <div class="bg-gray-50 border rounded-lg p-4 flex flex-col sm:flex-row gap-4 justify-between h-full relative">
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <div class="w-24 h-24 bg-gray-300 rounded overflow-hidden">
                            <?php if ($f['foto']): ?><img src="<?= esc($f['foto']) ?>" class="object-cover w-full h-full"><?php endif ?>
                        </div>
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
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-4 right-4 flex gap-2">
                        <!-- Tombol Edit -->
                        <button onclick="openEditModal(
                            '<?= esc($f['id']) ?>',
                            '<?= esc($f['nama']) ?>',
                            '<?= esc($f['whatsapp']) ?>',
                            '<?= esc($f['email']) ?>',
                            '<?= esc($f['status']) ?>',
                            '<?= esc($f['alamat']) ?>'
                        )" class="bg-yellow-400 text-black px-3 py-1 text-xs rounded hover:bg-yellow-500 shadow-sm">Edit</button>

                        <!-- Tombol Hapus -->
                        <a href="/admin/fotografer/delete/<?= $f['id'] ?>"
                            onclick="return confirm('Yakin ingin menghapus fotografer ini?')"
                            class="bg-red-500 text-white px-3 py-1 text-xs rounded hover:bg-red-600 shadow-sm">
                            Hapus
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="flex justify-between items-center mt-4 text-gray-600 text-sm">
            <div>Showing 1 to <?= count($fotografer) ?> of <?= count($fotografer) ?> entries</div>
            <div class="space-x-1">
                <button class="px-3 py-1 border rounded disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border rounded bg-black text-white">1</button>
                <button class="px-3 py-1 border rounded">Next</button>
            </div>
        </div>
    </div>
</section>

<!-- Modal Tambah Fotografer -->
<div id="tambahModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-md relative">
        <!-- Tombol Close -->
        <button onclick="closeTambahModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black">&times;</button>

        <h2 class="text-center text-lg font-semibold mb-4">Tambah Fotografer</h2>

        <form action="/admin/fotografer/tambah" method="post" enctype="multipart/form-data">
            <!-- Upload Foto -->
            <div class="flex flex-col items-center mb-4">
                <div class="w-24 h-32 bg-gray-300 rounded mb-2 overflow-hidden">
                    <img id="preview-tambah" class="w-full h-full object-cover hidden" />
                </div>
                <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2-3h6l2 3h4v13H3V7z" />
                    </svg>
                    <span>Upload Foto</span>
                    <input type="file" name="foto" accept="image/*" class="hidden" onchange="previewImage(this, 'preview-tambah', 'filename-tambah')" />
                </label>
                <div id="filename-tambah" class="mt-1 text-xs text-gray-500"></div>
            </div>

            <!-- Form Input -->
            <div class="text-sm text-gray-800 space-y-3">
                <div>
                    <label>Nama</label>
                    <input type="text" name="nama" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div>
                    <label>WhatsApp</label>
                    <input type="text" name="whatsapp" class="w-full border px-3 py-2 rounded">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" class="w-full border px-3 py-2 rounded">
                </div>
                <div>
                    <label>Status</label>
                    <select name="status" class="w-full border px-3 py-2 rounded">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div>
                    <label>Alamat</label>
                    <textarea name="alamat" rows="2" class="w-full border px-3 py-2 rounded"></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-center">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Fotografer -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-sm relative">
        <button onclick="closeEditModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black">&times;</button>

        <h2 class="text-center text-lg font-semibold mb-4">Edit Fotografer</h2>

        <!-- Foto Upload -->
        <div class="flex flex-col items-center mb-4">
            <div class="w-24 h-32 bg-gray-300 rounded mb-2 overflow-hidden">
                <img id="preview-edit" class="w-full h-full object-cover hidden" />
            </div>
            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h4l2-3h6l2 3h4v13H3V7z" />
                </svg>
                <span>Upload Foto</span>
                <input type="file" name="foto" accept="image/*" class="hidden" onchange="previewImage(this, 'preview-edit', 'filename-edit')" />
            </label>
            <div id="filename-edit" class="mt-1 text-xs text-gray-500"></div>
        </div>

        <form action="/admin/fotografer/update" method="post" enctype="multipart/form-data" class="text-sm text-gray-800 space-y-2">
            <input type="hidden" name="id" id="edit-id">
            <div class="flex justify-between">
                <span>Nama</span>
                <input type="text" name="nama" id="edit-nama" class="border rounded px-2 py-1 w-40 text-sm" required>
            </div>
            <div class="flex justify-between">
                <span>WhatsApp</span>
                <input type="text" name="whatsapp" id="edit-wa" class="border rounded px-2 py-1 w-40 text-sm">
            </div>
            <div class="flex justify-between">
                <span>Email</span>
                <input type="email" name="email" id="edit-email" class="border rounded px-2 py-1 w-40 text-sm">
            </div>
            <div class="flex justify-between">
                <span>Status</span>
                <select name="status" id="edit-status" class="border rounded px-2 py-1 w-40 text-sm">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="flex justify-between">
                <span>Alamat</span>
                <textarea name="alamat" id="edit-alamat" rows="2" class="border rounded px-2 py-1 w-40 text-sm"></textarea>
            </div>

            <div class="mt-6 flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script Preview + Nama File -->
<script>
    function previewImage(input, previewId, filenameId) {
        const preview = document.getElementById(previewId);
        const filenameLabel = document.getElementById(filenameId);
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove("hidden");
                filenameLabel.textContent = file.name;
            };
            reader.readAsDataURL(file);
        }
    }
</script>


<script>
    const openTambahModal = () => document.getElementById('tambahModal').classList.remove('hidden');
    const closeTambahModal = () => document.getElementById('tambahModal').classList.add('hidden');
    const openEditModal = (id, nama, wa, email, status, alamat) => {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-wa').value = wa;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-status').value = status;
        document.getElementById('edit-alamat').value = alamat;
        document.getElementById('editModal').classList.remove('hidden');
    };
    const closeEditModal = () => document.getElementById('editModal').classList.add('hidden');
</script>

<?= $this->endSection() ?>