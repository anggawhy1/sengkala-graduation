<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index()
    {
        $data['user'] = [
            'nama' => 'Angga Mahendra',
            'username' => 'anggakode',
            'email' => 'angga@mail.com',
            'nohp' => '089567812345',
            'foto' => 'default.png',
        ];

        return view('profil', $data);
    }

    public function update()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = 'default.png';

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/', $namaFoto);
        }

        // Contoh update ke database (disini dummy aja)
        // $model->update($id_user, [...]);

        session()->setFlashdata('success', 'Profil berhasil diperbarui.');
        return redirect()->to(base_url('profil'));
    }
}
