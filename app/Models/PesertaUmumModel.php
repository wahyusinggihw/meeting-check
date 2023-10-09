<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaUmumModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pesertaumums';
    protected $primaryKey       = 'id_peserta_umum';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_peserta_umum',
        'nik',
        'nama',
        'alamat',
        'no_hp',
        'asal_instansi',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // validation rules
    protected $validationRules = [
        'nik' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'NIK harus diisi',
                'numeric' => 'NIK harus berupa angka'
            ]
        ],
        'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama harus diisi'
            ]
        ],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat harus diisi'
            ]
        ],
        'no_hp' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'No HP harus diisi',
                'numeric' => 'No HP harus berupa angka'
            ]
        ],
        'asal_instansi' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Asal Instansi harus diisi'
            ]
        ],

    ];

    //transaction
    public function insertTransaction($data)
    {
        $this->db->transStart();
        $this->db->table('pesertaumums')->insert($data);
        $this->db->transComplete();
    }
}
