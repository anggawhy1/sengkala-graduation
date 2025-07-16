<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketDetailModel extends Model
{
    protected $table = 'paket_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['paket_id', 'deskripsi'];
    public $useTimestamps = false;
}
