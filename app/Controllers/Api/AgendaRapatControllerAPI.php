<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AgendaRapatModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class AgendaRapatControllerAPI extends ResourceController
{
    use ResponseTrait;
    protected $agendaRapat;
    public function __construct()
    {
        $this->agendaRapat = new AgendaRapatModel();
    }

    public function index()
    {
        $agendaRapat = $this->agendaRapat->findAll();
        // $agendaRapatJSON = json_decode($agendaRapat);
        $result = [
            'status' => true,
            'data' => $agendaRapat
        ];
        return $this->respond($result, 200);
    }

    public function show($id = null)
    {
        $agendaRapat = $this->agendaRapat->getAgendaRapatByKode($id);
        // $agendaRapatJSON = json_decode($agendaRapat);
        $result = [
            'status' => true,
            'data' => $agendaRapat
        ];
        return $this->respond($result, 200);
    }
}
