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
                    <label class="block font-semibold">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input type="text" name="nama" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Asal Universitas <span class="text-red-500">*</span></label>
                    <input type="text" name="universitas" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">WhatsApp <span class="text-red-500">*</span></label>
                    <input type="text" name="whatsapp" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Instagram <span class="text-red-500">*</span></label>
                    <input type="text" name="instagram" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Pilih Paket <span class="text-red-500">*</span></label>
                    <select name="paket" class="w-full border border-gray-300 rounded px-3 py-2" required>
                        <option value="">-- Pilih Paket --</option>
                        <?php foreach ($paketList as $paket): ?>
                            <option value="<?= $paket['id'] ?>">
                                <?= $paket['nama_paket'] ?> - Rp<?= number_format($paket['harga'], 0, ',', '.') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold">Tanggal <span class="text-red-500">*</span></label>
                    <input type="text" name="tanggal" id="tanggal" class="w-full border border-gray-300 rounded px-3 py-2 bg-white" placeholder="Pilih Tanggal" required readonly>
                </div>
                <div>
                    <label class="block font-semibold">Waktu <span class="text-red-500">*</span></label>
                    <input type="time" name="waktu" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Sesi</label>
                    <input type="text" name="sesi" id="sesi" readonly class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100 text-gray-700" placeholder="Akan terisi otomatis" required>
                </div>


                <div>
                    <label class="block font-semibold">Lokasi Pemotretan <span class="text-red-500">*</span></label>
                    <input type="text" name="lokasi" class="w-full border border-gray-300 rounded px-3 py-2" required>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block font-semibold">Pilih Metode Pembayaran <span class="text-red-500">*</span></label>
                        <select name="pembayaran" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-yellow-300 focus:outline-none" required>
                            <option value="">-- Pilih Metode --</option>
                            <option value="SeaBank">SeaBank</option>
                            <option value="DANA">DANA</option>
                        </select>
                        <div id="rekening-info" class="mt-2 text-sm text-gray-700 font-semibold hidden">
                            Nomor Rekening: <span id="no-rekening"></span>
                        </div>

                    </div>

                    <div>
                        <label class="block font-semibold">Jenis Pembayaran <span class="text-red-500">*</span></label>
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
                    <p id="errorPesan" class="text-red-600 text-sm mt-2 hidden">Semua kolom bertanda <span class="font-bold text-red-500">*</span> wajib diisi.</p>
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
                    <div class="flex justify-center items-center gap-2 mb-4">
                        <div id="kodePesanan" class="text-lg font-mono font-semibold text-yellow-600">ORD123456</div>
                        <button onclick="salinID()" class="text-gray-500 hover:text-gray-800">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                    <p id="copySuccess" class="text-sm text-green-600 font-medium hidden">ID berhasil disalin!</p>

                    <a id="btnLacak" href="#" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black px-5 py-2 rounded-full font-semibold">
                        Lacak Pesanan
                    </a>
                </div>
            </div>

        </div>

</section>

<script>
  const selectPembayaran = document.querySelector('select[name="pembayaran"]');
  const rekeningInfo = document.getElementById('rekening-info');
  const noRekening = document.getElementById('no-rekening');

  selectPembayaran.addEventListener('change', function () {
    const selected = this.value;
    if (selected === "SeaBank") {
      rekeningInfo.classList.remove('hidden');
      noRekening.textContent = "901395136295";
    } else if (selected === "DANA") {
      rekeningInfo.classList.remove('hidden');
      noRekening.textContent = "081912662103";
    } else {
      rekeningInfo.classList.add('hidden');
      noRekening.textContent = "";
    }
  });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const waktuInput = document.querySelector('input[name="waktu"]');
        const sesiInput = document.querySelector('input[name="sesi"]');

        waktuInput.addEventListener('change', function() {
            const timeValue = this.value;
            if (!timeValue) return;

            const [hour, minute] = timeValue.split(':').map(Number);
            const totalMinutes = hour * 60 + minute;

            if (totalMinutes <= 720) { // 12:00 in minutes
                sesiInput.value = 'Sesi 1';
            } else {
                sesiInput.value = 'Sesi 2';
            }
        });
    });
</script>


<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
    function submitPesanan() {
        const form = document.querySelector("form");
        const requiredFields = form.querySelectorAll("[required]");
        let valid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add("border-red-500");
                valid = false;
            } else {
                field.classList.remove("border-red-500");
            }
        });

        if (valid) {
            form.submit();
        } else {
            alert("Harap lengkapi semua kolom bertanda bintang merah (*) sebelum mengirim.");
        }
    }
</script>

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
                    star.style.color = "#FFD700"; // gold
                    star.style.textShadow = "0 0 3px rgba(0,0,0,0.8)";
                    star.title = "Tanggal penuh (sesi 1 & 2)";
                    dayElem.appendChild(star);
                    dayElem.classList.add("flatpickr-disabled");
                }
            }
        });

        const orderId = "<?= $orderId ?? '' ?>";
        if (orderId !== '') {
            document.getElementById("kodePesanan").textContent = orderId;
            document.getElementById("btnLacak").href = "/cek_detail/" + orderId;
            document.getElementById("modalSukses").classList.remove("hidden");
            document.getElementById("modalSukses").classList.add("flex");
        }
    });

    function submitPesanan() {
        const form = document.querySelector("form");
        const requiredFields = form.querySelectorAll("[required]");
        let valid = true;

        requiredFields.forEach(field => {
            if ((field.type === "radio" && !form.querySelector(`input[name="${field.name}"]:checked`)) ||
                (field.type !== "radio" && !field.value.trim())) {
                field.classList.add("border-red-500");
                valid = false;
            } else {
                field.classList.remove("border-red-500");
            }
        });

        const errorPesan = document.getElementById("errorPesan");

        if (valid) {
            errorPesan.classList.add("hidden");
            form.submit();
        } else {
            errorPesan.classList.remove("hidden");
            window.scrollTo({
                top: form.offsetTop - 50,
                behavior: 'smooth'
            });
        }
    }

    function tutupModal() {
        document.getElementById("modalSukses").classList.remove("flex");
        document.getElementById("modalSukses").classList.add("hidden");
    }

    function salinID() {
        const kode = document.getElementById("kodePesanan").textContent;
        navigator.clipboard.writeText(kode).then(function() {
            const info = document.getElementById("copySuccess");
            info.classList.remove("hidden");
            setTimeout(() => info.classList.add("hidden"), 2000);
        });
    }
</script>


<!-- <script>
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

        // Cek apakah dari flashdata ada order_id (berarti pesanan baru saja disimpan)
        const orderId = "<?= $orderId ?? '' ?>";
        if (orderId !== '') {
            document.getElementById("kodePesanan").textContent = orderId;
            document.getElementById("btnLacak").href = "/cek_detail/" + orderId;
            document.getElementById("modalSukses").classList.remove("hidden");
            document.getElementById("modalSukses").classList.add("flex");
        }
    });

    function submitPesanan() {
        // Ganti dari manual ID random ke kirim data ke server
        document.querySelector("form").submit();
    }

    function tutupModal() {
        document.getElementById("modalSukses").classList.remove("flex");
        document.getElementById("modalSukses").classList.add("hidden");
    }

    function salinID() {
        const kode = document.getElementById("kodePesanan").textContent;
        navigator.clipboard.writeText(kode).then(function() {
            const info = document.getElementById("copySuccess");
            info.classList.remove("hidden");
            setTimeout(() => info.classList.add("hidden"), 2000);
        });
    }
</script> -->



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

<?= $this->endSection() ?>