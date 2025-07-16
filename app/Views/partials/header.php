<?php
$admin = session()->get('admin');
$fotoProfil = isset($admin['foto']) && $admin['foto'] !== ''
    ? base_url('uploads/' . esc($admin['foto']))
    : base_url('uploads/default.png');

$pesananModel = new \App\Models\PesananModel();
$jumlahNotifBaru = $pesananModel->getJumlahNotifikasiBelumDibaca();
?>

<div class="flex items-center justify-between mb-4">
  <h1 class="text-xl font-semibold text-gray-800"><?= $title ?? '' ?></h1>

  <!-- Header Kanan Atas -->
  <div class="fixed top-4 right-4 z-50">
    <div class="flex items-center gap-4 bg-white/30 backdrop-blur-md px-5 py-2.5 rounded-xl shadow-lg border border-white/40 transition duration-300">

      <!-- Tanggal & Jam -->
      <div class="text-right leading-tight">
        <div id="tanggalSekarang" class="text-sm font-semibold text-gray-800"><?= date('d F Y') ?></div>
        <div id="jamSekarang" class="text-xs text-gray-600"></div>
      </div>

      <!-- Notifikasi -->
      <div class="relative">
        <a href="<?= base_url('/admin/notifikasi') ?>" class="relative text-gray-700 hover:text-yellow-600 text-xl transition duration-200">
          <i class="fas fa-bell"></i>

          <?php if ($jumlahNotifBaru > 0): ?>
            <span class="absolute -top-2 -right-2 w-5 h-5 bg-yellow-400 text-xs font-bold text-white rounded-full flex items-center justify-center animate-ping-slow z-10"></span>
            <span class="absolute -top-2 -right-2 w-5 h-5 bg-yellow-500 text-xs font-bold text-white rounded-full flex items-center justify-center z-20">
              <?= esc($jumlahNotifBaru) ?>
            </span>
          <?php endif; ?>
        </a>
      </div>

      <!-- Foto Profil -->
      <a href="<?= base_url('/admin/profil') ?>" class="relative group w-9 h-9 rounded-full overflow-hidden border-2 border-gray-300 hover:ring-2 hover:ring-gray-500 transition duration-200">
        <img src="<?= $fotoProfil ?>" alt="Profil" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
      </a>
    </div>
  </div>
</div>

<!-- Script Jam -->
<script>
  function updateWaktu() {
    const now = new Date();
    const jakartaTime = new Date(now.toLocaleString("en-US", { timeZone: "Asia/Jakarta" }));
    const jam = jakartaTime.getHours().toString().padStart(2, '0');
    const menit = jakartaTime.getMinutes().toString().padStart(2, '0');
    const detik = jakartaTime.getSeconds().toString().padStart(2, '0');
    document.getElementById('jamSekarang').textContent = `${jam}:${menit}:${detik} WIB`;
  }

  setInterval(updateWaktu, 1000);
  updateWaktu();
</script>

<!-- Animasi Ping -->
<style>
  .animate-ping-slow {
    animation: ping 1.8s cubic-bezier(0, 0, 0.2, 1) infinite;
  }

  @keyframes ping {
    0% {
      transform: scale(1);
      opacity: 1;
    }
    75%, 100% {
      transform: scale(2);
      opacity: 0;
    }
  }
</style>
