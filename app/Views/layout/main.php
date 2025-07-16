<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sengkala Graduation' ?></title>

    <!-- Google Fonts: Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        nunito: ['Nunito', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0F172A', // gelap banget (seperti navbar di gambar)
                        secondary: '#EAB308', // warna aksen emas/kekuningan
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body class="bg-white font-nunito">

    <!-- Navbar -->
    <?= view('partials/navbar') ?>

    <!-- Main Content -->
    <main class="pt-16">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <?= view('partials/footer') ?>

</body>

</html>