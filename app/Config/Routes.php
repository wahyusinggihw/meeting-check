<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->match(['GET', 'POST'], '/auth/login', 'Auth::login');

$routes->group('dashboard', function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('agenda-rapat', 'Dashboard::agenda');
    $routes->post('agenda-rapat/save', 'Dashboard::saveAgenda');
    $routes->get('daftar-peserta', 'Dashboard::daftarpeserta');
    $routes->get('form-agenda', 'Dashboard::formagenda');

    $routes->get('edit-agenda/(:segment)', 'AgendaRapat::editAgenda/$1');
});
