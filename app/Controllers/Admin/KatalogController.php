<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaketModel;
use App\Models\PaketDetailModel;

class KatalogController extends BaseController
{
    protected $paketModel;
    protected $paketDetailModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
        $this->paketDetailModel = new PaketDetailModel();
    }

    public function index()
    {
        $paket = $this->paketModel->findAll();

        return view('admin/katalog/index', [
            'paket' => $paket
        ]);
    }

    public function edit($id)
    {
        $paket = $this->paketModel->find($id);
        $detail = $this->paketDetailModel->where('paket_id', $id)->findAll();

        return view('admin/katalog/edit', [
            'paket' => $paket,
            'detail' => $detail
        ]);
    }

    public function update($id)
    {
        $this->paketModel->update($id, [
            'nama_paket' => $this->request->getPost('nama_paket'),
            'harga' => $this->request->getPost('harga')
        ]);

        // Hapus deskripsi lama
        $this->paketDetailModel->where('paket_id', $id)->delete();

        // Masukkan deskripsi baru
        $deskripsi = $this->request->getPost('deskripsi');
        foreach ($deskripsi as $d) {
            if (!empty($d)) {
                $this->paketDetailModel->insert([
                    'paket_id' => $id,
                    'deskripsi' => $d
                ]);
            }
        }

        return redirect()->to('/admin/katalog')->with('success', 'Paket berhasil diupdate');
    }
}
