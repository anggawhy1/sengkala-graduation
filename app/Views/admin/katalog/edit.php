<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="container mx-auto px-4">
  <h2 class="text-3xl font-bold text-gray-800 mb-8 border-l-4 border-yellow-500 pl-4">Edit Paket: <?= esc($paket['nama_paket']) ?></h2>

  <form method="post" action="<?= base_url('admin/katalog/update/' . $paket['id']) ?>" class="bg-white p-6 rounded-xl shadow-md space-y-6">

    <!-- Nama Paket -->
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Paket</label>
      <input type="text" name="nama_paket" value="<?= esc($paket['nama_paket']) ?>"
             class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500">
    </div>

    <!-- Harga Paket -->
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
      <input type="number" name="harga" value="<?= esc($paket['harga']) ?>"
             class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500">
    </div>

    <!-- Deskripsi Paket -->
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
      <div class="space-y-2">
        <?php foreach ($detail as $d): ?>
          <input type="text" name="deskripsi[]" value="<?= esc($d['deskripsi']) ?>"
                 class="w-full border border-gray-300 px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500">
        <?php endforeach; ?>
        <!-- Tambahan kosong -->
        <input type="text" name="deskripsi[]" placeholder="Tambah deskripsi baru"
               class="w-full border border-dashed border-gray-300 px-4 py-2 rounded bg-gray-50">
        <input type="text" name="deskripsi[]" placeholder="Tambah deskripsi baru"
               class="w-full border border-dashed border-gray-300 px-4 py-2 rounded bg-gray-50">
      </div>
    </div>

    <!-- Tombol Submit -->
    <div class="text-right">
      <button type="submit"
              class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded shadow-md transition">
        Simpan Perubahan
      </button>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
