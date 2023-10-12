<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaRapatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'agendarapats';
    protected $primaryKey       = 'id_agenda';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_agenda',
        'slug',
        'id_admin',
        'judul_rapat',
        'kode_rapat',
        'tempat',
        'tanggal',
        'agenda',
        'jam',
        'link_rapat'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAgendaByRole()
    {
        if (session()->get('role') != 'superadmin') {
            return $this->where('id_admin', session()->get('id_admin'))->paginate(5, 'agenda');
        } else {
            return $this->paginate(5, 'agenda');
        }
    }
}
