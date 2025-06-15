<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<section class="relative bg-cover bg-center h-[90vh] flex items-center justify-center text-white" style="background-image: url('<?= base_url('images/hero1.png') ?>');">
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>

  <div class="relative z-10 text-center px-6 max-w-xl">
    <h2 class="text-3xl md:text-4xl font-bold mb-2">Cek Status Pesananmu</h2>
    <p class="text-base md:text-lg italic mb-6">“Masukkan ID pesanan kamu untuk melihat progres sesi foto.”</p>

    <form class="flex items-center bg-white rounded-full overflow-hidden shadow-lg" method="post" action="/cek">
      <input
        name="id"
        type="text"
        placeholder="Masukkan ID"
        class="flex-1 px-5 py-3 text-gray-700 focus:outline-none"
        required />
      <button type="submit" class="bg-yellow-400 px-5 py-3">
        <i class="fas fa-search text-white text-lg"></i>
      </button>
    </form>
  </div>

  <?php if (session()->getFlashdata('error')): ?>
    <!-- Modal -->
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 z-50">
      <div class="bg-white rounded-xl p-6 w-[90%] max-w-md shadow-lg text-center">
        <div class="text-red-500 text-4xl mb-4">
          <i class="fas fa-times-circle"></i>
        </div>
        <p class="text-gray-800 font-semibold mb-4">
          “Ups! Kami tidak menemukan pesanan dengan ID tersebut.<br>
          Coba periksa kembali atau hubungi tim kami.”
        </p>
        <button onclick="closeModal()" class="bg-gray-700 text-white px-4 py-2 rounded-md">Tutup</button>
      </div>
    </div>

    <script>
      function closeModal() {
        document.querySelector('.fixed.inset-0').remove();
      }
    </script>
  <?php endif; ?>
</section>

<?= $this->endSection() ?>