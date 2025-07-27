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

        $model = new \App\Models\PesananModel();
        $orderId = 'ORD' . time();

        $waktu = $this->request->getPost('waktu');
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
            'sesi' => $sesi,
            'lokasi' => $this->request->getPost('lokasi'),
            'metode_pembayaran' => $this->request->getPost('pembayaran'),
            'jenis_pembayaran' => $this->request->getPost('jenis_pembayaran'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status_pesanan' => 'Menunggu Konfirmasi',
            'tanggal_pesan' => date('Y-m-d H:i:s'),
            'email' => $this->request->getPost('email'),
        ];

        $model->insert($data);

        // Kirim Email
        $emailService = \Config\Services::email();
        $emailService->setFrom('noreply@yourdomain.com', 'SENGKALA GRADUATION');
        $emailService->setTo($data['email']);
        $emailService->setSubject('Pesanan Anda telah diterima');

        $pesan = "
<html>
<head>
  <style>
    body { font-family: Arial, sans-serif; color: #333; }
    .container { padding: 20px; }
    h2 { color: #0066cc; }
    .section-title { font-weight: bold; margin-top: 20px; }
    ul { list-style: none; padding: 0; }
    li { margin-bottom: 5px; }
    .footer { margin-top: 30px; font-size: 14px; color: #777; }
  </style>
</head>
<body>
  <div class='container'>
    <p>Hai <strong>{$data['nama_lengkap']}</strong>, 👋</p>
    <p>Terima kasih telah melakukan pemesanan layanan kami. Berikut detail pesanan Anda:</p>

    <div class='section-title'>🧾 Informasi Pesanan</div>
    <ul>
      <li><strong>ID Pesanan:</strong> {$orderId}</li>
      <li><strong>Nama Lengkap:</strong> {$data['nama_lengkap']}</li>
      <li><strong>Asal Universitas:</strong> {$data['asal_universitas']}</li>
      <li><strong>WhatsApp:</strong> {$data['whatsapp']}</li>
      <li><strong>Instagram:</strong> {$data['instagram']}</li>
    </ul>

    <div class='section-title'>📦 Detail Paket</div>
    <ul>
      <li><strong>Paket yang dipilih:</strong> {$data['paket_id']}</li>
      <li><strong>Tanggal Sesi:</strong> {$data['tanggal_sesi']}</li>
      <li><strong>Waktu:</strong> {$data['waktu']} ({$data['sesi']})</li>
      <li><strong>Lokasi:</strong> {$data['lokasi']}</li>
    </ul>

    <div class='section-title'>💳 Pembayaran</div>
    <ul>
      <li><strong>Metode:</strong> {$data['metode_pembayaran']}</li>
      <li><strong>Jenis:</strong> {$data['jenis_pembayaran']}</li>
    </ul>
";

        $paketModel = new \App\Models\PaketModel();
        $paket = $paketModel->find($data['paket_id']);

        if ($paket) {
            $totalHarga = $paket['harga'];
            if ($data['jenis_pembayaran'] == 'DP') {
                $dp = $totalHarga * 0.3;
                $pesan .= "
    <div class='section-title'>💰 Rincian Pembayaran</div>
    <ul>
      <li><strong>Total Harga:</strong> Rp " . number_format($totalHarga, 0, ',', '.') . "</li>
      <li><strong>DP (30%):</strong> Rp " . number_format($dp, 0, ',', '.') . "</li>
    </ul>
";
            } else {
                $pesan .= "
    <div class='section-title'>💰 Rincian Pembayaran</div>
    <ul>
      <li><strong>Total yang harus dibayar (Lunas):</strong> Rp " . number_format($totalHarga, 0, ',', '.') . "</li>
    </ul>
";
            }
        }

        $pesan .= "
    <div class='section-title'>📝 Catatan Penting:</div>
    <p>Lakukan pembayaran <strong>setelah pesanan Anda dikonfirmasi</strong> oleh tim kami. Tim kami akan segera menghubungi Anda melalui WhatsApp untuk proses lebih lanjut.</p>

    <div class='footer'>
      🙏 Terima kasih atas kepercayaannya.<br>
      Salam hangat,<br>
      <strong>Sengkala Graduation</strong>
    </div>
  </div>
</body>
</html>
";

        $emailService->setMessage($pesan);

        if (!$emailService->send()) {
            log_message('error', 'Gagal mengirim email: ' . $emailService->printDebugger(['headers']));
        }

        return redirect()->to('/pesan')->with('order_id', $orderId);
    }
}
