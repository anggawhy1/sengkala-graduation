<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\FotograferModel;

class Jadwal extends BaseController
{
    public function index()
    {
        $tanggal = $this->request->getGet('tanggal');

        $pesananModel = new PesananModel();
        $fotograferModel = new FotograferModel();

        $builder = $pesananModel->orderBy('tanggal_sesi', 'DESC')->orderBy('sesi', 'ASC');

        if (!empty($tanggal)) {
            $builder->where('tanggal_sesi', $tanggal);
        }

        $jadwalRaw = $builder->findAll();
        $fotograferList = $fotograferModel->findAll();

        // 🔍 Buat map fotografer by ID
        $fotograferMap = [];
        foreach ($fotograferList as $f) {
            $fotograferMap[$f['id']] = $f;
        }

        // Map jadwal untuk dikirim ke view
        $jadwal = array_map(function ($row) use ($fotograferMap) {
            $fotografer = $fotograferMap[$row['fotografer_id']] ?? null;

            return [
                'id' => $row['id'],
                'sesi' => $row['sesi'],
                'fotografer_id' => $row['fotografer_id'],
                'jam' => $row['waktu'],
                'klien' => $row['nama_lengkap'],
                'asal_universitas' => $row['asal_universitas'],
                'lokasi' => $row['lokasi'],
                'tanggal' => $row['tanggal_sesi'],
                'instagram' => $row['instagram'],
                'kontak_fotografer' => $fotografer['whatsapp'] ?? '',
                'kontak_klien' => $row['whatsapp'] ?? '',
            ];
        }, $jadwalRaw);

        return view('admin/jadwal', [
            'jadwal' => $jadwal,
            'fotograferList' => $fotograferList,
        ]);
    }

    public function perbarui()
    {
        $jadwalData = $this->request->getPost('jadwal');
        $tanggal = $this->request->getPost('tanggal');
        $pesananModel = new PesananModel();

        foreach ($jadwalData as $data) {
            if (!empty($data['fotografer_id'])) {
                $pesananModel->update($data['id'], [
                    'fotografer_id' => $data['fotografer_id'],
                    'waktu' => $data['jam'] ?? null,
                ]);
            }
        }

        return redirect()->to('/admin/jadwal?tanggal=' . $tanggal)
            ->with('success', 'Jadwal berhasil diperbarui.');
    }
}
