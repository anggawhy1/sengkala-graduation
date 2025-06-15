<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Notifikasi extends BaseController
{
    public function index()
    {
        // Dummy data dikelompokkan per tanggal
        $data['notifikasi'] = [
            'Hari Ini' => [
                [
                    'waktu' => '14.30 WIB',
                    'nama' => 'Nabilaaa',
                    'aktivitas' => 'Melakukan Pemesanan Paket Couple A'
                ],
                [
                    'waktu' => '09.30 WIB',
                    'nama' => 'Nabilaaa',
                    'aktivitas' => 'Melakukan Pemesanan Paket Couple A'
                ],
            ],
            'Kemarin' => [
                [
                    'waktu' => '14.30 WIB',
                    'nama' => 'Nabilaaa',
                    'aktivitas' => 'Melakukan Pemesanan Paket Couple A'
                ],
                [
                    'waktu' => '09.30 WIB',
                    'nama' => 'Nabilaaa',
                    'aktivitas' => 'Melakukan Pemesanan Paket Couple A'
                ],
            ],
            '09 Oktober 2025' => [
                [
                    'waktu' => '14.30 WIB',
                    'nama' => 'Nabilaaa',
                    'aktivitas' => 'Melakukan Pemesanan Paket Couple A'
                ],
            ],
        ];

        return view('notifikasi', $data);
    }
}
