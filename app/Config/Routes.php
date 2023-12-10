<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index');

$routes->group("drivers", function ($routes) {
    $routes->get('/', 'Driver::index');
    $routes->get('show/(:any)', 'Driver::index/$1');
    $routes->get('news', 'Driver::news');
    $routes->get('(:any)', 'Driver::profile/$1');
});

$routes->group("config", function ($routes) {
    $routes->get('/', 'Config::index');
    $routes->group("utilizador", function ($routes) {
        $routes->get('/', 'Config::utilizador');
        $routes->get('/(:any)', 'Config::utilizador/$1');
    });
    $routes->get('', 'Vehicle::news');
});

$routes->group("user", function ($routes) {
    $routes->get('/', 'User::index');
    $routes->get('news', 'User::news');
    $routes->get('(:num)', 'User::profile/$1');
});
