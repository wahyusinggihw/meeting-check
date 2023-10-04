<?php

namespace App\Controllers;

class RapatController extends BaseController
{
    public function peran(): string
    {
        $data = [
            'title' => 'Pemilihan Peran'
        ];

        return view('peran', $data);
    }

    public function formAbsensi()
    {
        $data = [
            'title' => 'Form Absensi'
        ];

        return view('form_absensi', $data);
    }

    public function store()
    {
        $input = $this->request->getPost();
        if ($input = $this->request->getPost()) {
            d($input);
        }
    }
}
