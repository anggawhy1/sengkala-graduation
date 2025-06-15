<?php

namespace App\Controllers;

class Pemesanan extends BaseController
{
    public function index()
    {
        // Dummy data: tanggal penuh (format YYYY-MM-DD)
        $jadwalPenuh = ['2025-06-15', '2025-06-18', '2025-06-21'];

        return view('pesan', ['jadwalPenuh' => $jadwalPenuh]);
    }

    public function simpan()
    {
        // Simpan logika pemesanan di sini
        // validasi dan simpan data

        return redirect()->to('/pesan')->with('success', 'Pesanan berhasil dikirim');
    }

    public function cekJadwal()
    {
        // Dummy: tanggal yang sudah penuh
        $jadwalPenuh = ['2025-06-15', '2025-06-18', '2025-06-21'];

        return $this->response->setJSON($jadwalPenuh);
    }
}
