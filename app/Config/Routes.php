<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->group('auth', function ($routes) {
    $routes->match(['GET', 'POST'], 'login', 'Auth::login');
    $routes->get('logout', 'Auth::logout');
});

$routes->get('/', 'Home::index');
$routes->post('/submit-kode', 'Home::submitKode');
$routes->get('/submit-kode/form-absensi/(:segment)', 'RapatController::formPegawai/$1');
$routes->post('/submit-kode/form-absensi/store', 'Rapat::store/$1');

// $routes->match(['GET', 'POST'], '/auth/login', 'Auth::login');

$routes->group('dashboard', function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('agenda-rapat', 'Dashboard::agenda');
    $routes->get('daftar-peserta', 'Dashboard::daftarpeserta');

    $routes->get('agenda-rapat/tambah-agenda', 'AgendaRapat::tambahAgenda');
    $routes->post('agenda-rapat/tambah-agenda/store', 'AgendaRapat::store');

    $routes->get('agenda-rapat/view-agenda/(:segment)', 'AgendaRapat::view/$1');

    $routes->get('agenda-rapat/edit-agenda/(:segment)', 'AgendaRapat::edit/$1');
    // $routes->match(['GET', 'POST'], 'edit-agenda/update', 'AgendaRapat::update');
    $routes->post('agenda-rapat/edit-agenda/(:segment)/update', 'AgendaRapat::update/$1');
    $routes->post('delete-agenda/(:segment)', 'AgendaRapat::delete/$1');
});

$routes->get('/home/login', 'Auth::login');
$routes->get('/home/peran', 'RapatController::peran');
$routes->get('/formpegawai', 'RapatController::formPegawai');
$routes->get('/formtamu', 'RapatController::formTamu');
