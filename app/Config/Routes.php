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

$routes->get('cek', 'Cek::index');
$routes->post('cek', 'Cek::proses');
$routes->get('cek_detail', 'Cek::detail');

$routes->get('/pesan', 'Pemesanan::index');
$routes->post('/pesan/simpan', 'Pemesanan::simpan');
$routes->get('/pesan/cek-jadwal', 'Pemesanan::cekJadwal'); // untuk ajax cek tanggal

$routes->get('admin/dashboard', 'Dashboard::index');
$routes->get('admin/fotografer', 'Fotografer::index');
$routes->get('admin/opm/pesanan', 'Pesanan::index');
$routes->get('admin/opm/pesanan/detail/(:any)', 'Pesanan::detail/$1');

$routes->get('/admin/opm/pembayaran', 'Pembayaran::index');
$routes->get('/admin/opm/pembayaran/(:segment)', 'Pembayaran::detail/$1');
$routes->post('/admin/opm/pembayaran/update/(:segment)', 'Pembayaran::updateStatus/$1');

$routes->get('/admin/jadwal', 'Jadwal::jadwal');
$routes->post('/admin/jadwal/perbarui', 'Jadwal::updateJadwal');
$routes->get('/admin/opm/riwayat', 'Pesanan::riwayat');

$routes->get('/admin/opm/pesanan-aktif', 'Pesanan::aktif');
$routes->post('/admin/opm/pesanan-aktif/update', 'Pesanan::updateStatus');

$routes->get('notifikasi', 'Notifikasi::index');
$routes->get('profil', 'Profil::index');
$routes->post('profil/update', 'Profil::update');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::process');













