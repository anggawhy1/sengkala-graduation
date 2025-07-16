<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\PaketModel;
use App\Models\PembayaranModel;

class PesananAktif extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pesanan');

        // JOIN dengan pembayaran
        $builder->select('pesanan.*, pembayaran.id AS id_pembayaran, pembayaran.status_pembayaran, pembayaran.total_tagihan, pembayaran.sisa_tagihan');
        $builder->join('pembayaran', 'pembayaran.pesanan_id = pesanan.id');
        $builder->where('pembayaran.status_pembayaran', 'Lunas'); // ✅ Hanya yang lunas
        $builder->where('pesanan.status_pesanan !=', 'Selesai'); // ❌ Tidak tampilkan yang selesai

        // Filter tambahan (opsional)
        if ($search = $this->request->getGet('search')) {
            $builder->groupStart()
                ->like('pesanan.id', $search)
                ->orLike('pesanan.nama_lengkap', $search)
                ->groupEnd();
        }
        if ($tanggal = $this->request->getGet('tanggal')) {
            $builder->where('pesanan.tanggal_sesi', $tanggal);
        }
        if ($kampus = $this->request->getGet('kampus')) {
            $builder->like('pesanan.asal_universitas', $kampus);
        }
        if ($paket = $this->request->getGet('paket')) {
            $paketModel = new PaketModel();
            $paketRow = $paketModel->where('nama_paket', $paket)->first();
            if ($paketRow) {
                $builder->where('pesanan.paket_id', $paketRow['id']);
            }
        }

        $builder->orderBy('pesanan.tanggal_sesi', 'DESC');
        $result = $builder->get()->getResultArray();

        $paketModel = new PaketModel();

        // Mapping data
        $pesanan = array_map(function ($row) use ($paketModel) {
            $paket = $paketModel->find($row['paket_id']);

            return [
                'id' => $row['id'],
                'id_pembayaran' => $row['id_pembayaran'],
                'nama_klien' => $row['nama_lengkap'],
                'asal_universitas' => $row['asal_universitas'],
                'tanggal' => $row['tanggal_sesi'],
                'waktu' => $row['waktu'],
                'paket' => $paket['nama_paket'] ?? '-',
                'instagram' => $row['instagram'],
                'whatsapp' => $row['whatsapp'],
                'lokasi' => $row['lokasi'],
                'metode_pembayaran' => $row['metode_pembayaran'],
                'status_pembayaran' => $row['status_pembayaran'] ?? '-',
                'keterangan' => $row['keterangan'],
                'status_pesanan' => $row['status_pesanan'],
                'link_drive' => $row['link_drive'],

                // ✅ Tambahan untuk invoice modal
                'total' => $row['total_tagihan'] ?? 0,
                'sisa' => $row['sisa_tagihan'] ?? 0,
                'tanggal_konfirmasi' => $row['tanggal_konfirmasi'] ?? '-',
                'bukti' => $row['bukti_pembayaran'] ?? '-', // Kalau mau tampilkan link bukti juga
            ];
        }, $result);

        $paketList = $paketModel->findAll();

        return view('admin/opm/pesanan-aktif', [
            'pesanan' => $pesanan,
            'paketList' => $paketList // ✅ untuk dropdown filter paket
        ]);
    }

    public function status()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $pesananModel = new PesananModel();
        $pesananModel->update($id, ['status_pesanan' => $status]);

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }

    public function drive()
    {
        $id = $this->request->getPost('id');
        $link = $this->request->getPost('link_drive');

        $pesananModel = new \App\Models\PesananModel();
        $pesananModel->update($id, ['link_drive' => $link]);

        return redirect()->to('/admin/opm/pesanan-aktif')->with('success', 'Link Drive berhasil disimpan.');
    }
}
