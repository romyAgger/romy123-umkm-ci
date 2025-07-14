<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', fn() => redirect()->to('/umkm'));

$routes->group('umkm', function($routes) {
    $routes->get('/', 'Umkm::index');
    $routes->get('create', 'Umkm::create');
    $routes->post('store', 'Umkm::store');
    $routes->get('edit/(:num)', 'Umkm::edit/$1');
    $routes->post('update/(:num)', 'Umkm::update/$1');
    $routes->post('delete/(:num)', 'Umkm::delete/$1');
});
