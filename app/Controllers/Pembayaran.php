<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PesananModel;
use App\Models\PaketModel;

class Pembayaran extends BaseController
{
    public function index()
    {
        $pembayaranModel = new PembayaranModel();
        $pesananModel = new PesananModel();
        $paketModel = new PaketModel();

        $tanggal = $this->request->getGet('tanggal');
        $rows = $tanggal
            ? $pembayaranModel
            ->where('tanggal_konfirmasi', $tanggal)
            ->where('status_pembayaran !=', 'Lunas')
            ->orderBy('id')
            ->findAll()
            : $pembayaranModel
            ->where('status_pembayaran !=', 'Lunas')
            ->orderBy('id')
            ->findAll();

        foreach ($rows as &$r) {
            $p = $pesananModel->find($r['pesanan_id']);
            $paket = $paketModel->find($p['paket_id'] ?? null);

            $total = $r['total_tagihan'] ?? 0;
            $status = $r['status_pembayaran'] ?? null;
            $jenis = $p['jenis_pembayaran'] ?? null;

            // Hitung sisa tagihan
            if ($status === 'Belum Bayar') {
                $sisa = $total;
            } elseif ($status === 'Belum Lunas') {
                if ($jenis === 'DP') {
                    $sisa = $total * 0.7;
                } elseif (!empty($jenis)) {
                    $sisa = $total;
                } else {
                    $sisa = 'Data Tidak Lengkap';
                }
            } elseif ($status === 'Lunas') {
                $sisa = 0;
            } else {
                $sisa = 'Data Tidak Lengkap';
            }

            // Tambahkan data ke row
            $r['id_pembayaran'] = $r['id'];
            $r['id'] = $p['id'] ?? '-';
            $r['nama_klien'] = $p['nama_lengkap'] ?? '-';
            $r['paket'] = $paket['nama_paket'] ?? '-';
            $r['lokasi'] = $p['lokasi'] ?? '-';
            $r['total'] = $total;
            $r['sisa']  = $sisa;
            $r['metode'] = $p['metode_pembayaran'] ?? '-';
            $r['bukti'] = (!empty($r['bukti_pembayaran'])) ? $r['bukti_pembayaran'] : '-';
            $r['status'] = $status;
            $r['tanggal_pesan'] = isset($p['tanggal_pesan']) ? date('Y-m-d', strtotime($p['tanggal_pesan'])) : '-';
            $r['tanggal_sesi'] = isset($p['tanggal_sesi']) ? date('Y-m-d', strtotime($p['tanggal_sesi'])) : '-';
            $r['tanggal_konfirmasi'] = isset($r['tanggal_konfirmasi']) ? date('Y-m-d', strtotime($r['tanggal_konfirmasi'])) : '-';
            $r['additional'] = $p['keterangan'] ?? '-';
        }

        return view('admin/opm/pembayaran', ['pembayaran' => $rows]);
    }


    public function detail($id)
    {
        $pembayaranModel = new PembayaranModel();
        $pesananModel = new PesananModel();
        $paketModel = new PaketModel();

        $r = $pembayaranModel->find($id);
        if (!$r) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pesanan = $pesananModel->find($r['pesanan_id']);
        $paket = $pesanan ? $paketModel->find($pesanan['paket_id']) : null;

        $r['kode_pesanan'] = $pesanan['id'] ?? '-'; // default: id angka (lama)
        if (isset($pesanan['kode_pesanan'])) {
            $r['kode_pesanan'] = $pesanan['kode_pesanan'];
        }

        $r['nama_klien'] = $pesanan['nama_lengkap'] ?? '-';
        $r['metode'] = $pesanan['metode_pembayaran'] ?? '-';
        $r['tanggal_pesan'] = $pesanan['tanggal_pesan'] ?? '-';
        $r['tanggal_sesi'] = $pesanan['tanggal_sesi'] ?? '-';
        $r['lokasi'] = $pesanan['lokasi'] ?? '-';
        $r['paket'] = $paket['nama_paket'] ?? 'Paket Tidak Diketahui';
        $r['additional'] = $pesanan['additional'] ?? '-';
        $r['status'] = $r['status_pembayaran'] ?? 'Belum Bayar';
        $r['total'] = $r['total_tagihan'] ?? 0;
        $r['sisa'] = $r['sisa_tagihan'] ?? 0;
        $r['bukti'] = $r['bukti_pembayaran'] ?? '-';

        return view('admin/opm/detail_pembayaran', ['detail' => $r]);
    }


    public function updateStatus($id)
    {
        $statusBaru = $this->request->getPost('status');
        $pembayaranModel = new PembayaranModel();
        $pesananModel = new PesananModel();

        $pembayaran = $pembayaranModel->find($id);
        if (!$pembayaran) {
            return redirect()->back()->with('error', 'Data pembayaran tidak ditemukan.');
        }

        // Update status pembayaran
        $pembayaranModel->update($id, [
            'status_pembayaran' => $statusBaru
        ]);

        // Jika status pembayaran menjadi 'Lunas', update status pesanan ke 'Aktif'
        if ($statusBaru === 'Lunas') {
            $pesananModel->update($pembayaran['pesanan_id'], [
                'status_pesanan' => 'Aktif'
            ]);
        }

        return redirect()->to('/admin/opm/pembayaran')->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
