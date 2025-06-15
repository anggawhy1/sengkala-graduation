<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<section class="relative min-h-screen flex items-center justify-center text-white py-10 px-4" style="background-image: url('<?= base_url('images/hero1.png') ?>'); background-size: cover; background-position: center;">
  <!-- Overlay Gelap -->
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>

  <!-- Konten Utama -->
  <div class="relative z-10 bg-white rounded-xl shadow-lg max-w-2xl w-full p-6 text-gray-800 space-y-6">

    <!-- Info Pemesanan -->
    <div>
      <h2 class="font-semibold text-lg text-gray-700 mb-3">Info Pemesanan</h2>
      <div class="grid grid-cols-2 gap-y-2 text-sm">
        <div>Id Pemesanan</div>
        <div>: <?= $id ?></div>
        <div>Nama Pemesan</div>
        <div>: <?= $nama ?></div>
        <div>Paket</div>
        <div>: <?= $paket ?></div>
        <div>Tanggal Pemesanan</div>
        <div>: <?= $tgl_pesan ?></div>
        <div>Tanggal Sesi Foto</div>
        <div>: <?= $tgl_sesi ?></div>
        <div>Lokasi Sesi</div>
        <div>: <?= $lokasi ?></div>
        <div>Metode Pembayaran</div>
        <div>: <?= $metode ?></div>
      </div>
    </div>

    <!-- Garis putus-putus -->
    <hr class="border-dashed border-gray-400">

    <!-- Info Pembayaran -->
    <div>
      <h2 class="font-semibold text-lg text-gray-700 mb-3">Info Pembayaran</h2>
      <div class="grid grid-cols-2 gap-y-2 text-sm">
        <div>Status Pembayaran</div>
        <div>: <?= $status_bayar ?></div>
        <div>Total Tagihan</div>
        <div>: Rp. <?= number_format($total_tagihan, 0, ',', '.') ?>,-</div>
        <div>DP Dibayar</div>
        <div>: Rp. <?= number_format($dp_dibayar, 0, ',', '.') ?>,-</div>
        <div>Sisa Tagihan</div>
        <div>: Rp. <?= number_format($sisa_tagihan, 0, ',', '.') ?>,-</div>
        <div>Deadline Pelunasan</div>
        <div>: <?= $deadline ?> (H-1)</div>
      </div>

      <div class="mt-4 flex items-center justify-between">
        <p class="text-sm text-gray-700">Lakukan Pelunasan Sekarang</p>
        <div>
          <label for="bukti" class="block font-semibold">Upload Bukti Pembayaran*</label>
          <input
            type="file"
            name="bukti"
            id="bukti"
            accept="image/*,application/pdf"
            required
            class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
           file:rounded-full file:border-0 file:text-sm file:font-semibold
           file:bg-yellow-400 file:text-black hover:file:bg-yellow-500" />
          <p class="text-xs text-gray-500 mt-1">Format: .jpg, .png, .pdf (Max 2MB)</p>
        </div>

      </div>
    </div>

    <!-- Garis putus-putus -->
    <hr class="border-dashed border-gray-400">

    <!-- Status Pesanan -->
    <div>
      <h2 class="font-semibold text-lg text-gray-700 mb-3">Status Pesanan saat Ini</h2>
      <ul class="text-sm space-y-2 pl-4 border-l border-dashed border-gray-400">
        <li class="flex items-center gap-2"><i class="fas fa-check text-blue-500"></i> Pemesanan Diterima</li>
        <li class="flex items-center gap-2"><i class="fas fa-check text-blue-500"></i> DP Dibayar</li>
        <li class="flex items-center gap-2"><i class="fas fa-clock text-yellow-500"></i> Menunggu Pelunasan</li>
        <li class="flex items-center gap-2"><i class="far fa-square text-gray-400"></i> Sesi Pemotretan</li>
        <li class="flex items-center gap-2"><i class="far fa-square text-gray-400"></i> Foto Siap Diunduh</li>
      </ul>
    </div>

    <!-- Tombol Unduh -->
    <div class="text-center">
      <button class="bg-white border border-gray-600 text-gray-800 py-2 px-6 rounded shadow hover:bg-gray-100 transition">
        <i class="fas fa-download mr-2"></i> Unduh Galeri Foto
      </button>
    </div>
  </div>
</section>

<?= $this->endSection() ?>