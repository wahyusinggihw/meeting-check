<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/auth', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/agenda-rapat', 'Dashboard::agenda');
$routes->get('/formabsensi', 'Home::formabsensi');
