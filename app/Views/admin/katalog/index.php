<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="container mx-auto px-4">
  <h2 class="text-3xl font-bold text-gray-800 mb-8 border-l-4 border-yellow-500 pl-4">Daftar Paket</h2>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($paket as $p): ?>
      <div class="bg-white shadow-md rounded-xl overflow-hidden border hover:shadow-lg transition duration-300">
        <div class="p-5 flex flex-col h-full justify-between">
          <div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2"><?= esc($p['nama_paket']) ?></h3>
            <p class="text-yellow-600 text-lg font-bold mb-3">Rp<?= number_format($p['harga'], 0, ',', '.') ?></p>
          </div>
          <div class="mt-auto text-right">
            <a href="<?= base_url('admin/katalog/edit/' . $p['id']) ?>"
               class="inline-block text-sm bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
              Edit Paket
            </a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->endSection() ?>
