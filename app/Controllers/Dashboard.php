<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\PembayaranModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pesananModel = new PesananModel();

        // Jumlah pesanan hari ini
        $statistik['pesananHariIni'] = $pesananModel->getPesananHariIni();
        $statistik['menungguKonfirmasi'] = $pesananModel->getMenungguKonfirmasiHariIni(); // tambahkan ini

        // Statistik tambahan
        $pembayaranModel = new PembayaranModel();

        // Total Pembayaran Masuk
        $statistik['totalPembayaranMasuk'] = $pembayaranModel
            ->where('status_pembayaran', 'Lunas')
            ->selectSum('total_tagihan')
            ->first()['total_tagihan'] ?? 0;

        // Total Pesanan Selesai (yang sudah ada link_drive-nya)
        $statistik['totalPesananSelesai'] = $pesananModel
            ->where('link_drive IS NOT NULL', null, false)
            ->countAllResults();

        $statistik['totalPesananBulanIni'] = $pesananModel
            ->where('MONTH(tanggal_pesan)', date('m'))
            ->where('YEAR(tanggal_pesan)', date('Y'))
            ->countAllResults();

        // Aktivitas terbaru: hanya "Menunggu Konfirmasi", maksimal 10
        $aktivitasTerbaruRaw = $pesananModel
            ->where('status_pesanan', 'Menunggu Konfirmasi')
            ->orderBy('tanggal_pesan', 'DESC')
            ->findAll(10);

        $aktivitasTerbaru = [];
        foreach ($aktivitasTerbaruRaw as $row) {
            $aktivitasTerbaru[] = [
                'id' => $row['id'],
                'klien' => $row['nama_lengkap'],
                'jam' => date('H:i:s', strtotime($row['tanggal_pesan'])),
                'status' => $row['status_pesanan']
            ];
        }

        // Grafik pesanan 7 hari terakhir
        $grafikData = $pesananModel->getStatistik7Hari();
        $labels = [];
        $data = [];

        // Inisialisasi tanggal 7 hari
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = date('Y-m-d', strtotime("-$i days"));
            $labels[] = date('d M', strtotime($tanggal));
            $data[$tanggal] = 0;
        }

        // Gabungkan data hasil query
        foreach ($grafikData as $row) {
            $data[$row['tanggal']] = $row['jumlah'];
        }

        $grafikPesanan = [
            'labels' => array_values($labels),
            'data' => array_values($data)
        ];

        // Status pesanan (pie chart)
        $statusData = $pesananModel->getStatusPesanan();
        $statusPesanan = [
            'labels' => [],
            'data' => []
        ];
        foreach ($statusData as $s) {
            $statusPesanan['labels'][] = $s['status_pesanan'];
            $statusPesanan['data'][] = $s['jumlah'];
        }

        return view('/admin/dashboard', [
            'statistik' => $statistik,
            'aktivitasTerbaru' => $aktivitasTerbaru,
            'grafikPesanan' => $grafikPesanan,
            'statusPesanan' => $statusPesanan
        ]);
    }
}
