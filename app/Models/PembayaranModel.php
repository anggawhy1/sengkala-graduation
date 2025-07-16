<?php
namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model {
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', // pastikan juga `id` bisa di-set secara manual
        'pesanan_id', 'status_pembayaran', 'total_tagihan', 'dp_dibayar',
        'sisa_tagihan', 'deadline_pelunasan', 'bukti_pembayaran',
        'tanggal_konfirmasi'
    ];

    /**
     * Generate ID pembayaran unik, contoh: PAY202507100001
     */
    public function generateId()
    {
        $today = date('Ymd');
        $prefix = "PAY" . $today;

        // Cari ID terakhir hari ini
        $last = $this->where("id LIKE", "$prefix%")
                     ->orderBy('id', 'DESC')
                     ->first();

        $lastNumber = $last ? intval(substr($last['id'], -4)) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        return $prefix . $newNumber;
    }
}
