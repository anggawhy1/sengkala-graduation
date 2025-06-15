<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pesanan extends BaseController
{
    public function index()
    {
        $data['pesanan'] = [
            [
                'id' => 'PP-20250610001',
                'nama_klien' => 'Ayu Dewi',
                'jam_masuk' => '09.00',
                'status' => 'Menunggu Konfirmasi',
            ],
            [
                'id' => 'PP-20250610002',
                'nama_klien' => 'Rizky Fadillah',
                'jam_masuk' => '10.00',
                'status' => 'Menunggu Konfirmasi',
            ],
            [
                'id' => 'PP-20250610003',
                'nama_klien' => 'Siti Nurhaliza',
                'jam_masuk' => '11.00',
                'status' => 'Menunggu Konfirmasi',
            ],
        ];

        return view('admin/opm/pesanan', $data);
    }

    public function detail($id)
    {
        $data['pesanan'] = [
            'id' => $id,
            'nama_klien' => 'Ayu Dewi',
            'asal_universitas' => 'UPY',
            'whatsapp' => '+62 81234567890',
            'instagram' => '@ayudewi',
            'paket' => 'Couple A',
            'jam_masuk' => '09.00',
            'waktu' => '09.00 - 11.30',
            'tanggal' => '10 Oktober 2025',
            'lokasi' => 'Taman UPY',
            'metode_pembayaran' => 'Tunai',
            'keterangan' => 'Latar taman',
            'status' => 'Menunggu Konfirmasi',
        ];

        return view('admin/opm/detail', $data);
    }

    public function riwayat()
    {
        $data['riwayat'] = [
            [
                'tanggal' => '2025-06-10',
                'id' => 'PP-20250610001',
                'nama_klien' => 'Ayu Dewi',
                'asal_universitas' => 'UPY',
                'whatsapp' => '08123456789',
                'instagram' => '@ayudewi',
                'paket' => 'Couple A',
                'tanggal_sesi' => '2025-06-15 / Sesi 1',
                'lokasi' => 'Taman UPY',
                'pembayaran' => 'Tunai',
                'status' => 'Selesai',
            ],
            [
                'tanggal' => '2025-06-11',
                'id' => 'PP-20250610002',
                'nama_klien' => 'Rizky Fadillah',
                'asal_universitas' => 'UTY',
                'whatsapp' => '08129876543',
                'instagram' => '@rizkyfadillah',
                'paket' => 'Single B',
                'tanggal_sesi' => '2025-06-16 / Sesi 2',
                'lokasi' => 'Studio 1',
                'pembayaran' => 'Transfer',
                'status' => 'Selesai',
            ],
            [
                'tanggal' => '2025-06-12',
                'id' => 'PP-20250610003',
                'nama_klien' => 'Siti Nurhaliza',
                'asal_universitas' => 'UMY',
                'whatsapp' => '08121212121',
                'instagram' => '@sitinurhaliza',
                'paket' => 'Group A',
                'tanggal_sesi' => '2025-06-17 / Sesi 3',
                'lokasi' => 'Outdoor Kampus',
                'pembayaran' => 'Belum',
                'status' => 'Selesai',
            ],
        ];

        return view('admin/opm/riwayat', $data);
    }

    public function aktif()
    {
        // Dummy data array
        $data['pesanan'] = [
            [
                'id' => 'PSN001',
                'nama_klien' => 'Budi Santoso',
                'asal_universitas' => 'Universitas Alma Ata',
                'tanggal' => '2025-06-14',
                'waktu' => '10:00',
                'paket' => 'A',
                'instagram' => '@budisantoso',
                'whatsapp' => '081234567890',
                'lokasi' => 'Studio A',
                'metode_pembayaran' => 'BRI',
                'status_pembayaran' => 'Lunas',
                'keterangan' => '-',
                'status_pesanan' => 'Belum Diproses',
            ],
            [
                'id' => 'PSN002',
                'nama_klien' => 'Siti Aminah',
                'asal_universitas' => 'Universitas Gadjah Mada',
                'tanggal' => '2025-06-15',
                'waktu' => '13:00',
                'paket' => 'B',
                'instagram' => '@sitiaminah',
                'whatsapp' => '081298765432',
                'lokasi' => 'Studio B',
                'metode_pembayaran' => 'Mandiri',
                'status_pembayaran' => 'Lunas',
                'keterangan' => 'Perlu lighting tambahan',
                'status_pesanan' => 'Editing',
            ]
        ];

        return view('admin/opm/pesanan-aktif', $data);
    }

    public function updateStatus()
    {
        // Karena ini dummy, tidak akan menyimpan perubahan apa pun
        // Simulasi redirect dengan flash message
        return redirect()->to('/admin/opm/pesanan-aktif')->with('success', 'Status dummy berhasil diperbarui (tidak disimpan permanen)');
    }
}
