<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-something" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<aside class="fixed top-0 left-0 bg-[#3B3A32] text-white w-64 h-screen px-6 py-8 flex flex-col justify-between z-40">

    <div>
        <div class="mb-8 flex justify-center">
            <img src="/images/logo_putih.png" alt="Sengkala Graduation" class="h-12">
        </div>


        <nav class="space-y-4">
            <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F] {{ request()->is('admin/dashboard') ? 'bg-black' : '' }}">
                <i class="fas fa-home"></i> <span>DASHBOARD</span>
            </a>
            <!-- OPM Menu with Dropdown -->
            <div class="space-y-1">
                <button
                    onclick="toggleDropdown('opmDropdown', 'opmIcon')"
                    class="w-full flex items-center justify-between px-4 py-2 rounded hover:bg-[#4A493F] focus:outline-none">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-briefcase"></i> <span>OPM</span>
                    </div>
                    <i id="opmIcon" class="fas fa-chevron-right transition-transform duration-200"></i>
                </button>

                <div id="opmDropdown" class="hidden pl-10 space-y-1">
                    <a href="/admin/opm/pesanan" class="block px-2 py-1 rounded hover:bg-[#4A493F] text-sm">
                        <i class="fas fa-file-alt mr-2"></i> Pesanan Baru
                    </a>
                    <a href="/admin/opm/pembayaran" class="block px-2 py-1 rounded hover:bg-[#4A493F] text-sm">
                        <i class="fas fa-credit-card mr-2"></i> Pembayaran
                    </a>
                    <a href="/admin/opm/pesanan-aktif" class="block px-2 py-1 rounded hover:bg-[#4A493F] text-sm">
                        <i class="fas fa-tasks mr-2"></i> Pesanan Aktif
                    </a>
                    <a href="/admin/opm/riwayat" class="block px-2 py-1 rounded hover:bg-[#4A493F] text-sm">
                        <i class="fas fa-history mr-2"></i> Riwayat Pesanan
                    </a>

                </div>

            </div>
            <!-- <a href="/admin/pesanan" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-clipboard-list"></i> <span>PESANAN</span>
            </a> -->
            <a href="/admin/fotografer" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-camera-retro"></i> <span>FOTOGRAFER</span>
            </a>
            <a href="/admin/jadwal" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-calendar-alt"></i> <span>JADWAL & SLOT</span>
            </a>
            <!-- <a href="/admin/galeri" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-images"></i> <span>GALERI & KATALOG</span>
            </a> -->
            <!-- <a href="/admin/pembayaran" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-money-bill-wave"></i> <span>PEMBAYARAN</span>
            </a> -->
            <!-- <a href="/admin/laporan" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-chart-line"></i> <span>LAPORAN</span>
            </a> -->
            <!-- <a href="/admin/pesan-masuk" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-envelope"></i> <span>PESAN MASUK</span>
            </a> -->
            <!-- <a href="/admin/pengaturan" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-cogs"></i> <span>PENGATURAN</span>
            </a> -->
            <button onclick="openLogoutModal()"
                class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#4A493F]">
                <i class="fas fa-sign-out-alt"></i> <span>KELUAR</span>
            </button>


        </nav>
        <div id="logoutModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-40 flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm text-center relative animate-scale-up">
                <div class="flex justify-center mb-4">
                    <svg class="w-20 h-20" viewBox="0 0 52 52">
                        <!-- Lingkaran -->
                        <circle class="circle" cx="26" cy="26" r="25" fill="none" stroke="#10B981" stroke-width="3" />
                        <!-- Centang -->
                        <path class="check" fill="none" stroke="#10B981" stroke-width="3" d="M14 27 l7 7 l17 -17" />
                    </svg>
                </div>
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Yakin ingin keluar?</h2>
                <p class="text-sm text-gray-500 mb-6">Kamu akan keluar dari dashboard.</p>

                <div class="flex justify-center gap-3">
                    <a href="/logout" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">Ya, Keluar</a>
                    <button onclick="closeLogoutModal()" class="border border-gray-300 text-gray-800 hover:bg-gray-100 px-4 py-2 rounded transition">Batal</button>
                </div>
            </div>
        </div>
        <style>
            .circle {
                stroke-dasharray: 157;
                stroke-dashoffset: 157;
                animation: drawCircle 1s ease-out forwards;
            }

            .check {
                stroke-dasharray: 36;
                stroke-dashoffset: 36;
                animation: drawCheck 0.5s ease-out forwards;
                animation-delay: 1s;
            }

            @keyframes drawCircle {
                to {
                    stroke-dashoffset: 0;
                }
            }

            @keyframes drawCheck {
                to {
                    stroke-dashoffset: 0;
                }
            }

            @keyframes scale-up {
                0% {
                    transform: scale(0.7);
                    opacity: 0;
                }

                100% {
                    transform: scale(1);
                    opacity: 1;
                }
            }

            .animate-scale-up {
                animation: scale-up 0.3s ease-out forwards;
            }
        </style>
        <script>
            function openLogoutModal() {
                const modal = document.getElementById('logoutModal');
                modal.classList.remove('hidden');

                // Restart animasi centang
                const circle = modal.querySelector('.circle');
                const check = modal.querySelector('.check');
                circle.style.animation = 'none';
                check.style.animation = 'none';
                // Paksa reflow supaya animasi bisa diputar ulang
                void circle.offsetWidth;
                void check.offsetWidth;
                circle.style.animation = 'drawCircle 1s ease-out forwards';
                check.style.animation = 'drawCheck 0.5s ease-out forwards';
                check.style.animationDelay = '1s';
            }

            function closeLogoutModal() {
                document.getElementById('logoutModal').classList.add('hidden');
            }
        </script>

        <!-- Tambahkan di akhir halaman sebelum </body> -->
        <script>
            function toggleDropdown(menuId, iconId) {
                const menu = document.getElementById(menuId);
                const icon = document.getElementById(iconId);

                const isOpen = !menu.classList.contains('hidden');
                menu.classList.toggle('hidden');

                // putar panah
                icon.classList.toggle('rotate-90', !isOpen);
            }
        </script>
    </div>
</aside>