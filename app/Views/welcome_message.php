<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="relative h-screen bg-cover bg-center" style="background-image: url('<?= base_url('images/hero1.png') ?>');">
  <div class="absolute inset-0 bg-black opacity-40"></div>
  <div class="relative z-10 flex flex-col justify-center items-start h-full px-10 md:px-20 text-white">
    <!-- Tambahkan logo di sini -->
    <img src="<?= base_url('images/logo_putih.png') ?>" alt="Logo Sengkala" class="mb-6 w-40 md:w-52">


    <h1 class="text-4xl md:text-5xl font-extrabold mb-4 leading-tight drop-shadow-lg">
      Abadikan Momen
    </h1>
    <h1 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight drop-shadow-lg">
      Wisudamu Bersama <span class="text-yellow-400">Sengkala</span>
      <i class="fas fa-graduation-cap text-white ml-2"></i>

    </h1>

    <p class="text-lg font-semibold mb-6">
      TANGKAP MOMENMU DENGAN RASA, BUKAN SEKEDAR KAMERA
    </p>


    <!-- Button dibungkus agar pindah ke kanan -->
    <div class="w-full flex justify-end">
      <a href="<?= base_url('pesan') ?>" class="border-2 border-white text-white px-6 py-3 rounded-full hover:bg-white hover:text-black transition">
        PESAN SEKARANG
      </a>
    </div>
  </div>
</section>

<!-- Galeri Sengkala -->
<section class="bg-[#D8D0BD] py-16 px-6 md:px-20">
  <div class="flex justify-between items-center mb-10" data-aos="fade-up">
    <div>
      <h2 class="text-3xl md:text-4xl font-bold mb-3">
        <span class="text-black">Galeri</span>
        <span class="text-yellow-600 ml-2">Sengkala</span>
        <i class="fas fa-camera-retro text-yellow-600 ml-2"></i>
      </h2>
      <p class="text-gray-600 font-bold text-sm md:text-base max-w-2xl">
        Di Setiap Sorot Lensa, Tersimpan Cerita Bahagia Tentang Perjuangan, Persahabatan, dan Akhir yang Indah
      </p>
    </div>

    <!-- Tombol Lihat Semua -->
    <a href="<?= base_url('galeri') ?>" class="text-sm md:text-base text-yellow-600 font-semibold hover:underline hover:text-yellow-700 transition">
      Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
    </a>
  </div>


  <!-- Swiper -->
  <div class="swiper mySwiper" data-aos="fade-up" data-aos-delay="100">
    <div class="swiper-wrapper">
      <?php
      $universitas = [
        'Universitas Gadjah Mada',
        'Universitas Negeri Yogyakarta',
        'Universitas Islam Indonesia',
        'Universitas Ahmad Dahlan',
        'Universitas Muhammadiyah Yogyakarta',
        'Universitas Alma Ata',
        'Universitas Sanata Dharma',
        'Universitas Atma Jaya Yogyakarta',
        'Universitas Teknologi Yogyakarta',
        'Universitas AMIKOM Yogyakarta'
      ];
      for ($i = 1; $i <= 10; $i++): ?>
        <div class="swiper-slide">
          <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 hover:scale-105">
            <img src="<?= base_url("images/foto{$i}.png") ?>" alt="Galeri <?= $i ?>" class="w-full h-60 object-cover">
            <div class="p-3 text-center">
              <p class="text-sm text-gray-700">Wisuda 2025 – <?= $universitas[$i - 1] ?></p>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- SwiperJS & AOS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper(".mySwiper", {
    slidesPerView: 2.2,
    spaceBetween: 20,
    loop: true,
    speed: 8000, // Semakin besar = semakin lambat pergeseran
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
      pauseOnMouseEnter: true
    },
    freeMode: {
      enabled: true,
      momentum: false,
    },
    grabCursor: true,
    breakpoints: {
      640: {
        slidesPerView: 2.5
      },
      1024: {
        slidesPerView: 3.5
      }
    }
  });

  // Hentikan autoplay saat user geser manual, lalu jalan lagi otomatis setelah 3 detik
  swiper.el.addEventListener('mouseenter', () => swiper.autoplay.stop());
  swiper.el.addEventListener('mouseleave', () => swiper.autoplay.start());

  let manualSlide = false;
  swiper.on('touchStart', () => {
    manualSlide = true;
    swiper.autoplay.stop();
  });

  swiper.on('touchEnd', () => {
    manualSlide = false;
    setTimeout(() => {
      if (!manualSlide) swiper.autoplay.start();
    }, 3000);
  });
</script>


<!-- Katalog Layanan -->
<section class="py-16 px-6 md:px-20 bg-[#4e4a3f] text-white">
  <div class="max-w-7xl mx-auto">
    <div class="mb-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-2">
        <span class="text-white">Katalog Layanan</span>
        <i class="fas fa-book-open text-yellow-400 text-2xl"></i>
      </h2>
      <p class="text-gray-300">Beragam paket, satu tujuan: hasil foto yang berkesan.</p>
    </div>

    <!-- Swiper Manual -->
    <div class="swiper katalogSwiper relative" data-aos="fade-up">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 5; $i++): ?>
          <div class="swiper-slide">
            <div class="min-w-[250px] bg-cover bg-center rounded-xl relative overflow-hidden shadow-lg"
              style="background-image: url('<?= base_url("images/foto{$i}.png") ?>'); height: 350px;">

              <!-- Overlay gelap -->
              <div class="absolute inset-0 bg-black bg-opacity-55 rounded-xl"></div>

              <!-- Konten -->
              <div class="absolute inset-0 z-10 flex flex-col items-center justify-between text-center px-4 py-6">
                <!-- Title di tengah -->
                <div class="flex-1 flex items-center justify-center">
                  <div class="font-bold text-2xl md:text-3xl leading-snug">
                    <?= $i === 1 ? 'Personal' : ($i === 2 ? 'Group' : ($i === 3 ? 'Couple' : ($i === 4 ? 'Family' : 'Additional'))) ?><br>Package
                  </div>
                </div>

                <!-- Lihat Detail di tengah bawah -->
                <a href="katalog" class="text-sm  hover:text-yellow-400 transition mb-2">
                  Lihat Detail <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>

      <!-- Tombol Panah Swipe -->
      <div class="absolute right-2 top-1/2 -translate-y-1/2 z-20">
        <button id="katalogNext" class="w-10 h-10 rounded-full bg-white text-[#4e4a3f] flex items-center justify-center shadow-lg hover:bg-yellow-400 transition">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- SwiperJS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  const katalogSwiper = new Swiper(".katalogSwiper", {
    slidesPerView: 1.5,
    spaceBetween: 20,
    freeMode: true,
    grabCursor: true,
    breakpoints: {
      640: {
        slidesPerView: 2.5
      },
      1024: {
        slidesPerView: 3.5
      }
    }
  });

  document.getElementById('katalogNext').addEventListener('click', () => {
    katalogSwiper.slideNext();
  });
</script>

<!-- Tentang Kami -->
<section class="relative bg-cover bg-center bg-no-repeat py-20 px-6 md:px-20 text-white" style="background-image: url('<?= base_url("images/tentang.png") ?>');">
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>
  <div class="relative z-10 max-w-7xl mx-auto grid md:grid-cols-2 gap-10 items-center">

    <!-- Logo Box -->
    <div class="bg-white/20 backdrop-blur-md p-6 rounded-xl max-w-md mx-auto md:mx-0">
      <img src="<?= base_url('images/logo_putih.png') ?>" alt="Sengkala Logo" class="w-full object-contain">
    </div>

    <!-- Teks Tentang Kami -->
    <div>
      <h2 class="text-4xl md:text-5xl font-bold mb-6 border-b-4 border-yellow-400 inline-block pb-2">
        Tentang Kami
      </h2>
      <div class="text-gray-100 text-lg leading-relaxed space-y-4">
        <p>Kami adalah <strong>Sengkala</strong>, penyedia jasa fotografi wisuda yang percaya bahwa setiap momen punya cerita.</p>
        <p>Bagi kami, foto bukan sekadar hasil, tapi kenangan yang hidup. Dengan gaya fotografi yang estetik, tone warna hangat, dan pendekatan personal, kami ingin membuat kamu merasa nyaman di depan kamera—dan bangga dengan hasil akhirnya.</p>
        <p>Wisuda hanya sekali, jadi biarkan kami bantu abadikan dengan cara yang berkesan.</p>
      </div>
    </div>
  </div>
</section>

<!-- Apa Kata Mereka -->
<section class="bg-[#d8cdbd] py-20 px-6 md:px-20">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl font-bold text-gray-800 mb-12 flex items-center gap-4">
      Apa Kata Mereka?
      <span class="flex-1 border-t border-gray-400"></span>
    </h2>

    <div class="grid md:grid-cols-3 gap-10">
      <!-- Testimoni 1 -->
      <div class="bg-white rounded-xl shadow-md p-6 relative group hover:scale-[1.02] transition">
        <div class="flex items-start gap-4">
          <img src="<?= base_url('images/foto1.png') ?>" alt="Tasya" class="w-20 h-20 object-cover rounded-full border-4 border-white shadow-md -mt-12 ml-2 transform rotate-2">
          <div>
            <p class="text-gray-800 text-sm italic leading-relaxed">
              “Awalnya aku awkward banget difoto. Tapi tim Sangkala sabar dan bantu arahin. Bahkan aku jadi pengen lanjut prewed sama mereka nanti 😄”
            </p>
            <p class="mt-4 font-semibold text-sm text-gray-600">– Tasya, UNY</p>
          </div>
        </div>
      </div>

      <!-- Testimoni 2 -->
      <div class="bg-gray-100 rounded-xl shadow-md p-6 relative group hover:scale-[1.02] transition">
        <div class="flex items-start gap-4">
          <img src="<?= base_url('images/foto2.png') ?>" alt="Rangga" class="w-20 h-20 object-cover rounded-full border-4 border-white shadow-md -mt-12 ml-2 transform -rotate-2">
          <div>
            <p class="text-gray-800 text-sm italic leading-relaxed">
              “Prosesnya fun, hasilnya memuaskan. Orang tua juga happy banget!”
            </p>
            <p class="mt-4 font-semibold text-sm text-gray-600">– Rangga, UPN</p>
          </div>
        </div>
      </div>

      <!-- Testimoni 3 -->
      <div class="bg-white rounded-xl shadow-md p-6 relative group hover:scale-[1.02] transition">
        <div class="flex items-start gap-4">
          <img src="<?= base_url('images/foto3.png') ?>" alt="Mika" class="w-20 h-20 object-cover rounded-full border-4 border-white shadow-md -mt-12 ml-2 transform rotate-1">
          <div>
            <p class="text-gray-800 text-sm italic leading-relaxed">
              “Aku pesan dadakan karena wisuda maju. Untung ketemu Sangkala – proses cepat, hasil tetap maksimal!”
            </p>
            <p class="mt-4 font-semibold text-sm text-gray-600">– Mika, UAA</p>
          </div>
        </div>
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