<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->match(['GET', 'POST'], '/auth/login', 'Auth::login');

$routes->group('dashboard', function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('agenda-rapat', 'Dashboard::agenda');
    $routes->get('daftar-peserta', 'Dashboard::daftarpeserta');

    $routes->get('tambah-agenda', 'AgendaRapat::tambahAgenda');
    $routes->post('tambah-agenda/store', 'AgendaRapat::store');

    $routes->get('edit-agenda/(:segment)', 'AgendaRapat::edit/$1');
    // $routes->match(['GET', 'POST'], 'edit-agenda/update', 'AgendaRapat::update');
    $routes->post('edit-agenda/update/(:segment)', 'AgendaRapat::update/$1');
});
