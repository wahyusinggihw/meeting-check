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

    $routes->get('agenda-rapat/tambah-agenda', 'AgendaRapat::tambahAgenda');
    $routes->post('agenda-rapat/tambah-agenda/store', 'AgendaRapat::store');

    $routes->get('agenda-rapat/edit-agenda/(:segment)', 'AgendaRapat::edit/$1');
    // $routes->match(['GET', 'POST'], 'edit-agenda/update', 'AgendaRapat::update');
    $routes->post('agenda-rapat/edit-agenda/(:segment)/update', 'AgendaRapat::update/$1');
    $routes->post('delete-agenda/(:segment)', 'AgendaRapat::delete/$1');
});
