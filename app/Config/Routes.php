<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

/* $routes->get('/', 'Productos::index');
$routes->get('productos/create', 'Productos::create');
$routes->post('productos/store', 'Productos::store');
$routes->get('productos/edit/(:num)', 'Productos::edit/$1');
$routes->put('productos/update/(:num)', 'Productos::update/$1');
$routes->delete('productos/delete/(:num)', 'Productos::delete/$1'); */


$routes->get('/', 'Productos::index', ['filter' => 'auth']);
$routes->get('productos/create', 'Productos::create', ['filter' => 'auth']);
$routes->post('productos/store', 'Productos::store', ['filter' => 'auth']);
$routes->get('productos/edit/(:num)', 'Productos::edit/$1', ['filter' => 'auth']);
$routes->put('productos/update/(:num)', 'Productos::update/$1', ['filter' => 'auth']);
$routes->get('productos/disable/(:num)', 'Productos::disable/$1', ['filter' => 'auth']);
$routes->get('productos/enable/(:num)', 'Productos::enable/$1', ['filter' => 'auth']);
$routes->delete('productos/delete/(:num)', 'Productos::delete/$1', ['filter' => 'auth']);
$routes->get('logout', 'Productos::logout', ['filter' => 'auth']);

$routes->get('usuarios/login', 'Usuarios::login');
$routes->post('usuarios/inicioSesion', 'Usuarios::inicioSesion');
$routes->get('usuarios/register', 'Usuarios::register');
$routes->post('usuarios/registro', 'Usuarios::registro');

$routes->post('usuarios/verificar', 'Usuarios::verificar');
$routes->get('usuarios/verificar', 'Usuarios::verificarGet');
$routes->get('usuarios/reenviar', 'Usuarios::reenviarCodigo');


$routes->get('productos/generarReporteProductos', 'Productos::generarReporteProductos', ['filter' => 'auth']);

$routes->get('objetos', 'ObjetosAR::index');
$routes->get('objetos/create', 'ObjetosAR::create');
$routes->post('objetos/store', 'ObjetosAR::store');
$routes->get('objetos/edit/(:num)', 'ObjetosAR::edit/$1');
$routes->put('objetos/update/(:num)', 'ObjetosAR::update/$1');
$routes->get('objetos/disable/(:num)', 'ObjetosAR::disable/$1');
$routes->get('objetos/enable/(:num)', 'ObjetosAR::enable/$1');
$routes->delete('objetos/delete/(:num)', 'ObjetosAR::delete/$1');

$routes->post('usuarios/cambiarContrasena', 'Usuarios::cambiarContrasena', ['filter' => 'auth']);
$routes->get('usuarios/cambiarContrasena', 'Usuarios::cambiarContrasenaVista', ['filter' => 'auth']);






/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
