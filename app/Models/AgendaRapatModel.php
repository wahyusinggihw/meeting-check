<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\AdminModel;

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
        'role',
        'id_instansi',
        'nama_instansi',
        'agenda_rapat',
        'kode_rapat',
        'tempat',
        'tanggal',
        'deskripsi',
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
            return $this->where('id_admin', session()->get('id_admin'))->findAll();
        } else {
            return $this->findAll();
        }
    }

    public function updateAgenda($idAgenda, $data)
    {
        // Filter by id_agenda
        $this->where('id_agenda', $idAgenda);
        $this->set($data);
        $this->update();
    }

    public function getAgendaByRole2()
    {
        $userRole = session()->get('role');
        $adminModel = new AdminModel();
        // if (session()->get('role') == 'superadmin') {
        //     $adminInstansi = $adminModel->find(session()->get('id_admin'));
        //     $agendas = $adminInstansi->agendas;
        //     return $agendas;
        // } else {
        //     return $this->findAll();
        // }

        if ($userRole === 'superadmin') {
            $query = $this->findAll();
            return $query;
        } else {
            $builder = $this->table('agendarapats');
            $builder->select('agendarapats.*, admins.slug as admin_slug');
            $builder->join('admins', 'admins.id_admin = agendarapats.id_admin');
            $builder->where('admins.id_instansi', session()->get('id_instansi'));
            $query = $builder->get()->getResultArray();
            // dd($query);
            return $query;
        }

        // if ($userRole === 'admin') {
        //     // $query = $this->where('id_admin', session()->get('id_admin'))->findAll();
        //     $builder = $this->table('agendarapats');
        //     $builder->select('*');
        //     $builder->join('admins', 'admins.id_admin = agendarapats.id_admin');
        //     $builder->where('admins.id_instansi', session()->get('id_instansi'));
        //     $query = $builder->get()->getResultArray();
        //     return $query;
        // } elseif ($userRole === 'operator') {
        //     $builder = $this->table('agendarapats');
        //     $builder->select('*');
        //     $builder->join('admins', 'admins.id_admin = agendarapats.id_admin');
        //     $builder->where('admins.id_instansi', session()->get('id_instansi'));
        //     $query = $builder->get()->getResultArray();
        //     return $query;
        // }
    }

    function getAgendaRapatByID()
    {
        $id_admin = session()->get('id_admin');
        $builder = $this->table('agendarapats');
        $builder->select('*');
        $builder->where('id_admin', $id_admin);
        $query = $builder->get()->getResultArray();

        return $query;
    }

    // get agenda rapat by kode_rapat
    function getAgendaRapatByKode($kodeRapat)
    {
        $query = $this->where('kode_rapat', $kodeRapat)->first();
        // dd($query);
        if ($query != null) {
            return $query;
        } else {
            return false;
        }

        return $query;
    }

    // get id agenda sementara
    function getAgendaRapatByField($idAgenda)
    {
        $query = $this->where('id_agenda', $idAgenda)->first();
        // dd($query);
        if ($query != null) {
            return $query;
        } else {
            return false;
        }

        return $query;
    }

    function getAllAgenda()
    {
        $query = $this->findAll();
        return $query;
    }
}
