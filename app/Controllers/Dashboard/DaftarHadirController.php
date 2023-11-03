<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\DaftarHadirModel;
use App\Models\AgendaRapatModel;

class DaftarHadirController extends BaseController
{
    protected $daftarhadir;
    protected $agendaRapat;
    public function __construct()
    {
        $this->daftarhadir = new DaftarHadirModel();
        $this->agendaRapat = new AgendaRapatModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Daftar Hadir',
            'data' => $this->daftarhadir->getDaftarHadir()

        ];
        return view('dashboard/daftar_hadir', $data);
    }

    public function cariDaftarHadir($slug)
    {
        $id_agenda = $this->agendaRapat->where('slug', $slug)->first()['id_agenda'];
        $daftarHadir = $this->daftarhadir->getDaftarHadirByID($id_agenda);

        // dd($daftarHadir);

        $data = [
            'title' => 'Daftar Hadir',
            // 'data' => $this->daftarhadir->getDaftarHadirByID($id_agenda)
            'daftar_hadir' => $daftarHadir,

        ];

        return view('dashboard/daftar_hadir', $data);
    }

    public function delete($id)
    {
        $daftarHadir = $this->daftarhadir->find($id);
        $uri = previous_url();
        if ($daftarHadir) {
            $this->deleteSignatures($daftarHadir['id_agenda_rapat']);
            $this->daftarhadir->delete($id);
            return redirect()->to($uri)->with('success', 'Data berhasil dihapus');
        }
    }

    private function deleteSignatures($idAgenda)
    {
        helper('filesystem');
        $signaturePath = FCPATH . 'uploads/signatures/';

        // Use glob to find files matching the kode_rapat
        $files = glob($signaturePath . $idAgenda . '_*');
        // dd($files);
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file); // Delete the file
            }
        }
    }
}
