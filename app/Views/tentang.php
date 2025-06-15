<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<section class="bg-[#3B3A32] py-20 px-6 md:px-16 text-white">
  <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-10 items-center">

    <!-- Kiri: Teks -->
    <div>
      <h2 class="text-3xl md:text-4xl font-bold tracking-wide mb-2">Tentang</h2>
      <h3 class="text-2xl md:text-3xl font-semibold mb-6">
        <span class="text-yellow-400">Sengkala</span> <span class="text-white">Graduation</span>
      </h3>

      <p class="text-lg italic mb-8 border-l-4 border-yellow-400 pl-4">“Lebih dari sekadar jasa foto wisuda, <br>kami adalah penjaga cerita visualmu.”</p>

      <div class="space-y-5 text-sm md:text-base leading-relaxed font-light">
        <p>
          Sengkala Graduation adalah bagian dari Sengkala Fotografi yang secara khusus berfokus pada layanan dokumentasi momen kelulusan. Kami hadir untuk mengabadikan momen bersejarah dalam hidup Anda dengan sentuhan estetika, makna, dan profesionalisme tinggi.
        </p>
        <p>
          Kami memahami bahwa wisuda bukan sekadar seremoni, melainkan puncak dari perjuangan, doa, dan perjalanan panjang. Karena itu, setiap foto yang kami hasilkan dirancang untuk menangkap kebanggaan, kebahagiaan, dan harapan yang terpatri dalam hari spesial tersebut.
        </p>
        <p>
          Dengan tim fotografer yang berpengalaman serta konsep yang kreatif dan kekinian, Sengkala Graduation siap memberikan pengalaman foto kelulusan yang tidak hanya indah, tetapi juga penuh kesan dan karakter pribadi.
        </p>
      </div>
    </div>




    <!-- Kanan: Ilustrasi -->
    <div class="relative">
      <div class="aspect-square w-full rounded-xl overflow-hidden shadow-lg border border-white/10">
        <img src="images/foto1.png" alt="Foto Wisuda" class="w-full h-full object-cover" />
      </div>
      <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-xl overflow-hidden border-4 border-[#e0b973] shadow-xl rotate-3">
        <img src="images/foto2.png" alt="Ilustrasi Wisuda" class="w-full h-full object-cover" />
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