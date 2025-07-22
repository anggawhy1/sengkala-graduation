<?php

namespace App\Controllers;

use Dompdf\Dompdf;

class Cek extends BaseController
{
    public function index(): string
    {
        return view('cek');
    }

    public function proses()
    {
        $id = $this->request->getPost('id');
        $pesananModel = new \App\Models\PesananModel();

        $pesanan = $pesananModel->find($id);

        if ($pesanan) {
            return redirect()->to('/cek_detail/' . $id);
        } else {
            return redirect()->back()->with('error', 'ID tidak ditemukan.');
        }
    }

    public function detail($id)
    {
        $pesananModel = new \App\Models\PesananModel();
        $pembayaranModel = new \App\Models\PembayaranModel();
        $paketModel = new \App\Models\PaketModel();

        $pesanan = $pesananModel->find($id);
        if (!$pesanan) {
            return redirect()->to('/cek')->with('error', 'Data tidak ditemukan');
        }

        $paket = $paketModel->find($pesanan['paket_id']);
        $hargaPaket = $paket['harga'] ?? 0;

        $pembayaran = $pembayaranModel->where('pesanan_id', $id)->first();

        // Hitung DP dan sisa tagihan jika jenis pembayaran adalah DP
        if ($pesanan['jenis_pembayaran'] === 'DP') {
            $dpDibayar = round($hargaPaket * 0.3);
            $sisaTagihan = $hargaPaket - $dpDibayar;
        } else {
            $dpDibayar = $pembayaran['dp_dibayar'] ?? 0;
            $sisaTagihan = $pembayaran['sisa_tagihan'] ?? 0;
        }

        // Deadline logic: jika DP tapi belum lunas dan H-1 telah lewat => batal
        if ($pembayaran && $pesanan['jenis_pembayaran'] === 'DP') {
            $tanggalSesi = strtotime($pesanan['tanggal_sesi']);
            $batasPelunasan = strtotime('-1 days', $tanggalSesi);
            $hariIni = strtotime(date('Y-m-d'));

            if ($hariIni > $batasPelunasan && $pembayaran['status_pembayaran'] !== 'Lunas') {
                // Batalkan pesanan dan tandai pembayaran sebagai ditolak
                $pesananModel->delete($id);
                $pembayaranModel->where('pesanan_id', $id)
                    ->set(['status_pembayaran' => 'Ditolak'])
                    ->update();

                return redirect()->to('/cek')->with('error', 'Pesanan Anda dibatalkan karena melewati batas waktu pelunasan (H-3).');
            }
        }

        return view('cek_detail', [
            'id' => $id,
            'nama' => $pesanan['nama_lengkap'],
            'paket' => $paket['nama_paket'] ?? '-',
            'tgl_pesan' => $pesanan['tanggal_pesan'],
            'tgl_sesi' => $pesanan['tanggal_sesi'],
            'lokasi' => $pesanan['lokasi'],
            'metode' => $pesanan['metode_pembayaran'],
            'status_bayar' => $pembayaran['status_pembayaran'] ?? 'Belum Bayar',
            'total_tagihan' => $hargaPaket,
            'dp_dibayar' => $dpDibayar,
            'sisa_tagihan' => $sisaTagihan,
            'deadline' => $pembayaran['deadline'] ?? '-',
            'jenis_pembayaran' => $pesanan['jenis_pembayaran'] ?? '-',
            'status_pesanan' => $pesanan['status_pesanan'] ?? 'Baru',
            'link_drive' => $pesanan['link_drive'] ?? null
        ]);
    }

    public function unggahBukti()
    {
        $id = $this->request->getPost('id');
        $bukti = $this->request->getFile('bukti');

        if ($bukti->isValid() && !$bukti->hasMoved()) {
            // $namaFile = $bukti->getRandomName();
            $namaFile = time() . '_' . $bukti->getRandomName();
            $bukti->move('uploads/bukti/', $namaFile);

            $pembayaranModel = new \App\Models\PembayaranModel();
            $pembayaranModel->where('pesanan_id', $id)
                ->set([
                    'bukti_pembayaran' => $namaFile,
                    'updated_at' => date('Y-m-d H:i:s') // ⬅️ Tambahkan ini
                ])
                ->update();

            return redirect()->to('/cek_detail/' . $id)->with('success', 'Bukti berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Upload gagal');
    }

    public function cetakInvoice($id)
    {
        $pesananModel = new \App\Models\PesananModel();
        $pembayaranModel = new \App\Models\PembayaranModel();
        $paketModel = new \App\Models\PaketModel();

        $pesanan = $pesananModel->find($id);
        $paket = $paketModel->find($pesanan['paket_id']);
        $pembayaran = $pembayaranModel->where('pesanan_id', $id)->first();

        if (!$pesanan || !$pembayaran) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $hargaPaket = $paket['harga'] ?? 0;
        $dpDibayar = ($pesanan['jenis_pembayaran'] === 'DP') ? round($hargaPaket * 0.3) : ($pembayaran['dp_dibayar'] ?? 0);
        $sisaTagihan = $hargaPaket - $dpDibayar;

        // Tambahkan logika nomor rekening
        $rekening = '-';
        if ($pesanan['metode_pembayaran'] === 'SeaBank') {
            $rekening = '901395136295';
        } elseif ($pesanan['metode_pembayaran'] === 'DANA') {
            $rekening = '081912662103';
        }

        $data = [
            'id' => $id,
            'nama' => $pesanan['nama_lengkap'],
            'paket' => $paket['nama_paket'] ?? '-',
            'tgl_pesan' => $pesanan['tanggal_pesan'],
            'tgl_sesi' => $pesanan['tanggal_sesi'],
            'lokasi' => $pesanan['lokasi'],
            'metode' => $pesanan['metode_pembayaran'],
            'rekening' => $rekening, // ⬅️ Tambahkan ini
            'jenis_pembayaran' => $pesanan['jenis_pembayaran'],
            'status_bayar' => $pembayaran['status_pembayaran'],
            'total_tagihan' => $hargaPaket,
            'dp_dibayar' => $dpDibayar,
            'sisa_tagihan' => $sisaTagihan,
            'link_drive' => $pesanan['link_drive'] ?? '-',
        ];

        $html = view('invoice_pdf', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream("invoice_{$id}.pdf", ['Attachment' => true]);
    }
}
