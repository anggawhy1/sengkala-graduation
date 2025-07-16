<?= $this->extend('layout/main2') ?>
<?= $this->section('content') ?>
<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<div class="p-6 space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-700">Jadwal & Slot</h2>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-4 text-sm">
        <form action="/admin/jadwal" method="get" class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <label for="tanggal" class="font-semibold">Pilih Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" value="<?= $_GET['tanggal'] ?? '' ?>" class="border border-gray-300 rounded px-2 py-1">
                <button type="submit" class="bg-black text-white px-4 py-1 rounded hover:bg-gray-800">Lihat</button>
            </div>
        </form>

        <form action="/admin/jadwal/perbarui" method="post">
            <input type="hidden" name="tanggal" value="<?= $_GET['tanggal'] ?? date('Y-m-d') ?>">
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Sesi</th>
                            <th class="border p-2">Fotografer</th>
                            <th class="border p-2">Jam</th>
                            <th class="border p-2">Klien</th>
                            <th class="border p-2">Universitas</th>
                            <th class="border p-2">Lokasi</th>
                            <th class="border p-2">Tanggal Foto</th>
                            <th class="border p-2">Instagram</th>
                            <th class="border p-2">Kontak</th>
                            <th class="border p-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($jadwal)): ?>
                            <tr>
                                <td colspan="11" class="text-center py-4 text-gray-500 italic">
                                    Belum ada data jadwal pada tanggal ini.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($jadwal as $index => $j): ?>
                                <tr class="border-t">
                                    <td class="border p-2 text-center"><?= $index + 1 ?></td>
                                    <td class="border p-2">
                                        <?= $j['sesi'] ?>
                                        <input type="hidden" name="jadwal[<?= $index ?>][id]" value="<?= $j['id'] ?>">
                                        <input type="hidden" name="jadwal[<?= $index ?>][jam]" value="<?= $j['jam'] ?>">
                                        <input type="hidden" id="kontak-klien-<?= $index ?>" value="<?= $j['kontak_klien'] ?>">
                                    </td>
                                    <td class="border p-2">
                                        <select name="jadwal[<?= $index ?>][fotografer_id]" class="border rounded w-full px-1" onchange="setKontak(this, <?= $index ?>)">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($fotograferList as $f): ?>
                                                <option value="<?= $f['id'] ?>" <?= $f['id'] == $j['fotografer_id'] ? 'selected' : '' ?>><?= $f['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td class="border p-2" id="jam-<?= $index ?>"><?= $j['jam'] ?></td>
                                    <td class="border p-2" id="klien-<?= $index ?>"><?= $j['klien'] ?></td>
                                    <td class="border p-2" id="universitas-<?= $index ?>"><?= $j['asal_universitas'] ?></td>
                                    <td class="border p-2" id="lokasi-<?= $index ?>"><?= $j['lokasi'] ?></td>
                                    <td class="border p-2" id="tanggal-<?= $index ?>"><?= date('l, d F Y', strtotime($j['tanggal'])) ?></td>
                                    <td class="border p-2" id="instagram-<?= $index ?>"><?= $j['instagram'] ?></td>
                                    <td class="border p-2">
                                        <span id="kontak-<?= $index ?>"><?= $j['kontak_fotografer'] ?></span>
                                    </td>
                                    <td class="border p-2 text-center">
                                        <a href="#" target="_blank" id="wa-link-<?= $index ?>" class="wa-btn bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 text-xs <?= $j['kontak_fotografer'] ? '' : 'hidden' ?>">Kirim</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <button type="submit" class="bg-black text-white px-5 py-2 rounded hover:bg-gray-800">Perbarui</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selects = document.querySelectorAll("select[name^='jadwal']");
        selects.forEach((select, index) => {
            if (select.value !== '') {
                setKontak(select, index);
            }
        });
    });

    const fotograferData = <?= json_encode($fotograferList) ?>;

    function setKontak(select, index) {
        const selectedId = select.value;
        const fotografer = fotograferData.find(f => f.id == selectedId);
        const kontak = fotografer ? fotografer.whatsapp : '';
        const namaFotografer = fotografer ? fotografer.nama : '';

        const jam = document.getElementById('jam-' + index)?.textContent || '';
        const klien = document.getElementById('klien-' + index)?.textContent || '';
        const universitas = document.getElementById('universitas-' + index)?.textContent || '';
        const lokasi = document.getElementById('lokasi-' + index)?.textContent || '';
        const tanggal = document.getElementById('tanggal-' + index)?.textContent || '';
        const instagram = document.getElementById('instagram-' + index)?.textContent || '';
        const kontakKlien = document.getElementById('kontak-klien-' + index)?.value || '';

        document.getElementById('kontak-' + index).textContent = kontak;

        if (kontak) {
            const pesan = encodeURIComponent(
                `Freelance by ${namaFotografer}\n\n` +
                `Nama : ${klien}\n` +
                `Universitas : ${universitas}\n` +
                `Hari/Tanggal : ${tanggal}\n` +
                `Lokasi foto : ${lokasi}\n` +
                `Jam foto : ${jam}\n` +
                `Paket : -\n` +
                `Instagram : ${instagram}\n` +
                `No. whatsapp : ${kontakKlien}\n\n` +
                `Shoot List & SOP : https://drive.google.com/file/d/1CNqTsQUYJQSmCT27UXUlzqXNQnhqTHJb/view?usp=drive_link\n` +
                `➖➖➖➖➖➖➖➖➖➖\n\n` +
                `Mohon untuk menghubungi client di nomor yang tertera diatas yaa, selambat-lambatnya H-1 pukul 21.00 WIB.`
            );

            const waLink = `https://wa.me/${kontak}?text=${pesan}`;
            const waBtn = document.getElementById('wa-link-' + index);
            if (waBtn) {
                waBtn.href = waLink;
                waBtn.classList.remove('hidden');
            }
        }
    }
</script>

<?= $this->endSection() ?>
