<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>

<div class="p-6 space-y-6">
  <!-- Header -->
  <div class="flex justify-between items-start">
    <div>
      <h1 class="text-xl font-semibold">“SELAMAT DATANG, ADMIN!”</h1>
      <!-- <p class="text-sm text-gray-500">Statistik Operasional Harian</p> -->
    </div>
  </div>

  <!-- Statistik Box -->
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-6">
    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-md border border-gray-200">
      <div class="flex items-center justify-between mb-2">
        <h4 class="text-sm text-gray-600">Pesanan Hari Ini</h4>
        <i class="fas fa-calendar-day text-blue-500"></i>
      </div>
      <p class="text-2xl font-semibold text-gray-800"><?= $statistik['pesananHariIni'] ?></p>
      <p class="text-xs text-gray-500 mt-1">Slot Tersedia: <span class="font-medium"><?= $statistik['slotTersedia'] ?></span></p>
      <p class="text-xs text-gray-500">Fotografer Bertugas: <span class="font-medium"><?= $statistik['fotograferBertugas'] ?></span></p>
      <p class="text-xs text-gray-500">Menunggu Konfirmasi: <span class="font-medium text-yellow-600"><?= $statistik['menungguKonfirmasi'] ?></span></p>
    </div>

    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-md border border-gray-200">
      <div class="flex items-center justify-between mb-2">
        <h4 class="text-sm text-gray-600">Pembayaran Masuk</h4>
        <i class="fas fa-wallet text-green-600"></i>
      </div>
      <h2 class="text-2xl font-bold text-green-700">Rp <?= number_format($statistik['pembayaranMasuk'], 0, ',', '.') ?>,-</h2>
      <p class="text-xs text-gray-500 mt-1">Update terakhir: <?= esc($statistik['updateTerakhir']) ?></p>
    </div>
  </div>

  <!-- Aktivitas Terbaru -->
  <div class="bg-white/80 backdrop-blur-sm p-6 shadow-md rounded-lg border border-gray-200 mb-6">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-800">Aktivitas Terbaru</h3>
      <a href="#" class="text-blue-600 text-sm hover:underline">Lihat Selengkapnya</a>
    </div>
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto text-sm text-left">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="py-3 px-4 border-b">ID Pesanan</th>
            <th class="py-3 px-4 border-b">Nama Klien</th>
            <th class="py-3 px-4 border-b">Jam Masuk</th>
            <th class="py-3 px-4 border-b">Status</th>
            <th class="py-3 px-4 border-b">Aksi</th> <!-- Tambahan kolom -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($aktivitasTerbaru as $a): ?>
            <tr class="hover:bg-gray-50 transition">
              <td class="py-2 px-4 border-b"><?= esc($a['id']) ?></td>
              <td class="py-2 px-4 border-b"><?= esc($a['klien']) ?></td>
              <td class="py-2 px-4 border-b"><?= esc($a['jam']) ?></td>
              <td class="py-2 px-4 border-b">
                <span class="<?= $a['status'] === 'Menunggu Konfirmasi' ? 'text-yellow-600 font-medium' : 'text-green-600 font-medium' ?>">
                  <?= esc($a['status']) ?: '-' ?>
                </span>
              </td>
              <td class="py-2 px-4 border-b">
                <a href="#" class="text-green-600 hover:underline">Lihat Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>


  <!-- Jadwal Pemotretan Hari Ini -->
  <div class="bg-white/80 backdrop-blur-sm p-6 shadow-md rounded-lg border border-gray-200">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-lg font-semibold text-gray-800">Jadwal Pemotretan Hari Ini</h3>
      <a href="#" class="text-blue-600 text-sm hover:underline">Lihat Selengkapnya</a>
    </div>
    <div class="overflow-x-auto">
      <table class="min-w-full table-auto text-sm text-left">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="py-3 px-4 border-b">Jam</th>
            <th class="py-3 px-4 border-b">Fotografer</th>
            <th class="py-3 px-4 border-b">Nama Klien</th>
            <th class="py-3 px-4 border-b">Aksi</th> <!-- Kolom Aksi -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($jadwalHariIni as $j): ?>
            <tr class="hover:bg-gray-50 transition">
              <td class="py-2 px-4 border-b"><?= esc($j['jam']) ?></td>
              <td class="py-2 px-4 border-b"><?= esc($j['fotografer']) ?></td>
              <td class="py-2 px-4 border-b"><?= esc($j['klien']) ?></td>
              <td class="py-2 px-4 border-b">
                <a href="#" class="text-green-600 hover:underline">Lihat Detail</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>




  <!-- Grafik Statistik Pesanan -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Grafik Batang -->
    <div class="bg-white rounded-lg shadow border p-5 flex flex-col">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Total Pesanan 7 Hari Terakhir</h3>
      <div class="relative flex-1">
        <canvas id="barChart" class="w-full h-full"></canvas>
      </div>
    </div>

    <!-- Diagram Lingkaran -->
    <div class="bg-white rounded-lg shadow border p-5 flex flex-col items-center justify-center">
      <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Status Pesanan Saat Ini</h3>
      <div class="relative w-[220px] h-[220px]">
        <canvas id="pieChart"></canvas>
      </div>
    </div>

  </div>

  <!-- Chart.js Script -->
  <script>
    const barCtx = document.getElementById('barChart').getContext('2d');
    const pieCtx = document.getElementById('pieChart').getContext('2d');

    // Bar Chart
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
              },
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

    // Pie Chart
    const pieChart = new Chart(pieCtx, {
      type: 'doughnut',
      data: {
        labels: <?= json_encode($statusPesanan['labels']) ?>,
        datasets: [{
          data: <?= json_encode($statusPesanan['data']) ?>,
          backgroundColor: ['#10B981', '#3B82F6', '#EF4444'],
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


</div>

<?= $this->endSection() ?>