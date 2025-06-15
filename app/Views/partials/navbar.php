<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<!-- Navbar -->
<nav class="bg-[#4e4a3f] fixed top-0 left-0 w-full z-50 shadow-md border-b border-gray-700">
  <div class="container mx-auto px-6 py-4 flex justify-between items-center">
    <!-- Logo -->
    <a href="index.php" class="text-white font-bold text-xl flex items-center space-x-2">
      <i class="fas fa-camera-retro text-yellow-400"></i>
      <span>Sengkala Graduation</span>
    </a>

    <!-- Desktop Menu -->
    <ul class="hidden md:flex space-x-8 text-sm font-semibold text-white items-center">
      <li><a href="welcome_message" class="hover:text-yellow-400 transition">Beranda</a></li>
      <li><a href="galeri" class="hover:text-yellow-400 transition">Galeri</a></li>
      <li><a href="katalog" class="hover:text-yellow-400 transition">Katalog</a></li>
      <li><a href="tentang" class="hover:text-yellow-400 transition">Tentang</a></li>
      <li><a href="cek" class="hover:text-yellow-400 transition">Cek Pesanan</a></li>
      <li><a href="hubungi" class="hover:text-yellow-400 transition">Hubungi</a></li>
      <li>
        <a href="login" class="border border-yellow-400 text-yellow-400 px-4 py-2 rounded-full hover:bg-yellow-400 hover:text-[#4e4a3f] transition">
          Login
        </a>
      </li>
    </ul>

    <!-- Mobile Button -->
    <button id="menuToggle" class="md:hidden text-white focus:outline-none">
      <i class="fas fa-bars text-2xl"></i>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="navMenu"
    class="fixed top-0 right-[-100%] w-64 h-full bg-[#4e4a3f] text-white shadow-md transition-all duration-300 ease-in-out z-50 md:hidden">
    <div class="flex justify-between items-center px-6 py-4 border-b border-gray-600">
      <span class="font-bold text-white text-lg">Menu</span>
      <button id="closeMenu" class="text-white">
        <i class="fas fa-times text-xl"></i>
      </button>
    </div>
    <ul class="flex flex-col text-sm font-semibold text-white mt-4 space-y-2 px-6">
      <li><a href="welcome_message" class="block py-2 hover:text-yellow-400">Beranda</a></li>
      <li><a href="galeri" class="block py-2 hover:text-yellow-400">Galeri</a></li>
      <li><a href="katalog" class="block py-2 hover:text-yellow-400">Katalog</a></li>
      <li><a href="tentang" class="block py-2 hover:text-yellow-400">Tentang</a></li>
      <li><a href="hubungi" class="block py-2 hover:text-yellow-400">Hubungi Kami</a></li>
      <li>
        <a href="login" class="block py-2 text-[#4e4a3f] bg-yellow-400 rounded-full text-center mt-2 hover:bg-yellow-300 transition">
          Login
        </a>
      </li>
    </ul>
  </div>
</nav>

<!-- Script Toggle Mobile Menu -->
<script>
  const menuToggle = document.getElementById('menuToggle');
  const navMenu = document.getElementById('navMenu');
  const closeMenu = document.getElementById('closeMenu');

  menuToggle.addEventListener('click', () => {
    navMenu.style.right = '0';
  });

  closeMenu.addEventListener('click', () => {
    navMenu.style.right = '-100%';
  });
</script>