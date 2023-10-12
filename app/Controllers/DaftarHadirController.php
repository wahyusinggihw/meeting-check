<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DaftarHadirModel;

class DaftarHadirController extends BaseController
{
    protected $daftarhadir;
    public function __construct()
    {
        $this->daftarhadir = new DaftarHadirModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Hadir',
            'data' => $this->daftarhadir->getDaftarHadir()

        ];
        return view('dashboard/daftar_hadir', $data);
    }
}
