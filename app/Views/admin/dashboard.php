<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-6 space-y-6">
  <!-- Header -->
  <div class="flex justify-between items-start">
    <div>
      <h1 class="text-xl font-semibold">“SELAMAT DATANG, ADMIN!”</h1>
    </div>
  </div>

  <!-- Statistik Box -->
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-6">
    <!-- Pesanan Hari Ini -->
    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-md border border-gray-200 hover:shadow-lg transition">
      <div class="flex items-center justify-between mb-4">
        <h4 class="text-sm font-semibold text-gray-600">Pesanan Hari Ini</h4>
        <div class="relative glow-icon bg-blue-100 p-2 rounded-full text-blue-500">
          <i class="fas fa-calendar-day relative z-10"></i>
        </div>

      </div>
      <p class="text-3xl font-bold text-gray-800"><?= $statistik['pesananHariIni'] ?></p>
      <p class="text-sm text-gray-500 mt-2">
        Menunggu Konfirmasi:
        <span class="font-semibold text-yellow-600"><?= $statistik['menungguKonfirmasi'] ?></span>
      </p>
    </div>

    <!-- Total Pembayaran Masuk -->
    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-md border border-gray-200 hover:shadow-lg transition">
      <div class="flex items-center justify-between mb-4">
        <h4 class="text-sm font-semibold text-gray-600">Total Pembayaran Masuk</h4>
        <div class="relative glow-icon bg-green-100 p-2 rounded-full text-green-600">
          <i class="fas fa-wallet relative z-10"></i>
        </div>
      </div>
      <p class="text-3xl font-bold text-gray-800">Rp <?= number_format($statistik['totalPembayaranMasuk'], 0, ',', '.') ?></p>
      <p class="text-sm text-gray-500 mt-2">Dari semua transaksi lunas</p>
    </div>

    <!-- Pesanan Selesai -->
    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-md border border-gray-200 hover:shadow-lg transition">
      <div class="flex items-center justify-between mb-4">
        <h4 class="text-sm font-semibold text-gray-600">Pesanan Selesai</h4>
        <div class="relative glow-icon bg-blue-100 p-2 rounded-full text-blue-600">
          <i class="fas fa-check-circle relative z-10"></i>
        </div>
      </div>
      <p class="text-3xl font-bold text-gray-800"><?= $statistik['totalPesananSelesai'] ?></p>
      <p class="text-sm text-gray-500 mt-2">Total pesanan yang telah diselesaikan</p>
    </div>
  </div>

  <!-- Aktivitas Terbaru -->
  <div class="bg-white/80 backdrop-blur-sm p-6 shadow-md rounded-lg border border-gray-200 mb-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-800">Aktivitas Pesanan Terbaru</h3>
      <a href="<?= base_url('admin/opm/pesanan') ?>" class="text-blue-600 text-sm hover:underline">Lihat Selengkapnya</a>
    </div>

    <?php if (!empty($aktivitasTerbaru)): ?>
      <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left">
          <thead class="bg-gray-100 text-gray-700">
            <tr>
              <th class="py-3 px-4 border-b">ID Pesanan</th>
              <th class="py-3 px-4 border-b">Nama Klien</th>
              <th class="py-3 px-4 border-b">Jam Masuk</th>
              <th class="py-3 px-4 border-b">Status</th>
              <th class="py-3 px-4 border-b">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (array_slice($aktivitasTerbaru, 0, 10) as $a): ?>
              <?php
              // Tentukan warna status berdasarkan nilai
              $statusClass = match ($a['status']) {
                'Belum Diproses'     => 'text-gray-600',
                'Editing'            => 'text-blue-500',
                'Selesai'            => 'text-green-600',
                'Belum Bayar'        => 'text-yellow-500',
                'Belum Lunas'        => 'text-yellow-600',
                'Lunas'              => 'text-emerald-600',
                'Ditolak'            => 'text-red-600',
                'Menunggu Konfirmasi'   => 'text-yellow-500',
                default              => 'text-gray-500',
              };
              ?>
              <tr class="hover:bg-gray-50 transition">
                <td class="py-2 px-4 border-b"><?= esc($a['id']) ?></td>
                <td class="py-2 px-4 border-b"><?= esc($a['klien']) ?></td>
                <td class="py-2 px-4 border-b"><?= esc($a['jam']) ?></td>
                <td class="py-2 px-4 border-b font-medium <?= $statusClass ?>"><?= esc($a['status']) ?></td>
                <td class="py-2 px-4 border-b">
                  <a href="<?= base_url('admin/opm/pesanan/detail/' . $a['id']) ?>" class="text-green-600 hover:underline">
                    Lihat Detail
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p class="text-center text-gray-400">Belum ada aktivitas terbaru.</p>
    <?php endif; ?>
  </div>

  <!-- Grafik Statistik -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Bar Chart -->
    <div class="bg-white rounded-lg shadow border p-5 flex flex-col">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Total Pesanan 7 Hari Terakhir</h3>
      <div class="relative flex-1">
        <canvas id="barChart" class="w-full h-full"></canvas>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="bg-white rounded-lg shadow border p-5 flex flex-col items-center justify-center">
      <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Status Pesanan Saat Ini</h3>
      <div class="relative w-[220px] h-[220px]">
        <canvas id="pieChart"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js -->
<script>
  const barCtx = document.getElementById('barChart').getContext('2d');
  const pieCtx = document.getElementById('pieChart').getContext('2d');

  const barChart = new Chart(barCtx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($grafikPesanan['labels']) ?>,
      datasets: [{
        label: 'Pesanan',
        data: <?= json_encode($grafikPesanan['data']) ?>,
        backgroundColor: '#3B82F6',
        borderRadius: 8,
        barThickness: 28,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          ticks: {
            color: '#4B5563',
            font: {
              size: 12,
              weight: '500'
            }
          },
          grid: {
            display: false
          }
        },
        y: {
          beginAtZero: true,
          ticks: {
            color: '#4B5563',
            font: {
              size: 12,
              weight: '500'
            },
            stepSize: 1
          },
          grid: {
            color: '#E5E7EB',
            borderDash: [4, 4]
          }
        }
      },
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: '#1F2937',
          titleColor: '#F9FAFB',
          bodyColor: '#F9FAFB',
          borderColor: '#9CA3AF',
          borderWidth: 1
        }
      }
    }
  });

  const pieChart = new Chart(pieCtx, {
    type: 'doughnut',
    data: {
      labels: <?= json_encode($statusPesanan['labels']) ?>,
      datasets: [{
        data: <?= json_encode($statusPesanan['data']) ?>,
        backgroundColor: ['#6B7280', '#3B82F6', '#10B981', '#F59E0B', '#FBBF24', '#22C55E', '#EF4444'],
        borderColor: '#fff',
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            color: '#374151',
            font: {
              size: 12,
              weight: '500'
            }
          }
        },
        tooltip: {
          backgroundColor: '#1F2937',
          titleColor: '#F9FAFB',
          bodyColor: '#F9FAFB',
          borderColor: '#9CA3AF',
          borderWidth: 1
        }
      },
      cutout: '60%'
    }
  });
</script>

<style>
  .glow-icon::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 150%;
    height: 150%;
    border-radius: 9999px;
    background-color: currentColor;
    opacity: 0.4;
    animation: pulse-glow 2s ease-in-out infinite;
    z-index: 0;
  }

  @keyframes pulse-glow {

    0%,
    100% {
      transform: translate(-50%, -50%) scale(1);
      opacity: 0.4;
    }

    50% {
      transform: translate(-50%, -50%) scale(1.5);
      opacity: 0;
    }
  }
</style>


<?= $this->endSection() ?>