<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('welcome_message', 'Home::index');
$routes->get('galeri', 'Galeri::index');
$routes->get('katalog', 'Katalog::index');
$routes->get('tentang', 'Tentang::index');
$routes->get('hubungi', 'Hubungi::index');
$routes->get('/pesan', 'Pemesanan::index');
$routes->post('/pesan/simpan', 'Pemesanan::simpan');
$routes->get('/pesan/cek-jadwal', 'Pemesanan::cekJadwal');
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');
    // OPM
    $routes->get('opm/pesanan', 'Pesanan::index');
    $routes->get('opm/pesanan/detail/(:any)', 'Pesanan::detail/$1');
    $routes->get('opm/pembayaran', 'Pembayaran::index');
    $routes->get('opm/pembayaran/(:segment)', 'Pembayaran::detail/$1');
    $routes->post('opm/pesanan/konfirmasi/(:segment)', 'Pesanan::konfirmasi/$1');
    $routes->post('opm/pembayaran/update/(:segment)', 'Pembayaran::updateStatus/$1');
    $routes->get('opm/pesanan-aktif', 'PesananAktif::index');
    $routes->post('opm/pesanan-aktif/status', 'PesananAktif::status');
    $routes->post('opm/pesanan-aktif/drive', 'PesananAktif::drive');
    $routes->get('fotografer', 'Fotografer::index');
    $routes->post('fotografer/tambah', 'Fotografer::tambah');
    $routes->post('fotografer/update', 'Fotografer::update');
    $routes->get('fotografer/delete/(:num)', 'Fotografer::delete/$1');
    // Jadwal
    $routes->get('jadwal', 'Admin\Jadwal::index');
    $routes->post('jadwal/perbarui', 'Admin\Jadwal::perbarui');
    $routes->get('notifikasi', 'Notifikasi::index');
    $routes->get('notifikasi/tandaiSemuaSudahDibaca', 'Notifikasi::tandaiSemuaSudahDibaca');
    $routes->get('profil', 'Profil::index');
    $routes->post('profil/update', 'Profil::update');
    $routes->get('opm/riwayat', 'Riwayat::index');
    $routes->post('opm/pesanan/tolak/(:segment)', 'Pesanan::tolak/$1');
    //Katalog
    $routes->get('katalog', 'Admin\KatalogController::index');
    $routes->get('katalog/edit/(:num)', 'Admin\KatalogController::edit/$1');
    $routes->post('katalog/update/(:num)', 'Admin\KatalogController::update/$1');
});
// Login & Logout
$routes->get('/login', 'Auth::login', ['filter' => 'noauth']);
$routes->post('/login/proses', 'Auth::loginProcess', ['filter' => 'noauth']);
$routes->get('/logout', 'Auth::logout');
$routes->get('/cek', 'Cek::index');
$routes->post('/cek', 'Cek::proses');
$routes->get('/cek_detail/(:segment)', 'Cek::detail/$1');
$routes->post('/unggah_bukti', 'Cek::unggahBukti');
$routes->get('invoice/(:segment)', 'Cek::cetakInvoice/$1');





























// $routes->get('admin/dashboard', 'Dashboard::index');
// $routes->get('admin/fotografer', 'Fotografer::index');
// $routes->get('admin/opm/pesanan', 'Pesanan::index');
// $routes->get('admin/opm/pesanan/detail/(:any)', 'Pesanan::detail/$1');

// $routes->get('/admin/opm/pembayaran', 'Pembayaran::index');
// $routes->get('/admin/opm/pembayaran/(:segment)', 'Pembayaran::detail/$1');
// $routes->post('/admin/opm/pembayaran/update/(:segment)', 'Pembayaran::updateStatus/$1');

// $routes->get('/admin/jadwal', 'Jadwal::jadwal');
// $routes->post('/admin/jadwal/perbarui', 'Jadwal::updateJadwal');
// $routes->get('/admin/opm/riwayat', 'Pesanan::riwayat');

// $routes->get('/admin/opm/pesanan-aktif', 'Pesanan::aktif');
// $routes->post('/admin/opm/pesanan-aktif/update', 'Pesanan::updateStatus');

// $routes->get('notifikasi', 'Notifikasi::index');
// $routes->get('profil', 'Profil::index');
// $routes->post('profil/update', 'Profil::update');

// $routes->get('/login', 'Login::index');
// $routes->post('/login', 'Login::process');

// $routes->get('/login', 'Auth::login');
// $routes->post('/login/proses', 'Auth::loginProcess');
// $routes->get('/logout', 'Auth::logout');
