<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index');

$routes->group("vehicles", function ($routes) {
    $routes->get('/', 'Vehicle::index');
    $routes->get('news', 'Vehicle::news');
    $routes->get('(:num)', 'Vehicle::profile/$1');
});

$routes->group("config", function ($routes) {
    $routes->get('/', 'Config::index');
    $routes->get('news', 'Vehicle::news');
});

$routes->group("user", function ($routes) {
    $routes->get('/', 'User::index');
    $routes->get('news', 'User::news');
    $routes->get('(:num)', 'User::profile/$1');
});