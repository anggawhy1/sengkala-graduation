<?php

namespace App\Controllers;

use App\Models\PesananModel;
use CodeIgniter\Controller;
use App\Models\PaketModel;

class Pemesanan extends BaseController
{
    public function index()
    {
        $model = new PesananModel();
        $paketModel = new PaketModel();

        // Ambil semua pesanan dan hitung per sesi per tanggal
        $result = $model
            ->select('tanggal_sesi, waktu, COUNT(*) as jumlah')
            ->groupBy('tanggal_sesi, waktu')
            ->findAll();

        // Atur slot maksimal per sesi
        $maxSlotPerSesi = 5;

        // Hitung jumlah pesanan per sesi per tanggal
        $kuota = [];
        foreach ($result as $row) {
            $tanggal = $row['tanggal_sesi'];
            $waktu = $row['waktu'];

            // Misalnya anggap jam sesi:
            //  - Sesi 1 = jam <= 12:00
            //  - Sesi 2 = jam > 12:00
            $sesi = (strtotime($waktu) <= strtotime('12:00')) ? 'Sesi 1' : 'Sesi 2';

            if (!isset($kuota[$tanggal][$sesi])) {
                $kuota[$tanggal][$sesi] = 0;
            }

            $kuota[$tanggal][$sesi] += $row['jumlah'];
        }

        // Tandai tanggal yang penuh (kedua sesi sudah >= 5)
        $jadwalPenuh = [];
        foreach ($kuota as $tanggal => $sesiData) {
            $sesi1Penuh = ($sesiData['Sesi 1'] ?? 0) >= $maxSlotPerSesi;
            $sesi2Penuh = ($sesiData['Sesi 2'] ?? 0) >= $maxSlotPerSesi;

            if ($sesi1Penuh && $sesi2Penuh) {
                $jadwalPenuh[] = $tanggal;
            }
        }

        return view('pesan', [
            'jadwalPenuh' => $jadwalPenuh,
            'paketList' => $paketModel->findAll(),
            'orderId' => session()->getFlashdata('order_id') ?? null
        ]);
    }

    public function simpan()
    {
        date_default_timezone_set('Asia/Jakarta');

        $model = new PesananModel();
        $orderId = 'ORD' . time();

        // Ambil input dari form
        $waktu = $this->request->getPost('waktu');

        // Tentukan sesi otomatis berdasarkan waktu
        $sesi = (strtotime($waktu) <= strtotime('12:00')) ? 'Sesi 1' : 'Sesi 2';

        $data = [
            'id' => $orderId,
            'nama_lengkap' => $this->request->getPost('nama'),
            'asal_universitas' => $this->request->getPost('universitas'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'instagram' => $this->request->getPost('instagram'),
            'paket_id' => $this->request->getPost('paket'),
            'tanggal_sesi' => $this->request->getPost('tanggal'),
            'waktu' => $waktu,
            'sesi' => $sesi, // ✅ Ditentukan otomatis
            'lokasi' => $this->request->getPost('lokasi'),
            'metode_pembayaran' => $this->request->getPost('pembayaran'),
            'jenis_pembayaran' => $this->request->getPost('jenis_pembayaran'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status_pesanan' => 'Menunggu Konfirmasi',
            'tanggal_pesan' => date('Y-m-d H:i:s'),
        ];

        $model->insert($data);

        return redirect()->to('/pesan')->with('order_id', $orderId);
    }
}
