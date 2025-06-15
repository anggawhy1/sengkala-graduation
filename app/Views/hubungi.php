<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- Section Hubungi Kami -->
<section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('<?= base_url('images/hero1.png') ?>');">
  <!-- Overlay gelap -->
  <div class="absolute inset-0 bg-[#453f2e]/80 backdrop-brightness-75 z-10"></div>

  <!-- Isi Konten -->
  <div class="relative z-20 text-white text-center py-20 px-4 lg:px-0">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Mari Terhubung Dengan <span class="text-yellow-400">Sengkala</span>
      <i class="fas fa-graduation-cap text-white ml-2"></i>
    </h2>
    <p class="text-base md:text-lg max-w-2xl mx-auto">“Punya pertanyaan, ingin booking, atau konsultasi lebih lanjut? Kami siap bantu kamu.”</p>
  </div>
</section>

<section class="bg-[#f8f8f8] py-12 px-4 md:px-10 lg:px-20">
  <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Ikuti Kami -->
    <div class="border-2 border-dashed border-[#a0a0a0] p-6 rounded-md flex flex-col items-center text-center gap-4">
      <h3 class="text-base font-semibold text-[#3d3d3d]">Ikuti Kami</h3>

      <ul class="space-y-3 text-sm text-[#3d3d3d]">
        <li class="flex items-center justify-center gap-2">
          <i class="fa-brands fa-instagram"></i>
          <span>@sengkala.graduation</span>
        </li>
        <li class="flex items-center justify-center gap-2">
          <i class="fa-brands fa-tiktok"></i>
          <span>@sengkala.graduation</span>
        </li>
        <li class="flex items-center justify-center gap-2">
          <i class="fa-regular fa-envelope"></i>
          <span>sengkala.graduation</span>
        </li>
      </ul>
    </div>

    <!-- Alamat Kami -->
    <div class="border-2 border-dashed border-[#a0a0a0] p-6 rounded-md flex flex-col items-center text-center gap-4">
      <h3 class="text-base font-semibold text-[#3d3d3d]">Alamat Kami</h3>

      <div class="flex flex-col items-center justify-center text-sm text-[#3d3d3d] gap-2">
        <i class="fa-solid fa-location-dot"></i>
        <p>
          Tamantirto, Kasihan, Bantul <br />
          Daerah Istimewa Yogyakarta
        </p>
      </div>
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