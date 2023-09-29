<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendaRapatModel;

class AgendaRapat extends BaseController
{
    public function editAgenda($id)
    {
        $agendaRapat = new AgendaRapatModel();
        $data = $agendaRapat->find($id);
        return view('dashboard/edit_agenda', ['data' => $data]);
    }
}
