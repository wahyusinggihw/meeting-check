<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaRapatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'agendarapats';
    protected $primaryKey       = 'id';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul_rapat',
        'tempat',
        'tanggal',
        'link_rapat'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
