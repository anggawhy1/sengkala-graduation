<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative h-screen bg-cover bg-center flex items-center justify-start px-6 md:px-20" style="background-image: url('images/hero1.png');">
  <!-- Overlay gelap -->
  <div class="absolute inset-0 bg-black bg-opacity-30 z-0"></div>

  <!-- Teks Utama -->
  <div class="relative z-10 text-white max-w-xl">
    <h1 class="text-4xl md:text-5xl font-bold mb-3">Katalog Sengkala</h1>
    <p class="text-lg md:text-xl">Beragam paket, satu tujuan: hasil foto yang berkesan.</p>
  </div>

  <!-- Navigasi Paket -->
  <div class="absolute bottom-24 md:bottom-32 left-1/2 transform -translate-x-1/2 z-10 flex flex-wrap justify-center gap-6 text-white text-sm md:text-base font-medium">
    <a href="#personal" class="border-l-2 pl-3 border-white hover:text-[#E6B800] transition">Personal Package</a>
    <a href="#couple" class="border-l-2 pl-3 border-white hover:text-[#E6B800] transition">Couple Package</a>
    <a href="#group" class="border-l-2 pl-3 border-white hover:text-[#E6B800] transition">Group Package</a>
    <a href="#bundling" class="border-l-2 pl-3 border-white hover:text-[#E6B800] transition">Bundling</a>
  </div>
</section>



<section class="bg-[#3B3A32] py-16 px-4 md:px-10 lg:px-24 text-white">
  <div class="text-center mb-7">
    <!-- <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">Katalog Sengkala</h2>
    <p class="text-gray-200 text-base">Beragam paket, satu tujuan: hasil foto yang berkesan.</p> -->
  </div>

  <!-- Personal Package -->
  <div class="mb-16">
    <h3 class="text-2xl font-semibold text-white mb-6 border-l-4 border-[#E6B800] pl-3">Personal Package</h3>

    <!-- Paket A & B -->
    <div class="grid md:grid-cols-2 gap-6 items-stretch mb-6">
      <img src="images/foto1.png" alt="Personal A dan B" class="rounded-xl shadow-md w-full object-cover h-full max-h-[500px]">

      <div class="flex flex-col justify-between gap-4">
        <!-- Personal A -->
        <div class="bg-[#4A4A45] p-5 rounded-xl shadow-lg border-l-4 border-[#E6B800] hover:scale-[1.03] transition duration-300 ease-in-out flex-1 flex flex-col justify-between">
          <h4 class="font-semibold text-white mb-2">Personal A</h4>
          <ul class="list-disc ml-4 text-sm text-gray-200 space-y-1 mb-2">
            <li>1 Wisudawan Family</li>
            <li>30 Menit Durasi</li>
            <li>Unlimited Shoot 1 Lokasi</li>
            <li>Multiple Spot</li>
            <li>15+ File Edit</li>
            <li>All File On Gdrive</li>
          </ul>
          <p class="text-sm text-right text-white font-medium hover:text-[#E6B800] transition duration-300 cursor-pointer mt-auto">Cek Harga →</p>
        </div>

        <!-- Personal B -->
        <div class="bg-[#4A4A45] p-5 rounded-xl shadow-lg border-l-4 border-[#E6B800] hover:scale-[1.03] transition duration-300 ease-in-out flex-1 flex flex-col justify-between">
          <h4 class="font-semibold text-white mb-2">Personal B</h4>
          <ul class="list-disc ml-4 text-sm text-gray-200 space-y-1 mb-2">
            <li>1 Wisudawan Family</li>
            <li>60 Menit Durasi</li>
            <li>Unlimited Shoot 1 Lokasi</li>
            <li>Multiple Spot</li>
            <li>30+ File Edit</li>
            <li>All File On Gdrive</li>
          </ul>
          <p class="text-sm text-right text-white font-medium hover:text-[#E6B800] transition duration-300 cursor-pointer mt-auto">Cek Harga →</p>
        </div>
      </div>
    </div>

    <!-- Paket C & D -->
    <div class="grid md:grid-cols-2 gap-6 items-stretch mb-6">
      <div class="flex flex-col justify-between gap-4">
        <!-- Personal C -->
        <div class="bg-[#4A4A45] p-5 rounded-xl shadow-lg border-l-4 border-[#E6B800] hover:scale-[1.03] transition duration-300 ease-in-out flex-1 flex flex-col justify-between">
          <h4 class="font-semibold text-white mb-2">Personal C</h4>
          <ul class="list-disc ml-4 text-sm text-gray-200 space-y-1 mb-2">
            <li>2 Wisudawan</li>
            <li>30 Menit Durasi</li>
            <li>Unlimited Shoot 1 Lokasi</li>
            <li>Multiple Spot</li>
            <li>15+ File Edit</li>
            <li>All File On Gdrive</li>
          </ul>
          <p class="text-sm text-right text-white font-medium hover:text-[#E6B800] transition duration-300 cursor-pointer mt-auto">Cek Harga →</p>
        </div>

        <!-- Personal D -->
        <div class="bg-[#4A4A45] p-5 rounded-xl shadow-lg border-l-4 border-[#E6B800] hover:scale-[1.03] transition duration-300 ease-in-out flex-1 flex flex-col justify-between">
          <h4 class="font-semibold text-white mb-2">Personal D</h4>
          <ul class="list-disc ml-4 text-sm text-gray-200 space-y-1 mb-2">
            <li>2 Wisudawan</li>
            <li>60 Menit Durasi</li>
            <li>Unlimited Shoot 1 Lokasi</li>
            <li>Multiple Spot</li>
            <li>30+ File Edit</li>
            <li>All File On Gdrive</li>
          </ul>
          <p class="text-sm text-right text-white font-medium hover:text-[#E6B800] transition duration-300 cursor-pointer mt-auto">Cek Harga →</p>
        </div>
      </div>

      <img src="images/foto4.png" alt="Personal C dan D" class="rounded-xl shadow-md w-full object-cover h-full max-h-[500px]">
    </div>
  </div>


  <!-- Couple Package -->
  <div>
    <h3 class="text-2xl font-semibold text-white mb-6 border-l-4 border-[#E6B800] pl-3">Couple Package</h3>
    <div class="grid md:grid-cols-3 gap-6">

      <!-- Card -->
      <div class="bg-[#4A4A45] p-5 rounded-xl shadow-lg border-t-4 border-[#E6B800] hover:scale-[1.03] transition duration-300 ease-in-out text-center flex flex-col justify-between">
        <img src="images/foto1.png" alt="Couple A" class="w-full h-48 object-cover rounded mb-4">
        <div>
          <h4 class="font-semibold text-white mb-2">Couple A</h4>
          <ul class="text-sm text-gray-200 space-y-1 mb-4">
            <li>2 Wisudawan NO Family</li>
            <li>60 Menit Durasi</li>
            <li>Unlimited Shoot 1 Lokasi</li>
            <li>Multiple Spot</li>
            <li>40+ File Edit</li>
            <li>Include Personal Photo</li>
            <li>All File On Gdrive</li>
          </ul>
        </div>
        <p class="text-sm text-white font-medium mt-auto text-right hover:text-[#E6B800] transition duration-300 cursor-pointer">Cek Harga →</p>
      </div>

      <!-- Card -->
      <div class="bg-[#4A4A45] p-5 rounded-xl shadow-lg border-t-4 border-[#E6B800] hover:scale-[1.03] transition duration-300 ease-in-out text-center flex flex-col justify-between">
        <img src="images/foto1.png" alt="Couple B" class="w-full h-48 object-cover rounded mb-4">
        <div>
          <h4 class="font-semibold text-white mb-2">Couple B</h4>
          <ul class="text-sm text-gray-200 space-y-1 mb-4">
            <li>2 Wisudawan NO Family</li>
            <li>90 Menit Durasi</li>
            <li>Unlimited Shoot 1 Lokasi</li>
            <li>Multiple Spot</li>
            <li>50+ File Edit</li>
            <li>Include Personal Photo</li>
            <li>All File On Gdrive</li>
          </ul>
        </div>
        <p class="text-sm text-white font-medium mt-auto text-right hover:text-[#E6B800] transition duration-300 cursor-pointer">Cek Harga →</p>
      </div>

      <!-- Card -->
      <div class="bg-[#4A4A45] p-5 rounded-xl shadow-lg border-t-4 border-[#E6B800] hover:scale-[1.03] transition duration-300 ease-in-out text-center flex flex-col justify-between">
        <img src="images/foto1.png" alt="Couple C" class="w-full h-48 object-cover rounded mb-4">
        <div>
          <h4 class="font-semibold text-white mb-2">Couple C</h4>
          <ul class="text-sm text-gray-200 space-y-1 mb-4">
            <li>2 Wisudawan NO Family</li>
            <li>120 Menit Durasi</li>
            <li>Unlimited Shoot 1 Lokasi</li>
            <li>Multiple Spot</li>
            <li>60+ File Edit</li>
            <li>Include Personal Photo</li>
            <li>All File On Gdrive</li>
          </ul>
        </div>
        <p class="text-sm text-white font-medium mt-auto text-right hover:text-[#E6B800] transition duration-300 cursor-pointer">Cek Harga →</p>
      </div>

    </div>
  </div>


  <!-- Group Package -->
  <div class="mt-20">
    <h3 class="text-2xl font-semibold text-white mb-6 border-l-4 border-[#E5C07B] pl-3">Group Package</h3>
    <div class="grid md:grid-cols-3 gap-6">

      <!-- Group A -->
      <div class="bg-[#4A4942] p-5 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.02] transition duration-300 ease-in-out">
        <img src="images/foto1.png" alt="Group A" class="w-full h-48 object-cover rounded-md mb-4 shadow-sm">
        <h4 class="font-semibold text-white text-lg mb-2">Group A</h4>
        <ul class="text-sm text-white list-disc ml-4 space-y-1">
          <li>3–6 Wisudawan</li>
          <li>60 Menit Durasi</li>
          <li>Unlimited Shoot 1 Lokasi</li>
          <li>Multiple Spot</li>
          <li>30+ File Edit</li>
          <li>Group Only</li>
          <li>All File On Gdrive</li>
        </ul>
        <p class="text-sm text-right text-white mt-4 font-medium cursor-pointer hover:text-[#E5C07B] transition">Cek Harga →</p>
      </div>

      <!-- Group B -->
      <div class="bg-[#4A4942] p-5 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.02] transition duration-300 ease-in-out">
        <img src="images/foto5.png" alt="Group B" class="w-full h-48 object-cover rounded-md mb-4 shadow-sm">
        <h4 class="font-semibold text-white text-lg mb-2">Group B</h4>
        <ul class="text-sm text-white list-disc ml-4 space-y-1">
          <li>3–6 Wisudawan</li>
          <li>90 Menit Durasi</li>
          <li>Unlimited Shoot 1 Lokasi</li>
          <li>Multiple Spot</li>
          <li>40+ File Edit</li>
          <li>Group Only</li>
          <li>All File On Gdrive</li>
        </ul>
        <p class="text-sm text-right text-white mt-4 font-medium cursor-pointer hover:text-[#E5C07B] transition">Cek Harga →</p>
      </div>

      <!-- Group C -->
      <div class="bg-[#4A4942] p-5 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.02] transition duration-300 ease-in-out">
        <img src="images/foto2.png" alt="Group C" class="w-full h-48 object-cover rounded-md mb-4 shadow-sm">
        <h4 class="font-semibold text-white text-lg mb-2">Group C</h4>
        <ul class="text-sm text-white list-disc ml-4 space-y-1">
          <li>7–10 Wisudawan</li>
          <li>90 Menit Durasi</li>
          <li>Unlimited Shoot 1 Lokasi</li>
          <li>Multiple Spot</li>
          <li>45+ File Edit</li>
          <li>Group Only</li>
          <li>All File On Gdrive</li>
        </ul>
        <p class="text-sm text-right text-white mt-4 font-medium cursor-pointer hover:text-[#E5C07B] transition">Cek Harga →</p>
      </div>
    </div>

    <!-- Bundling Package -->
    <div class="mt-20">
      <h3 class="text-2xl font-semibold text-white mb-6 border-l-4 border-[#E5C07B] pl-3">Bundling & Additional</h3>
      <div class="grid md:grid-cols-2 gap-6">

        <!-- Bundling Video -->
        <div class="bg-[#4A4942] p-5 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.02] transition duration-300 ease-in-out">
          <h4 class="font-semibold text-white text-lg mb-2">Bundling Video</h4>
          <ul class="text-sm text-white list-disc ml-4 space-y-1">
            <li>1 Wisudawan & Family</li>
            <li>60 Menit Durasi</li>
            <li>Unlimited Shoot 1 Lokasi</li>
            <li>Multiple Spot</li>
            <li>30+ File Edit</li>
            <li>Video Cinematik 30–60 Detik</li>
            <li>All File On Gdrive</li>
          </ul>
          <p class="text-sm text-right text-white mt-4 font-medium cursor-pointer hover:text-[#E5C07B] transition">Cek Harga →</p>
        </div>

        <!-- Additional -->
        <div class="bg-[#4A4942] p-5 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.02] transition duration-300 ease-in-out">
          <h4 class="font-semibold text-white text-lg mb-2">Additional</h4>
          <ul class="text-sm text-white list-disc ml-4 space-y-1">
            <li>Extra Time 30 Menit 100k (Personal Package)</li>
            <li>Extra Time 30 Menit 150k (Group Package)</li>
            <li>Add Person in Group 50k</li>
            <li>Extra Edit 50k/30 Foto</li>
            <li>Additional Fish Eye 50k</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Order Process -->
    <div class="mt-20">
      <h3 class="text-2xl font-semibold text-white mb-6 border-l-4 border-[#E5C07B] pl-3">Order Process</h3>

      <div class="grid grid-cols-2 md:grid-cols-6 gap-4 text-center">

        <div class="bg-[#4A4942] p-4 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.05] transition duration-300 ease-in-out flex flex-col items-center text-sm text-white">
          <i class="fas fa-search text-3xl mb-2"></i>
          <p class="font-semibold">Browse</p>
          <p class="text-xs text-[#DCDCDC]">Memilih Paket Sesuai Kebutuhan Wisudawan</p>
        </div>

        <div class="bg-[#4A4942] p-4 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.05] transition duration-300 ease-in-out flex flex-col items-center text-sm text-white">
          <i class="fas fa-check-circle text-3xl mb-2"></i>
          <p class="font-semibold">Confirm</p>
          <p class="text-xs text-[#DCDCDC]">Konfirmasi Paket dan Slot ke Admin</p>
        </div>

        <div class="bg-[#4A4942] p-4 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.05] transition duration-300 ease-in-out flex flex-col items-center text-sm text-white">
          <i class="fas fa-credit-card text-3xl mb-2"></i>
          <p class="font-semibold">Payment</p>
          <p class="text-xs text-[#DCDCDC]">Melakukan DP Min 30% dari Harga Paket</p>
        </div>

        <div class="bg-[#4A4942] p-4 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.05] transition duration-300 ease-in-out flex flex-col items-center text-sm text-white">
          <i class="fas fa-camera-retro text-3xl mb-2"></i>
          <p class="font-semibold">Photoshoot</p>
          <p class="text-xs text-[#DCDCDC]">Sesi Foto Sesuai Jadwal & Lokasi</p>
        </div>

        <div class="bg-[#4A4942] p-4 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.05] transition duration-300 ease-in-out flex flex-col items-center text-sm text-white">
          <i class="fas fa-folder-open text-3xl mb-2"></i>
          <p class="font-semibold">All File</p>
          <p class="text-xs text-[#DCDCDC]">Pengiriman File Maksimal H+1</p>
        </div>

        <div class="bg-[#4A4942] p-4 rounded-xl shadow-lg border-t-4 border-[#E5C07B] hover:scale-[1.05] transition duration-300 ease-in-out flex flex-col items-center text-sm text-white">
          <i class="fas fa-edit text-3xl mb-2"></i>
          <p class="font-semibold">Editing</p>
          <p class="text-xs text-[#DCDCDC]">File Edit Maksimal H+7</p>
        </div>

      </div>

      <p class="text-xs text-[#DCDCDC] mt-4 text-center italic cursor-pointer" onclick="toggleSkModal()">*S&amp;K Berlaku</p>

      <div id="skModal" class="fixed inset-0 bg-black/60 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg max-w-lg w-[90%] p-6 relative">
          <button onclick="toggleSkModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl">&times;</button>
          <h2 class="text-xl font-bold text-center mb-4 text-gray-900 ">Sengkala Graduation</h2>
          <div class="text-sm space-y-2 text-[#2f2f2f]">
            <p>Halo teman Sengkala...</p>
            <p>Sebelum teman Sengkala melihat pricelist kami mengajak teman Sengkala untuk membaca ini terlebih dahulu ya!</p>
            <ul class="list-disc list-inside space-y-1">
              <li>Kami berharap Teman Sengkala memilih karena suka dengan HASIL FOTO dan TONE WARNA kami.</li>
              <li>Sengkala Graduation tidak menerima request TONE WARNA.</li>
              <li>Booking: WAJIB DP minimal 30% dan hangus jika cancel sepihak.</li>
              <li>Booking diinput setelah DP, pelunasan H-1 sesi foto.</li>
              <li>Fiksasi tanggal/waktu/lokasi H-7.</li>
              <li>Tidak ada toleransi keterlambatan saat hari H.</li>
              <li>File dikirim maksimal H+1 ke Google Drive.</li>
              <li>Drive hanya aktif 2 minggu dari sesi foto.</li>
              <li>Editing: 3–7 hari. Hanya color correction, framing, dll. Tidak terima edit bentuk tubuh, ganti background.</li>
              <li>Booking berarti menyetujui S&K ini.</li>
            </ul>
            <p class="text-right font-medium mt-4">Salam Hangat,<br />Sengkala Team</p>
          </div>
        </div>
      </div>

    </div>

</section>

<script>
  function toggleSkModal() {
    const modal = document.getElementById('skModal');
    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
  }
</script>


<!-- #################################### -->

<section>






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