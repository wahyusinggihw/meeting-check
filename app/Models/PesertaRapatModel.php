<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaRapatModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pesertarapats';
    protected $primaryKey       = 'id_peserta_rapat';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_peserta_rapat',
        'kode_rapat',
        'NIK',
        'created_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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

    public function getPesertaRapat($kode_rapat)
    {
        return $this->where('kode_rapat', $kode_rapat)->findAll();
    }

    public function getInstansi()
    {
        $apiUrl = 'https://egov.bulelengkab.go.id/api/instansi_utama';
        $username = 'hadir_rapat';
        $password = '@rapatBuleleng1#';
        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }
}
