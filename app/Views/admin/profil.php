<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="max-w-5xl mx-auto p-6 space-y-6">
    <h2 class="text-2xl font-extrabold text-gray-800 mb-2">Pengaturan Profil</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Preview Profil -->
        <div class="bg-white shadow rounded-lg p-5 text-center border">
            <img id="fotoPreview" src="<?= base_url('uploads/' . esc($user['foto'] ?? 'default.png')) ?>" alt="Foto Profil" class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-blue-500 shadow-md">
            <h3 class="text-lg font-bold text-gray-800"><?= esc($user['nama_lengkap'] ?? '-') ?></h3>
            <p class="text-sm text-gray-600"><?= esc($user['email'] ?? '-') ?></p>
            <p class="text-sm text-gray-600 mt-1"><?= esc($user['no_hp'] ?? '-') ?></p>
        </div>

        <!-- Form Edit -->
        <form action="<?= base_url('admin/profil/update') ?>" method="post" enctype="multipart/form-data" class="md:col-span-2 bg-white border rounded-lg shadow p-6 space-y-4">
            <?= csrf_field() ?>

            <!-- Ganti Foto -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Ganti Foto</label>
                <input type="file" name="foto" id="fotoInput" class="mt-1 block w-full text-sm file:px-3 file:py-1 file:border file:border-gray-300 file:rounded" onchange="previewFoto(event)">
            </div>

            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?= esc($user['nama_lengkap'] ?? '') ?>" class="mt-1 w-full px-4 py-2 border rounded text-gray-800" required>
            </div>

            <!-- Username -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" value="<?= esc($user['username'] ?? '') ?>" class="mt-1 w-full px-4 py-2 border rounded text-gray-800" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="<?= esc($user['email'] ?? '') ?>" class="mt-1 w-full px-4 py-2 border rounded text-gray-800" required>
            </div>

            <!-- No HP -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <input type="text" name="no_hp" value="<?= esc($user['no_hp'] ?? '') ?>" class="mt-1 w-full px-4 py-2 border rounded text-gray-800" required>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Password Baru</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak diubah" class="mt-1 w-full px-4 py-2 border rounded text-gray-800">
            </div>

            <!-- Tombol -->
            <div class="text-right pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- JS Preview Foto -->
<script>
function previewFoto(event) {
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('fotoPreview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

<?= $this->endSection() ?>
