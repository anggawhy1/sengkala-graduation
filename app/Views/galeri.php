<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- Galeri Section -->
<section class="h-screen flex flex-col justify-between bg-[#d7cbb7] px-6 md:px-20 py-10 text-black">
  <div class="max-w-7xl mx-auto w-full">

    <!-- Logo besar di kiri atas -->
    <div>
      <img src="<?= base_url('images/logo-galeri.png') ?>" alt="Galeri Sengkala" class="w-60">
    </div>

    <!-- Tengah: gambar gabungan + caption -->
    <div class="flex flex-col items-center text-center flex-grow justify-center">
      <!-- Gambar 3 foto -->
      <img src="<?= base_url('images/hero-galeri.png') ?>" alt="Galeri Foto" class="w-full max-w-3xl mb-6">

      <!-- Caption -->
      <p class="text-base text-gray-700 font-medium px-4 md:px-20">
        Di Setiap Sorot Lensa, Tersimpan Cerita Bahagia Tentang Perjuangan, Persahabatan, dan Akhir yang Indah
      </p>
    </div>

  </div>
</section>

<!-- Grid Galeri Foto -->
<section class="bg-[#d7cbb7] px-4 md:px-20 py-10">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 max-w-7xl mx-auto">

    <!-- Kolom 1 -->
    <div class="flex flex-col gap-4">
      <img src="<?= base_url('images/foto1.png') ?>" alt="foto1" class="rounded-md shadow-md">
      <img src="<?= base_url('images/foto4.png') ?>" alt="foto4" class="rounded-md shadow-md">
      <img src="<?= base_url('images/foto7.png') ?>" alt="foto7" class="rounded-md shadow-md">
    </div>

    <!-- Kolom 2 -->
    <div class="flex flex-col gap-4">
      <img src="<?= base_url('images/foto2.png') ?>" alt="foto2" class="rounded-md shadow-md">
      <img src="<?= base_url('images/foto5.png') ?>" alt="foto5" class="rounded-md shadow-md">
      <img src="<?= base_url('images/foto8.png') ?>" alt="foto8" class="rounded-md shadow-md">
    </div>

    <!-- Kolom 3 -->
    <div class="flex flex-col gap-4">
      <img src="<?= base_url('images/foto3.png') ?>" alt="foto3" class="rounded-md shadow-md">
      <img src="<?= base_url('images/foto6.png') ?>" alt="foto6" class="rounded-md shadow-md">
      <img src="<?= base_url('images/foto9.png') ?>" alt="foto9" class="rounded-md shadow-md">
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section class="bg-cover bg-center relative text-white py-16 px-6 md:px-20" style="background-image: url('<?= base_url("images/cta.png") ?>');">
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>

  <!-- Content -->
  <div class="relative z-10 text-center max-w-3xl mx-auto">
    <!-- Icon Telpon -->
    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full bg-white bg-opacity-90 text-black text-2xl">
      <i class="fas fa-phone-alt"></i>
    </div>

    <!-- Judul -->
    <h2 class="text-2xl md:text-4xl font-bold mb-4">“Siap Abadikan Momen Wisudamu?”</h2>

    <!-- Deskripsi -->
    <p class="text-sm md:text-base mb-6 text-gray-200">
      “Tim kami siap bantu kamu menciptakan kenangan visual yang hangat, estetik, dan personal.
      Booking sekarang, jadikan momen ini tak terlupakan.”
    </p>

    <!-- Tombol -->
    <div class="flex flex-col sm:flex-row justify-center gap-4">
      <a href="pesan" class="px-6 py-2 border border-white rounded-lg hover:bg-white hover:text-black transition duration-300">Pesan Sekarang</a>
      <a href="katalog" class="px-6 py-2 border border-white rounded-lg hover:bg-white hover:text-black transition duration-300">Lihat Katalog</a>
    </div>

    <!-- Sosial Media -->
    <div class="flex justify-center gap-6 mt-8 text-sm">
      <span><i class="fab fa-tiktok mr-1"></i> sengkala.graduation</span>
      <span><i class="fab fa-instagram mr-1"></i> sengkala.graduation</span>
      <span><i class="far fa-envelope mr-1"></i> sengkala.graduation</span>
    </div>
  </div>
</section>

<?= $this->endSection() ?>