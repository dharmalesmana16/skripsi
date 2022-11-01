<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(false);
$routes->group('signin', ['filter' => 'redauth'], function ($routes) {
  $routes->get('/', 'Auth::login');
  $routes->post('/', 'Auth::authlogin');
});
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$db = \Config\Database::connect();
$query_metadevice = $db->query("SELECT meta FROM datadevice");
$query_metalampu = $db->query("SELECT meta FROM datalampu");
$result = $query_metadevice->getResultArray();  

foreach ($result as $devices){


  # code...
  $routes->get('/monitoring/(:any)', 'menudevice::index/$1');


} 
$result_metalampu = $query_metalampu->getResultArray();
foreach ($result_metalampu as $devices){
  # code...
  $routes->get('/monitoringlamp/(:any)', 'menumonitoring::index/$1');
} 
$routes->resource("device");
$routes->resource("user");
$routes->resource("lamp");

// $routes->get('/api/getlastdata','Antares::getData');
// $routes->post('/api/getall','Antares::getall');
$routes->post('/api/storedata','Antares::executeaction');
$routes->get('/api/getdata/(:any)','Antares::getDataByDevice/$1');



// API
$routes->get("/api/getDataTemp","Api::getDataTemp");
$routes->get("/api/getDataTempByDevice/(:any)","Api::getDataTempByDevice/$1");
$routes->post("/api/lampControlTimer","Api::lampControlTimer");
$routes->post("/api/lampControlManual","Api::lampControlManual");

// Auth

$routes->get('/signin','Auth::login');
$routes->get('/logout','Auth::logout');
$routes->get('/signup','Auth::registrasi');
$routes->post('/authsignin','Auth::authlogin');
$routes->post('/signup','Auth::authregistrasi');

$routes->group('control', ['filter' => 'auth'], function ($routes) {
  $routes->get('/', 'Control::index');
});
$routes->group('setting', ['filter' => 'auth'], function ($routes) {
  $routes->get('/', 'Control::index');
});

// $routes->get('/control','Control::index');
$routes->get('/setting/(:any)','Control::editSetting/$1');
$routes->post('/setting/(:any)','Control::updateSetting/$1');
/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

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
