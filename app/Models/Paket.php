<?php
namespace App\Models;

use CodeIgniter\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $allowedFields = ['kategori_id', 'nama_paket', 'deskripsi', 'gambar', 'harga'];
}