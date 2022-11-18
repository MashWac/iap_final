<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('Register/', 'Register::index');
$routes->add('Login/', 'Login::index');
$routes->get('Register/store', 'Register::store');
$routes->add('adminHome/', 'AdminHome::index');
$routes->add('sidemenu/', 'Side::index');
$routes->post('/addprods', 'DisplayProds::addprods');
$routes->post('/editprods', 'DisplayProds::editprods');
$routes->post('/updatecat', 'Admincats::updatecat');
$routes->get('/adminsubcats/index/(:num)','AdminSubCats::index/$1');
$routes->post('/signin','Login::signin');
$routes->add('/logout','Login::logout');
$routes->add('/newsubcat','AdminSubcats::newsubcat');
$routes->post('/insertsubcat','AdminSubCats::insertsubcat');
$routes->post('/displayprods', 'DisplayProds::index');
$routes->get('/displayusers', 'DisplayUsers::index');
$routes->post('/displayorders', 'DisplayOrders::index');
$routes->post('/product', 'Product::index');
$routes->post('/adminCats', 'Admincats::index');
$routes->get('/insertcat', 'Admincats::insertcat');
$routes->post('/products/addtocat/(:num)', 'Product::addtocart/$1');
$routes->add('/cart','Product::cart');
$routes->post('/updateQuantity','Product::updatequantity');
$routes->post('/product/deletefromcart/(:num)', 'Product::deletefromcart/$1');
$routes->add('/aboutus', 'Homepage::aboutus');
$routes->add('/shipping', 'Homepage::shipping');
$routes->add('/refunds', 'Homepage::refunds');
$routes->add('/editprofile', 'Homepage::editprofile');
$routes->post('/updatemydetails','Homepage::store');
$routes->add('/deleteaccount', 'Homepage::deleteaccount');
$routes->post('/managewallet','Homepage::managewallet');
$routes->post('/checkout','Product::checkout');
$routes->add('/checkout','Product::checkout');
$routes->add('/vieworders', 'Homepage::vieworders');

$routes->group('api',function($routes){
    $routes->group('product', function($routes){
        $routes->get('/filterproducts', 'Displayprods::filterproducts');
    });
});








$route['insertcat']="Admincats/insertcat";
$route['newcat']="Admincats/newcat";
//$route['insertsubcat']="AdminSubcats/insertsubcat";
//$route['newsubcat']="AdminSubcats/newsubcat";




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
