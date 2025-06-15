<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
{
    $data = [
        'tanggal' => '10 Oktober 2025',
        'statistik' => [
            'pesananHariIni' => 12,
            'slotTersedia' => 3,
            'fotograferBertugas' => 3,
            'menungguKonfirmasi' => 4,
            'pembayaranMasuk' => 2750000,
            'updateTerakhir' => '22.30 WIB'
        ],
        'aktivitasTerbaru' => [
            [
                'id' => 'PP-20250610-001',
                'klien' => 'Adinda Kusuma',
                'jam' => '18.45.30 WIB',
                'status' => 'Menunggu Konfirmasi'
            ],
            [
                'id' => 'CP-20250610-002',
                'klien' => 'Bagas Herlambang',
                'jam' => '18.55.40 WIB',
                'status' => ''
            ],
            [
                'id' => 'GP-20250610-003',
                'klien' => 'Bintang Ayu',
                'jam' => '19.15.21 WIB',
                'status' => ''
            ],
            [
                'id' => 'PP-20250610-004',
                'klien' => 'Lintang Bulan',
                'jam' => '19.22.00 WIB',
                'status' => ''
            ],
        ],
        'jadwalHariIni' => [
            [
                'jam' => '09.30 WIB',
                'fotografer' => 'Justine Bieber',
                'klien' => 'Alfiyatul'
            ]
        ],
        // 🎯 Tambahkan data grafik di sini
        'grafikPesanan' => [
            'labels' => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            'data' => [5, 7, 3, 9, 4, 2, 6]
        ],
        'statusPesanan' => [
            'labels' => ['Diproses', 'Selesai', 'Dibatalkan'],
            'data' => [10, 20, 5]
        ]
    ];

    return view('admin/dashboard', $data);
}

}
