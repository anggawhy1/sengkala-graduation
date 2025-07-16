<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $adminModel = new \App\Models\AdminModel();
        $admin = $adminModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            // Login success
            session()->set('admin_id', $admin['id']);
            session()->set('username', $admin['username']);
            return redirect()->to('admin/dashboard'); // ganti sesuai tujuan
        } else {
            // Login gagal
            return redirect()->back()->withInput()->with('error', 'Username atau Password salah!');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
