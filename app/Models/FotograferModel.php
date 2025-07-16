<?php

namespace App\Models;

use CodeIgniter\Model;

class FotograferModel extends Model
{
    protected $table = 'fotografer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'whatsapp', 'email', 'status', 'alamat', 'foto'];
}
