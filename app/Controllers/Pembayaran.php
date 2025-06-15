<?php

namespace App\Controllers;

class Pembayaran extends BaseController
{
    private $dummyData = [
        [
            'id' => 'PP001',
            'nama_klien' => 'Adinda Kusuma',
            'paket' => 'Couple A',
            'metode' => 'Transfer',
            'status' => 'Belum Bayar',
            'bukti' => 'bukti1.jpg',
            'tanggal_pesan' => '07 Agustus 2025',
            'tanggal_sesi' => '19 September 2025',
            'lokasi' => 'Taman Kulon Progo',
            'total' => '375000',
            'sisa' => '375000',
            'tanggal_konfirmasi' => '-',
            'additional' => '-'
        ],
        [
            'id' => 'PP002',
            'nama_klien' => 'Andi Rizki',
            'paket' => 'Couple B',
            'metode' => 'DP',
            'status' => 'Belum Lunas',
            'bukti' => 'bukti2.jpg',
            'tanggal_pesan' => '10 Agustus 2025',
            'tanggal_sesi' => '22 September 2025',
            'lokasi' => 'UNY',
            'total' => '400000',
            'sisa' => '200000',
            'tanggal_konfirmasi' => '12 Agustus 2025',
            'additional' => 'Makeup'
        ],
        // tambahkan juga untuk PP003 dan PP004
    ];

    public function index()
    {
        $data['pembayaran'] = $this->dummyData;
        return view('admin/opm/pembayaran', $data);
    }

    public function detail($id)
    {
        $detail = null;
        foreach ($this->dummyData as $row) {
            if ($row['id'] == $id) {
                $detail = $row;
                break;
            }
        }

        if (!$detail) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['detail'] = $detail;
        return view('admin/opm/detail_pembayaran', $data);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        // Simulasi update status
        return redirect()->to("/admin/opm/pembayaran/$id")->with('message', 'Status berhasil diubah ke ' . $status);
    }
}
