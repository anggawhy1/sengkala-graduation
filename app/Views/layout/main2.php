<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

  <title>Admin Dashboard</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Font & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen">

  <!-- Sidebar (Fixed) -->
  <?= $this->include('partials/sidebar') ?>

  <!-- Header atas (Fixed) -->
  <?= $this->include('partials/header') ?>

  <!-- Main Content (offset dari sidebar dan header) -->
  <main class="ml-64 mt-6 p-6 overflow-y-auto">
    <?= $this->renderSection('content') ?>
  </main>

</body>

</html>