<?php

use JetBrains\PhpStorm\NoReturn;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Auth Admin
$routes->group('auth', function ($routes) {
    $routes->match(['get', 'post'], 'login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});

// Rapat landing page
$routes->get('/', 'Home::index');
$routes->post('/submit-kode/form-absensi', 'Home::submitKode');

// revisi form absensi
$routes->get('/submit-kode/form-absensi', 'RapatController::formAbsensi', ['filter' => 'cekkode']);
$routes->post('/submit-kode/form-absensi/store', 'RapatController::absenStore');

// share rapat qr code
$routes->get('/submit-kode/form-absensi/qr/(:segment)', 'RapatController::formAbsensi/$1');
$routes->get('/informasi-rapat/(:segment)', 'Dashboard\AgendaRapat::informasiRapat/$1');
$routes->get('/cetak-rapat/(:segment)', 'Dashboard\AgendaRapat::generatePdf/$1');


// JQUERY PESERTA RAPAT
$routes->get('api/peserta/(:segment)', 'Api\UsersControllerAPI::getPeserta/$1');
$routes->get('api/pegawai/(:segment)', 'Api\UsersControllerAPI::getPegawai/$1');
$routes->get('api/pegawai/asn/(:segment)', 'Api\UsersControllerAPI::getPegawaiAsn/$1');
$routes->get('api/pegawai/non-asn/(:segment)', 'Api\UsersControllerAPI::getPegawaiNonAsn/$1');
$routes->post('api/save-signature', 'RapatController::saveSignatureData');


// API Mobile App
$routes->group('api', ['filter' => 'basicAuth'], function ($routes) {
    // Route mobile
    $routes->post('login', "Api\AuthControllerAPI::login");
    $routes->get('agenda-rapat/(:segment)', 'Api\AgendaRapatControllerAPI::index/$1');
    // $routes->resource('agenda-rapat', ['controller' => 'Api\AgendaRapatControllerAPI']);
    // $routes->resource('rapat', ['controller' => 'Api\RapatControllerAPI']);
    $routes->post('form-absensi-store', 'Api\RapatControllerAPI::absenStore');
    // route untuk get agenda rapat
    // route untuk post daftar hadir
});

// validasi
$routes->get('berhasil', 'RapatController::berhasil', ['filter' => 'cekkode']);

// Dashboard
$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Dashboard\Dashboard::index', ['filter' => 'admin']);
    $routes->get('agenda-rapat', 'Dashboard\Dashboard::agenda');
    $routes->get('view-detail-by-instansi/(:segment)', 'Dashboard\Dashboard::viewDetailAgendaRapatByInstansi/$1');
    // $routes->get('daftar-hadir', 'Dashboard\Dashboard:daftarHadir');
    $routes->get('agenda-rapat/daftar-hadir/(:segment)', 'Dashboard\DaftarHadirController::cariDaftarHadir/$1');
    $routes->post('agenda-rapat/daftar-hadir/delete-peserta/(:segment)', 'Dashboard\DaftarHadirController::delete/$1');

    $routes->get('agenda-rapat/tambah-agenda', 'Dashboard\AgendaRapat::tambahAgenda');
    $routes->post('agenda-rapat/tambah-agenda/store', 'Dashboard\AgendaRapat::store');

    $routes->get('agenda-rapat/view-agenda/(:segment)', 'Dashboard\AgendaRapat::view/$1');
    $routes->get('agenda-rapat/view-agenda/(:segment)/generate-pdf', 'Dashboard\AgendaRapat::generatePdf/$1');

    $routes->get('agenda-rapat/edit-agenda/(:segment)', 'Dashboard\AgendaRapat::edit/$1');
    $routes->post('agenda-rapat/edit-agenda/(:segment)/update', 'Dashboard\AgendaRapat::update/$1');
    $routes->post('delete-agenda/(:segment)', 'Dashboard\AgendaRapat::delete/$1');

    $routes->get('profile', 'Dashboard\UsersController::index');
    $routes->get('profile/edit-profile/(:segment)', 'Dashboard\UsersController::edit/$1');
    $routes->post('profile/edit-profile/(:segment)', 'Dashboard\UsersController::update/$1');
    $routes->get('profile/edit-profilepassword/(:segment)', 'Dashboard\UsersController::editPassword/$1');
    $routes->post('profile/edit-profilepassword/(:segment)', 'Dashboard\UsersController::updatePassword/$1');

    $routes->group('kelola-admin', ['filter' => 'admin'], function ($routes) {
        $routes->get('/', 'Dashboard\AdminController::index');
        $routes->match(['get', 'post'], 'tambah-admin', 'Dashboard\AdminController::tambahAdmin');
        $routes->get('edit-admin/(:segment)', 'Dashboard\AdminController::edit/$1');
        $routes->post('edit-admin/(:segment)/update', 'Dashboard\AdminController::update/$1');
        $routes->post('delete-admin/(:segment)', 'Dashboard\AdminController::delete/$1');
    });

    $routes->get('kelola-bidang', 'Dashboard\BidangInstansiController::index');
    $routes->match(['get', 'post'], 'kelola-bidang/tambah-bidang', 'Dashboard\BidangInstansiController::tambahBidang');
    $routes->get('kelola-bidang/edit-bidang/(:segment)', 'Dashboard\BidangInstansiController::edit/$1');
    $routes->post('kelola-bidang/edit-bidang/(:segment)/update', 'Dashboard\BidangInstansiController::update/$1');
    $routes->post('kelola-bidang/delete-bidang/(:segment)', 'Dashboard\BidangInstansiController::delete/$1');
    // $routes->get('kelola-admin', 'Dashboard\AdminController::index');
    // $routes->match(['get', 'post'], 'kelola-admin/tambah-admin', 'Dashboard\AdminController::tambahAdmin');
    // $routes->get('kelola-admin/edit-admin/(:segment)', 'Dashboard\AdminController::edit/$1');
    // $routes->post('kelola-admin/edit-admin/(:segment)/update', 'Dashboard\AdminController::update/$1');
    // $routes->post('delete-admin/(:segment)', 'Dashboard\AdminController::delete/$1');
});

$routes->get('/home/login', 'Auth::login');
$routes->get('/home/peran', 'RapatController::peran');
$routes->get('/formpegawai', 'RapatController::formPegawai');
$routes->get('/formtamu', 'RapatController::formTamu');

$routes->get('/berhasil', 'RapatController::berhasil');
$routes->get('/gagal', 'RapatController::gagal');
$routes->get('dashboard/agenda-kosong', 'Dashboard::agendaKosong');
$routes->get('/informasi-rapat', 'Auth::informasiRapat');

// Route View Tester
$routes->get('/tester', 'Auth::tester');
$routes->get('/tester', 'Auth::tester');
