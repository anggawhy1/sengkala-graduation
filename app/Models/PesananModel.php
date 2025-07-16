<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'id',
        'nama_lengkap',
        'asal_universitas',
        'whatsapp',
        'instagram',
        'paket_id',
        'tanggal_sesi',
        'waktu',
        'sesi',
        'lokasi',
        'metode_pembayaran',
        'jenis_pembayaran',
        'keterangan',
        'status_pesanan',
        'tanggal_pesan',
        'link_drive',
        'is_read',
        'fotografer_id',
    ];

    protected $useTimestamps = false;

    protected $beforeInsert = ['setDefaultStatus'];

    protected function setDefaultStatus(array $data)
    {
        if (!isset($data['data']['status_pesanan'])) {
            $data['data']['status_pesanan'] = 'Menunggu Konfirmasi';
        }

        return $data;
    }
    public function getPesananHariIni()
    {
        return $this->where('DATE(tanggal_pesan)', date('Y-m-d'))->countAllResults();
    }

    public function getAktivitasTerbaru($limit = 5)
    {
        return $this->orderBy('tanggal_pesan', 'DESC')->findAll($limit);
    }

    public function getStatistik7Hari()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT DATE(tanggal_pesan) AS tanggal, COUNT(*) AS jumlah
            FROM pesanan
            WHERE tanggal_pesan >= CURDATE() - INTERVAL 6 DAY
            GROUP BY DATE(tanggal_pesan)
            ORDER BY tanggal ASC
        ");
        return $query->getResultArray();
    }

    public function getStatusPesanan()
    {
        $db = \Config\Database::connect();
        $query = $db->query("
            SELECT status_pesanan, COUNT(*) AS jumlah
            FROM pesanan
            GROUP BY status_pesanan
        ");
        return $query->getResultArray();
    }
    public function getMenungguKonfirmasiHariIni()
    {
        return $this->where('DATE(tanggal_pesan)', date('Y-m-d'))
            ->where('status_pesanan', 'Menunggu Konfirmasi')
            ->countAllResults();
    }
    public function getNotifikasiPesananBaru()
    {
        $builder = $this->db->table('pesanan');
        $builder->select('pesanan.id, pesanan.nama_lengkap, paket.nama_paket, pesanan.tanggal_sesi, pesanan.tanggal_pesan, pesanan.is_read');
        $builder->join('paket', 'paket.id = pesanan.paket_id', 'left');
        $builder->where('pesanan.status_pesanan', 'Menunggu Konfirmasi');
        $builder->orderBy('pesanan.tanggal_pesan', 'DESC'); // urutkan dari yang terbaru
        $results = $builder->get()->getResultArray();

        $notifikasi = [];

        foreach ($results as $row) {
            $tanggal = date('d M Y', strtotime($row['tanggal_pesan']));

            // ✅ Pastikan array-nya ada
            if (!isset($notifikasi[$tanggal])) {
                $notifikasi[$tanggal] = [];
            }

            // ✅ Masukkan notifikasi terbaru di urutan paling atas
            array_unshift($notifikasi[$tanggal], [
                'id' => $row['id'],
                'nama' => $row['nama_lengkap'],
                'paket' => $row['nama_paket'] ?? '(tidak tersedia)',
                'tanggal_sesi' => $row['tanggal_sesi'] ?? '-',
                'waktu' => date('H:i', strtotime($row['tanggal_pesan'])),
                'is_read' => $row['is_read'] ?? 0
            ]);
        }

        return $notifikasi;
    }


    public function getJumlahNotifikasiBelumDibaca()
    {
        return $this->where('status_pesanan', 'Menunggu Konfirmasi')
            ->where('is_read', 0)
            ->countAllResults();
    }
    public function tandaiSemuaSudahDibaca()
    {
        return $this->where('status_pesanan', 'Menunggu Konfirmasi')
            ->where('is_read', 0)
            ->set(['is_read' => 1])
            ->update();
    }
    public function tandaiSudahDibaca($id)
    {
        return $this->where('id', $id)->set(['is_read' => 1])->update();
    }
}
