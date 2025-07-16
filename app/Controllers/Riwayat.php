<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\PembayaranModel;
use App\Models\PaketModel;
use CodeIgniter\Controller;

class Riwayat extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pesanan');

        $builder->select('
            pesanan.id,
            pesanan.nama_lengkap,
            pesanan.tanggal_sesi,
            pesanan.lokasi,
            pesanan.metode_pembayaran,
            pesanan.keterangan,
            pesanan.link_drive,
            paket.nama_paket,
            pembayaran.total_tagihan,
            pembayaran.status_pembayaran
        ');

        $builder->join('paket', 'paket.id = pesanan.paket_id', 'left');
        $builder->join('pembayaran', 'pembayaran.pesanan_id = pesanan.id', 'left');

        $builder->where('pesanan.status_pesanan', 'Selesai');
        $builder->orderBy('pesanan.tanggal_sesi', 'DESC');

        $pesanan = $builder->get()->getResultArray();

        return view('admin/opm/riwayat', ['pesanan' => $pesanan]);
    }
}
