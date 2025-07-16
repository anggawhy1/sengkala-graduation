<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaketModel;
use App\Models\PaketDetailModel;

class Katalog extends BaseController
{
    public function index()
    {
        $paketModel = new PaketModel();
        $detailModel = new PaketDetailModel();

        // Ambil semua paket
        $pakets = $paketModel->findAll();

        // Buat array untuk menampung data lengkap
        $data = [];

        foreach ($pakets as $paket) {
            // Ambil detail berdasarkan paket_id
            $detail = $detailModel->where('paket_id', $paket['id'])->findAll();

            // Gunakan nama_paket sebagai key
            $key = strtolower(str_replace(' ', '_', $paket['nama_paket'])); // contoh: 'Personal A' jadi 'personal_a'

            $data[$key] = [
                'id' => $paket['id'],
                'nama_paket' => $paket['nama_paket'],
                'harga' => $paket['harga'],
                'kategori' => $paket['kategori'],
                'deskripsi' => $detail, // array of detail baris
            ];
        }

        return view('katalog', $data);
    }
}
