<?php

namespace App\Controllers;

class Jadwal extends BaseController
{
    public function index()
    {
        // Dummy data
        $jadwal = [
            ['slot' => 1, 'fotografer' => 'Dddddddd', 'jam' => '08.00', 'klien' => '', 'lokasi' => '', 'status' => ''],
            ['slot' => 2, 'fotografer' => 'Dddddddd', 'jam' => '08.00', 'klien' => '', 'lokasi' => '', 'status' => ''],
            ['slot' => 3, 'fotografer' => 'Dddddddd', 'jam' => '08.00', 'klien' => '', 'lokasi' => '', 'status' => ''],
            ['slot' => 4, 'fotografer' => 'Dddddddd', 'jam' => '08.00', 'klien' => '', 'lokasi' => '', 'status' => ''],
            ['slot' => 5, 'fotografer' => 'Dddddddd', 'jam' => '08.00', 'klien' => '', 'lokasi' => '', 'status' => ''],
        ];

        $kalender = [
            '2025-01-10' => ['08.00', '11.00'],
            '2025-01-11' => ['11.45'],
            '2025-01-12' => ['08.00']
        ];

        return view('admin/jadwal', compact('jadwal', 'kalender'));
    }

    public function jadwal()
    {
        $tanggal = $this->request->getGet('tanggal') ?? date('Y-m-d');

        $data['jadwal'] = [
            [
                'sesi' => 'Pagi',
                'slot' => 1,
                'fotografer' => 'Dika',
                'jam' => '08:00',
                'klien' => 'Andi',
                'lokasi' => 'Studio A',
                'kontak' => '628123456789'
            ],
            [
                'sesi' => 'Pagi',
                'slot' => 2,
                'fotografer' => 'Rina',
                'jam' => '09:30',
                'klien' => 'Sinta',
                'lokasi' => 'Taman Kota',
                'kontak' => '628129876543'
            ],
            [
                'sesi' => 'Siang',
                'slot' => 1,
                'fotografer' => '',
                'jam' => '',
                'klien' => '',
                'lokasi' => '',
                'kontak' => ''
            ],
        ];

        return view('admin/jadwal', $data);
    }


    public function updateJadwal()
    {
        $jadwalData = $this->request->getPost('jadwal');

        // Karena ini dummy, kita tampilkan aja dulu hasilnya
        echo "<pre>";
        print_r($jadwalData);
        echo "</pre>";
    }
}
