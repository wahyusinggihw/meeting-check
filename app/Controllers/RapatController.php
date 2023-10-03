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
}
