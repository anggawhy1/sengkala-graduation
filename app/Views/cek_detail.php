<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<section class="relative min-h-screen flex items-center justify-center text-white py-10 px-4" style="background-image: url('<?= base_url('images/hero1.png') ?>'); background-size: cover; background-position: center;">
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>

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

        <?php
          $rekening = '-';
          if ($metode === 'SeaBank') {
              $rekening = '901395136295';
          } elseif ($metode === 'DANA') {
              $rekening = '081912662103';
          }
        ?>
        <div>Nomor Rekening</div>
        <div>: <?= $rekening ?></div>

        <div>Jenis Pembayaran</div>
        <div>: <?= $jenis_pembayaran ?></div>
      </div>
    </div>

    <hr class="border-dashed border-gray-400">

    <!-- Info Pembayaran -->
    <div>
      <h2 class="font-semibold text-lg text-gray-700 mb-3">Info Pembayaran</h2>
      <div class="grid grid-cols-2 gap-y-2 text-sm">
        <div>Status Pembayaran</div>
        <div>: <?= $status_bayar ?></div>
        <div>Total Tagihan</div>
        <div>: Rp. <?= number_format($total_tagihan, 0, ',', '.') ?>,-</div>

        <?php if ($jenis_pembayaran === 'DP') : ?>
          <div>DP Dibayar</div>
          <div>: Rp.
            <?= ($status_bayar === 'Belum Bayar')
              ? '0'
              : number_format($dp_dibayar, 0, ',', '.') ?>,-
          </div>

          <div>Sisa Tagihan</div>
          <div>: Rp.
            <?= ($status_bayar === 'Belum Bayar')
              ? number_format($total_tagihan, 0, ',', '.')
              : number_format($sisa_tagihan, 0, ',', '.') ?>,-
          </div>
        <?php endif; ?>

        <?php if ($status_bayar !== 'Lunas') : ?>
          <div>Deadline Pelunasan</div>
          <div>: <?= $deadline ?> (H-3)</div>
        <?php endif; ?>
      </div>

      <?php if ($status_pesanan !== 'Menunggu Konfirmasi' && $status_bayar !== 'Lunas') : ?>
        <div class="mt-4 flex flex-col gap-4">
          <p class="text-sm text-gray-700">Lakukan Pelunasan Sekarang</p>

          <form method="POST" action="<?= base_url('/unggah_bukti') ?>" enctype="multipart/form-data" class="space-y-3">
            <input type="hidden" name="id" value="<?= $id ?>">

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

            <button type="submit" class="bg-gray-800 hover:bg-black text-white px-4 py-2 rounded">
              Kirim Bukti
            </button>
          </form>
        </div>
      <?php endif; ?>
    </div>

    <hr class="border-dashed border-gray-400">

    <!-- Status Pesanan -->
    <div>
      <h2 class="font-semibold text-lg text-gray-700 mb-3">Status Pesanan saat Ini</h2>
      <ul class="text-sm space-y-2 pl-4 border-l border-dashed border-gray-400">

        <!-- Pemesanan Diterima -->
        <li class="flex items-center gap-2">
          <?php if ($status_pesanan === 'Menunggu Konfirmasi') : ?>
            <i class="fas fa-clock text-yellow-500"></i>
          <?php else : ?>
            <i class="fas fa-check text-blue-500"></i>
          <?php endif; ?>
          Pemesanan Diterima
        </li>

        <!-- 2. DP Dibayar -->
        <?php if ($jenis_pembayaran === 'DP' && $status_bayar !== 'Belum Bayar') : ?>
          <li class="flex items-center gap-2">
            <i class="fas fa-check text-green-600"></i> DP Dibayar
          </li>
        <?php endif; ?>

        <!-- 3. Menunggu Pelunasan -->
        <?php if ($jenis_pembayaran === 'DP') : ?>
          <li class="flex items-center gap-2">
            <?php if ($status_bayar === 'Lunas') : ?>
              <i class="fas fa-check text-green-600"></i>
            <?php elseif ($status_bayar !== 'Belum Bayar') : ?>
              <i class="fas fa-clock text-yellow-500"></i>
            <?php endif; ?>
          </li>
        <?php endif; ?>

        <!-- Sesi Pemotretan -->
        <?php if ($status_bayar === 'Lunas') : ?>
          <li class="flex items-center gap-2">
            <i class="fas fa-check text-green-600"></i> Sesi Pemotretan
          </li>

          <!-- Editing -->
          <li class="flex items-center gap-2">
            <?php if ($link_drive) : ?>
              <i class="fas fa-check text-green-600"></i>
            <?php else : ?>
              <i class="fas fa-clock text-yellow-500"></i>
            <?php endif; ?>
            Editing
          </li>
        <?php endif; ?>

        <!-- Selesai -->
        <?php if ($link_drive) : ?>
          <li class="flex items-center gap-2">
            <i class="fas fa-check text-green-600"></i> Selesai
          </li>
        <?php endif; ?>
      </ul>
    </div>

    <!-- Tombol Unduh & Cetak -->
    <?php if ($link_drive) : ?>
      <div class="text-center flex flex-col items-center gap-3">
        <a href="<?= esc($link_drive) ?>" target="_blank" class="bg-white border border-gray-600 text-gray-800 py-2 px-6 rounded shadow hover:bg-gray-100 transition">
          <i class="fas fa-download mr-2"></i> Unduh Galeri Foto
        </a>
        <a href="<?= base_url('/invoice/' . $id) ?>" target="_blank" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
          <i class="fas fa-print mr-1"></i> Cetak Invoice PDF
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>

<?= $this->endSection() ?>
