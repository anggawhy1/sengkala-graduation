<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\PaketModel;
use App\Models\PembayaranModel;

class Pesanan extends BaseController
{
    public function index()
    {
        $model = new PesananModel();
        $tanggal = $this->request->getGet('tanggal');

        // Ambil hanya yang "Menunggu Konfirmasi"
        $query = $model->where('status_pesanan', 'Menunggu Konfirmasi');

        if ($tanggal) {
            $query->where('DATE(tanggal_pesan)', $tanggal);
        }

        $pesanan = $query->orderBy('tanggal_sesi', 'DESC')->orderBy('waktu', 'ASC')->findAll();

        $data['pesanan'] = array_map(function ($p) {
            return [
                'id' => $p['id'],
                'nama_klien' => $p['nama_lengkap'],
                'jam_masuk' => date('H:i', strtotime($p['tanggal_pesan'])),
                'status' => $p['status_pesanan'],
            ];
        }, $pesanan);

        return view('admin/opm/pesanan', $data);
    }

    public function detail($id)
    {
        $model = new PesananModel();
        $pesanan = $model->find($id);
        $model->tandaiSudahDibaca($id);

        if (!$pesanan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pesanan dengan ID $id tidak ditemukan.");
        }

        $data['pesanan'] = [
            'id' => $pesanan['id'],
            'jam_masuk' => substr($pesanan['waktu'], 0, 5),
            'nama_klien' => $pesanan['nama_lengkap'],
            'asal_universitas' => $pesanan['asal_universitas'],
            'whatsapp' => $pesanan['whatsapp'],
            'instagram' => $pesanan['instagram'],
            'paket' => $pesanan['paket_id'], // bisa kamu sesuaikan jika pakai relasi
            'waktu' => $pesanan['waktu'],
            'tanggal' => date('d F Y', strtotime($pesanan['tanggal_sesi'])),
            'lokasi' => $pesanan['lokasi'],
            'metode_pembayaran' => $pesanan['metode_pembayaran'],
            'keterangan' => $pesanan['keterangan'] ?: '-',
            'status' => $pesanan['status_pesanan'],
        ];

        return view('admin/opm/detail', $data);
    }

    public function konfirmasi($id)
    {
        $pesananModel = new PesananModel();
        $pembayaranModel = new PembayaranModel();
        $paketModel = new PaketModel();

        // Ambil data pesanan
        $pesanan = $pesananModel->find($id);
        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        // Ambil data paket
        $paket = $paketModel->find($pesanan['paket_id']);
        if (!$paket) {
            return redirect()->back()->with('error', 'Data paket tidak ditemukan.');
        }

        // Generate ID pembayaran unik
        $idPembayaran = $pembayaranModel->generateId(); // Pastikan kamu buat method ini di model

        // Update status pesanan jadi Dikonfirmasi
        $pesananModel->update($id, ['status_pesanan' => 'Dikonfirmasi']);

        // Simpan data pembayaran
        $dataPembayaran = [
            'id' => $idPembayaran,
            'pesanan_id' => $id,
            'status_pembayaran' => 'Belum Bayar',
            'total_tagihan' => $paket['harga'],
            'dp_dibayar' => 0,
            'sisa_tagihan' => $paket['harga'],
            'deadline_pelunasan' => date('Y-m-d', strtotime('+7 days')),
            'tanggal_konfirmasi' => date('Y-m-d H:i:s'),
            'bukti_pembayaran' => null
        ];

        $pembayaranModel->insert($dataPembayaran);

        return redirect()->to('/admin/opm/pesanan')->with('success', 'Pesanan berhasil dikonfirmasi dan data pembayaran dibuat.');
    }
    public function tolak($id)
    {
        $pesananModel = new \App\Models\PesananModel();
        $pembayaranModel = new \App\Models\PembayaranModel();

        // Hapus pembayaran dulu (kalau ada)
        $pembayaranModel->where('pesanan_id', $id)->delete();

        // Hapus data pesanan
        $pesananModel->delete($id);

        return redirect()->to('/admin/opm/pesanan')->with('success', 'Pesanan berhasil ditolak dan dihapus.');
    }
}
