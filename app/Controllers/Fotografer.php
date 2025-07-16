<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FotograferModel;

class Fotografer extends BaseController
{
    public function index()
    {
        $m = new FotograferModel();
        $data['fotografer'] = $m->orderBy('nama', 'ASC')->findAll();
        return view('admin/fotografer', $data);
    }

    public function tambah()
    {
        $file = $this->request->getFile('foto');
        $namaFile = '';
        if ($file && $file->isValid()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/fotografer', $namaFile);
        }
        (new FotograferModel())->insert([
            'nama' => $this->request->getPost('nama'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'email' => $this->request->getPost('email'),
            'status' => $this->request->getPost('status'),
            'alamat' => $this->request->getPost('alamat'),
            'foto' => $namaFile ? '/uploads/fotografer/' . $namaFile : null,
        ]);
        return redirect()->back()->with('success', 'Fotografer ditambahkan');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $file = $this->request->getFile('foto');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'email' => $this->request->getPost('email'),
            'status' => $this->request->getPost('status'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        if ($file && $file->isValid()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/fotografer', $namaFile);
            $data['foto'] = '/uploads/fotografer/' . $namaFile;
        }
        (new FotograferModel())->update($id, $data);
        return redirect()->back()->with('success', 'Data fotografer diperbarui');
    }
    public function delete($id)
    {
        $m = new FotograferModel();
        $fotografer = $m->find($id);

        // Hapus file foto dari folder jika ada
        if ($fotografer && $fotografer['foto']) {
            $path = FCPATH . ltrim($fotografer['foto'], '/');
            if (file_exists($path)) {
                unlink($path);
            }
        }

        // Hapus data dari database
        $m->delete($id);
        return redirect()->back()->with('success', 'Fotografer berhasil dihapus');
    }
}
