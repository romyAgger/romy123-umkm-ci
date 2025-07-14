<?php

namespace App\Models;

use CodeIgniter\Model;

class UmkmModel extends Model
{
    protected $table = 'umkms';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'alamat', 'tanggal_lahir_pemilik', 'jenis_usaha', 'produk', 'foto'
    ];
    protected $useTimestamps = true;
    protected $returnType = 'object';
}
