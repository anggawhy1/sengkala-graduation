<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<section class="relative bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('images/hero1.png');">
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black bg-opacity-60 backdrop-blur-sm"></div>

  <!-- Login Card -->
  <div class="relative z-10 bg-white/80 backdrop-blur-lg rounded-2xl p-10 w-[90%] max-w-md shadow-xl border border-white/30 text-gray-800 space-y-6">
    <div class="text-center">
      <h1 class="text-3xl font-bold tracking-wide text-gray-900 mb-1">Login Admin</h1>
      <p class="text-sm text-gray-600">Halaman ini hanya dapat diakses oleh admin</p>
    </div>

    <!-- Flash Message -->
    <?php if (session()->getFlashdata('error')) : ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded text-sm">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('login/proses') ?>" method="POST" class="space-y-4">
      <!-- Username -->
      <div class="relative">
        <input
          name="username"
          type="text"
          placeholder="Username"
          required
          class="w-full px-10 py-3 rounded-lg bg-white text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-inner" />
        <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"></i>
      </div>

      <!-- Password -->
      <div class="relative">
        <input
          name="password"
          id="password"
          type="password"
          placeholder="Password"
          required
          class="w-full px-10 py-3 rounded-lg bg-white text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-yellow-400 shadow-inner" />
        <i class="fas fa-lock absolute left-3 top-1/2 -translate-y-1/2 text-gray-500"></i>
        <button type="button" id="togglePassword" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 focus:outline-none">
          <i class="fas fa-eye" id="eyeIcon"></i>
        </button>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold py-3 rounded-lg transition duration-300 shadow-md">
        Masuk
      </button>
    </form>
  </div>
</section>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Toggle Password -->
<script>
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  const eyeIcon = document.getElementById('eyeIcon');

  togglePassword.addEventListener('click', () => {
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';
    eyeIcon.classList.toggle('fa-eye');
    eyeIcon.classList.toggle('fa-eye-slash');
  });
</script>

<?= $this->endSection() ?>
