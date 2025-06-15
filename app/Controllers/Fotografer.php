<?php

// app/Controllers/Fotografer.php
namespace App\Controllers;

use App\Controllers\BaseController;

class Fotografer extends BaseController
{
    public function index()
    {
        // Dummy data fotografer
        $data['fotografer'] = [
            [
                'nama' => 'Nugroho',
                'whatsapp' => '+628 2354 1197',
                'email' => 'nugroho11@gmail.com',
                'status' => 'Aktif',
                'sesi' => 3
            ],
            [
                'nama' => 'Linda',
                'whatsapp' => '+628 5875 7654',
                'email' => 'linda.99@gmail.com',
                'status' => 'Tidak Aktif',
                'sesi' => 1
            ],
            [
                'nama' => 'Bimbim',
                'whatsapp' => '+628 5875 9089',
                'email' => 'bimmbimo@gmail.com',
                'status' => 'Aktif',
                'sesi' => 4
            ]
        ];

        return view('admin/fotografer', $data);
    }
}
