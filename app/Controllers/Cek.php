<?php

namespace App\Controllers;

class Cek extends BaseController
{
    public function index(): string
    {
        return view('cek');
    }

    public function proses()
    {
        $id = $this->request->getPost('id');

        // Dummy data
        if ($id === '123') {
            return redirect()->to('/cek_detail');
        } else {
            return redirect()->back()->with('error', 'ID tidak ditemukan.');
        }
    }

    public function detail(): string
    {
        // Dummy detail
        $total = 450000;
        $dp = 150000;

        $data = [
            'id' => 'CPA001',
            'nama' => 'Dinda',
            'paket' => 'Couple A Package',
            'tgl_pesan' => '07 Agustus 2025',
            'tgl_sesi' => '19 September 2025',
            'lokasi' => 'Taman Kulon Progo',
            'metode' => 'BRimo',
            'status_bayar' => 'Belum Lunas',
            'total_tagihan' => $total,
            'dp_dibayar' => $dp,
            'sisa_tagihan' => $total - $dp,
            'deadline' => '18 September 2025',
            'status_proses' => [
                'Pemesanan Diterima',
                'DP Dibayar',
                'Menunggu Pelunasan',
                // 'Sesi Pemotretan',
                // 'Foto Siap Diunduh'
            ]
        ];

        return view('cek_detail', $data);
    }
}
