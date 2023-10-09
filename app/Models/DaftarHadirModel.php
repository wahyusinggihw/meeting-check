<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarHadirModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'daftarhadirs';
    protected $primaryKey       = 'id_daftar_hadir';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_daftar_hadir',
        'kode_rapat',
        'NIP_NIK',
        'nama',
        'asal_instansi',
        'ttd',
        'created_at',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nip_nik' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'NIP/NIK harus diisi',
                'numeric' => 'NIP/NIK harus berupa angka'
            ]
        ],
        'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama harus diisi'
            ]
        ],
        'asal_instansi' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Asal Instansi harus diisi'
            ]
        ],
        'ttd' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Tanda Tangan harus diisi'
            ]
        ]


    ];
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
}
