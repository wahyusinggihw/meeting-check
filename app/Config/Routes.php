<?php

use CodeIgniter\Router\RouteCollection;
use JetBrains\PhpStorm\NoReturn;

/**
 * @var RouteCollection $routes
 */

// auth
$routes->group('auth', function ($routes) {
    $routes->match(['get', 'post'], 'login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});

// Rapat
$routes->get('/', 'Home::index');
$routes->post('/submit-kode', 'Home::submitKode');
// $routes->match(['get', 'post'], '/submit-kode/form-absensi/tamu', 'RapatController::formTamu', ['filter' => 'cekkode']);
$routes->get('/submit-kode/form-absensi/tamu', 'RapatController::formTamu', ['filter' => 'cekkode']);
$routes->post('/submit-kode/form-absensi/tamu/store', 'RapatController::tamuStore');
$routes->get('/submit-kode/form-absensi/pegawai', 'RapatController::formPegawai',);
$routes->post('/submit-kode/form-absensi/pegawai/store', 'RapatController::pegawaiStore');
// $routes->match(['get', 'post'], '/submit-kode/form-absensi/pegawai', 'RapatController::formPegawai', ['filter' => 'cekkode']);

// API
$routes->resource('api/instansi', ['controller' => 'Api\RapatControllerAPI']);

// validasi
$routes->get('berhasil', 'RapatController::berhasil', ['filter' => 'cekkode']);

$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('agenda-rapat', 'Dashboard::agenda');
    $routes->get('daftar-hadir', 'Dashboard::daftarHadir');
    $routes->post('daftar-hadir/cari', 'DaftarHadirController::cariDaftarHadir');

    $routes->get('agenda-rapat/tambah-agenda', 'AgendaRapat::tambahAgenda');
    $routes->post('agenda-rapat/tambah-agenda/store', 'AgendaRapat::store');

    $routes->get('agenda-rapat/view-agenda/(:segment)', 'AgendaRapat::view/$1');

    $routes->get('agenda-rapat/edit-agenda/(:segment)', 'AgendaRapat::edit/$1');
    $routes->post('agenda-rapat/edit-agenda/(:segment)/update', 'AgendaRapat::update/$1');
    $routes->post('delete-agenda/(:segment)', 'AgendaRapat::delete/$1');

    $routes->get('kelola-admin', 'AdminController::index');
    $routes->match(['get', 'post'], 'kelola-admin/tambah-admin', 'AdminController::tambahAdmin');
    $routes->get('kelola-admin/edit-admin/(:segment)', 'AdminController::edit/$1');
    $routes->post('kelola-admin/edit-admin/(:segment)/update', 'AdminController::update/$1');
    $routes->post('delete-admin/(:segment)', 'AdminController::delete/$1');
});

$routes->get('/home/login', 'Auth::login');
$routes->get('/home/peran', 'RapatController::peran');
$routes->get('/formpegawai', 'RapatController::formPegawai');
$routes->get('/formtamu', 'RapatController::formTamu');

$routes->get('/berhasil', 'RapatController::berhasil');
$routes->get('/gagal', 'RapatController::gagal');
$routes->get('dashboard/agenda-kosong', 'Dashboard::agendaKosong');
