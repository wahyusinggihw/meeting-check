<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->match(['GET', 'POST'], '/auth/login', 'Auth::login');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/agenda-rapat', 'Dashboard::agenda');
$routes->post('/dashboard/agenda-rapat/save', 'Dashboard::saveAgenda');
$routes->get('/dashboard/daftar-peserta', 'Dashboard::daftarpeserta');
