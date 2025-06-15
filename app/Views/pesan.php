<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative h-[400px] bg-cover bg-center flex items-center justify-center text-white text-center" style="background-image: url('/images/hero1.png');">
    <div class="bg-black bg-opacity-50 w-full h-full absolute top-0 left-0 z-0"></div>
    <div class="z-10 px-4">
        <h1 class="text-4xl font-bold">Pesan Sesi Fotomu<br>di <span class="text-yellow-400">Sengkala</span> Sekarang !</h1>
    </div>
</section>

<!-- Form Section -->
<section class="py-12" style="background-color: #3B3A32;">
    <div class="max-w-5xl mx-auto flex flex-col md:flex-row gap-6 px-4">
        <!-- Form -->
        <div class="bg-white p-6 rounded-xl shadow-md flex-1">
            <h2 class="text-xl font-semibold mb-4 text-center">Isi form di bawah, kami akan segera menghubungi kamu untuk konfirmasi dan penjadwalan</h2>

            <form action="<?= base_url('/pesan/simpan') ?>" method="POST" class="space-y-4">
                <div>
                    <label class="block font-semibold">Nama Lengkap*</label>
                    <input type="text" name="nama" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Asal Universitas*</label>
                    <input type="text" name="universitas" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">WhatsApp*</label>
                    <input type="text" name="whatsapp" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Instagram*</label>
                    <input type="text" name="instagram" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Pilih Paket*</label>
                    <select name="paket" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Pilih Paket --</option>
                        <option value="Basic">Basic</option>
                        <option value="Premium">Premium</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold">Tanggal*</label>
                    <input type="text" name="tanggal" id="tanggal" class="w-full border border-gray-300 rounded px-3 py-2 bg-white" placeholder="Pilih Tanggal" required readonly>
                </div>
                <div>
                    <label class="block font-semibold">Waktu*</label>
                    <input type="time" name="waktu" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Lokasi Pemotretan*</label>
                    <input type="text" name="lokasi" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div class="space-y-4">
                    <!-- Pilih Bank / E-Wallet -->
                    <div>
                        <label class="block font-semibold">Pilih Metode Pembayaran*</label>
                        <select name="pembayaran" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-yellow-300 focus:outline-none" required>
                            <option value="">-- Pilih Metode --</option>
                            <option value="BRI">BRI</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BNI">BNI</option>
                            <option value="SeaBank">SeaBank</option>
                            <option value="DANA">DANA</option>
                            <option value="ShopeePay">ShopeePay</option>
                            <option value="GoPay">GoPay</option>
                        </select>
                    </div>

                    <!-- Pilih Jenis Pembayaran -->
                    <div>
                        <label class="block font-semibold">Jenis Pembayaran*</label>
                        <div class="flex items-center gap-6 mt-2">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="jenis_pembayaran" value="DP" required class="accent-yellow-500" />
                                <span>DP</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="jenis_pembayaran" value="Lunas" required class="accent-yellow-500" />
                                <span>Lunas</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold">Keterangan Tambahan</label>
                    <textarea name="keterangan" class="w-full border border-gray-300 rounded px-3 py-2" rows="3" placeholder="Opsional"></textarea>
                </div>

                <div class="text-center pt-4">
                    <button type="button" onclick="submitPesanan()" class="bg-gray-800 hover:bg-black text-white px-6 py-2 rounded-full transition duration-300">
                        BUAT PESANAN
                    </button>
                </div>

            </form>
        </div>

        <!-- Kalender Preview -->
        <div class="bg-white p-6 rounded-xl shadow-md w-full md:w-[300px]">
            <h3 class="text-lg font-bold mb-2 text-center text-gray-800">Kalender Pemesanan</h3>
            <p class="text-sm text-gray-600 text-center mb-4">Lihat ketersediaan tanggal pemotretan kamu di bawah ini.</p>

            <!-- Kalender dari Flatpickr -->
            <div id="kalender-preview" class="mb-4"></div>

            <!-- Info Tanggal Penuh -->
            <div class="bg-gray-50 p-3 rounded text-sm text-gray-700 mb-3">
                <p class="font-medium mb-1">Keterangan:</p>
                <ul class="list-disc list-inside">
                    <li><span class="text-yellow-500">⭐</span> Tanggal bertanda bintang sudah penuh</li>
                    <li>Silakan pilih tanggal yang tersedia</li>
                </ul>
            </div>

            <!-- Info Tambahan -->
            <div class="bg-gray-50 p-3 rounded text-sm text-gray-700">
                <p class="font-medium mb-1">Tips Pemesanan:</p>
                <ul class="list-disc list-inside">
                    <li>Lakukan pemesanan minimal H-3</li>
                    <li>Konfirmasi melalui WhatsApp setelah submit</li>
                    <li>Pastikan semua data benar sebelum mengirim</li>
                </ul>
            </div>

            <!-- Modal Konfirmasi Pesanan -->
            <div id="modalSukses" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden items-center justify-center">
                <div class="bg-white rounded-xl max-w-md w-[90%] p-6 text-center shadow-lg relative animate-bounceIn">
                    <button onclick="tutupModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-2xl font-bold">&times;</button>
                    <div class="text-green-500 text-4xl mb-3">✔️</div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Pesanan Berhasil!</h3>
                    <p class="text-sm text-gray-700 mb-4">ID Pesanan kamu:</p>
                    <div id="kodePesanan" class="text-lg font-mono font-semibold text-yellow-600 mb-4">ORD123456</div>
                    <a id="btnLacak" href="#" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black px-5 py-2 rounded-full font-semibold">
                        Lacak Pesanan
                    </a>
                </div>
            </div>

        </div>

</section>

<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const jadwalPenuh = <?= json_encode($jadwalPenuh); ?>;

        flatpickr("#tanggal", {
            dateFormat: "Y-m-d",
            disable: jadwalPenuh,
            enable: [
                function(date) {
                    return date >= new Date();
                }
            ],
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                const date = dayElem.dateObj.toISOString().split('T')[0];
                if (jadwalPenuh.includes(date)) {
                    const star = document.createElement("span");
                    star.innerHTML = "⭐";
                    star.style.position = "absolute";
                    star.style.bottom = "2px";
                    star.style.right = "2px";
                    star.style.fontSize = "14px";
                    star.style.color = "#FFD700"; // gold/yellow
                    star.style.textShadow = "0 0 3px rgba(0,0,0,0.8)";
                    star.title = "Tanggal penuh";
                    dayElem.appendChild(star);
                    dayElem.classList.add("flatpickr-disabled");
                }
            }

        });
    });
</script>

<style>
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.9) translateY(20px);
        }

        100% {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .animate-bounceIn {
        animation: bounceIn 0.4s ease-out;
    }
</style>

<script>
    function submitPesanan() {
        const randomId = 'ORD' + Date.now();
        document.getElementById("kodePesanan").textContent = randomId;
        document.getElementById("btnLacak").href = "/cek_detail/" + randomId;
        document.getElementById("modalSukses").classList.remove("hidden");
        document.getElementById("modalSukses").classList.add("flex");
    }

    function tutupModal() {
        document.getElementById("modalSukses").classList.remove("flex");
        document.getElementById("modalSukses").classList.add("hidden");
    }
</script>

<?= $this->endSection() ?>