<?php

namespace App\Controllers;

use App\Models\PesananModel;

class Notifikasi extends BaseController
{
    public function index()
    {
        $pesananModel = new PesananModel();
        $data['notifikasi'] = $pesananModel->getNotifikasiPesananBaru();

        return view('admin/notifikasi', $data);
    }

    public function tandaiSemuaSudahDibaca()
    {
        $pesananModel = new PesananModel();
        $pesananModel->tandaiSemuaSudahDibaca();

        return redirect()->to('/admin/notifikasi');
    }
}
