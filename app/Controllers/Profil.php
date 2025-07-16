<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Profil extends BaseController
{
    public function index()
    {
        $adminModel = new AdminModel();
        $adminId = session()->get('admin_id');

        $data['user'] = $adminModel->find($adminId);
        return view('admin/profil', $data); // Pastikan path view benar
    }

    public function update()
    {
        $adminModel = new AdminModel();
        $id = session()->get('admin_id');

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
            'email'        => $this->request->getPost('email'),
            'no_hp'     => $this->request->getPost('no_hp'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('uploads', $fotoName);
            $data['foto'] = $fotoName;
        }

        $adminModel->update($id, $data);

        session()->set('admin', $adminModel->find($id));
        return redirect()->to('admin/profil')->with('success', 'Profil berhasil diperbarui!');
    }
}
