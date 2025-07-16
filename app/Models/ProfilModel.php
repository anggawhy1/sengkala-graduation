<?php
namespace App\Models;
use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lengkap', 'username', 'email', 'nomor_hp', 'password', 'foto_profil'];
}
