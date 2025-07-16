<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice #<?= $id ?></title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td,
        th {
            padding: 6px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .section-title {
            font-weight: bold;
            background: #eee;
        }

        .no-border td {
            border: none;
        }
    </style>
</head>

<body>
    <h2>INVOICE PEMESANAN</h2>

    <table>
        <tr class="section-title">
            <td colspan="2">Info Pemesan</td>
        </tr>
        <tr>
            <td>Nama Pemesan</td>
            <td><?= $nama ?></td>
        </tr>
        <tr>
            <td>ID Pemesanan</td>
            <td><?= $id ?></td>
        </tr>
        <tr>
            <td>Paket</td>
            <td><?= $paket ?></td>
        </tr>
        <tr>
            <td>Tanggal Pemesanan</td>
            <td><?= $tgl_pesan ?></td>
        </tr>
        <tr>
            <td>Tanggal Sesi Foto</td>
            <td><?= $tgl_sesi ?></td>
        </tr>
        <tr>
            <td>Lokasi Sesi</td>
            <td><?= $lokasi ?></td>
        </tr>
    </table>

    <br>

    <table>
        <tr class="section-title">
            <td colspan="2">Info Pembayaran</td>
        </tr>
        <tr>
            <td>Metode Pembayaran</td>
            <td><?= $metode ?></td>
        </tr>
        <tr>
            <td>Nomor Rekening</td>
            <td>
                <?php if ($metode === 'SeaBank'): ?>
                    901395136295
                <?php elseif ($metode === 'DANA'): ?>
                    081912662103
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Jenis Pembayaran</td>
            <td><?= $jenis_pembayaran ?></td>
        </tr>
        <tr>
            <td>Status Pembayaran</td>
            <td><?= $status_bayar ?></td>
        </tr>
        <tr>
            <td>Total Tagihan</td>
            <td>Rp. <?= number_format($total_tagihan, 0, ',', '.') ?></td>
        </tr>


        <?php if ($jenis_pembayaran === 'DP'): ?>
            <tr>
                <td>DP Dibayar</td>
                <td>Rp. <?= number_format($dp_dibayar, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td>Sisa Tagihan</td>
                <td>Rp. <?= number_format($sisa_tagihan, 0, ',', '.') ?></td>
            </tr>
        <?php endif; ?>

        <tr>
            <td>Link Galeri Drive</td>
            <td>
                <?php if ($link_drive && $link_drive !== '-'): ?>
                    <a href="<?= $link_drive ?>" target="_blank"><?= $link_drive ?></a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <br><br>
    <p style="text-align:center;">Terima kasih atas kepercayaan Anda menggunakan layanan kami.</p>
</body>

</html>