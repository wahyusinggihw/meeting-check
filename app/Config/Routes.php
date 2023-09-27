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
<<<<<<< HEAD
$routes->get('/formabsensi', 'Home::formabsensi');
=======
$routes->get('/homeuser', 'DashboardUser::index');
>>>>>>> 4c54e295d507b47f357f5c2d771ad9181147190a
