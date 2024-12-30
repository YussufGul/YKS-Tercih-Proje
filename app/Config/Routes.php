<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// Auto Routing is enabled for flexibility, but consider disabling in production
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Ana sayfa
$routes->match(['get', 'post'], '/', 'Home::index'); // Ana sayfa yönlendirmesi
$routes->match(['get', 'post'], 'home', 'Home::index'); // Home sayfası

// Home Controller Yönlendirmeleri
$routes->match(['get', 'post'], 'home/about2', 'Home::about'); // Hakkında sayfası
$routes->match(['get', 'post'], 'home/tips', 'Home::tips'); // İpuçları sayfası
$routes->match(['get', 'post'], 'home/contact', 'Home::contact'); // İletişim sayfası
$routes->match(['get', 'post'], 'seo-title', 'Home::seoFriendlyTitle'); // SEO dostu başlık örneği
$routes->match(['get', 'post'], 'pascal-case', 'Home::pascalizeExample'); // PascalCase örneği
$routes->match(['get', 'post'], 'base-url', 'Home::getBaseURL'); // Temel URL
$routes->match(['get', 'post'], 'dynamic-link', 'Home::createAnchor'); // Dinamik bağlantı
$routes->match(['get', 'post'], 'word-limit', 'Home::limitedText'); // Metin sınırlandırma
$routes->match(['get', 'post'], 'home/ogretmenler', 'Home::ogretmenler'); // Öğretmenler sayfası

// LoginController Yönlendirmeleri
$routes->match(['get', 'post'], 'login', 'LoginController::login'); // Giriş formu
$routes->match(['get', 'post'], 'auth/login', 'LoginController::handleLogin'); // Giriş işlemi
$routes->match(['get', 'post'], 'register', 'LoginController::register'); // Kayıt formu
$routes->match(['get', 'post'], 'auth/register', 'LoginController::handleRegister'); // Kayıt işlemi
$routes->match(['get', 'post'], 'logout', 'LoginController::logout'); // Oturum kapatma

// Admin Routes
$routes->group('admin', ['filter' => 'admin'], function($routes) {
    $routes->get('/', 'Admin::index'); // Admin Dashboard
    $routes->get('create', 'Admin::create'); // Öğretmen Ekleme Formu
    $routes->post('store', 'Admin::store'); // Öğretmen Ekleme İşlemi
    $routes->get('edit/(:segment)', 'Admin::edit/$1'); // Öğretmen Düzenleme Formu
    $routes->post('update/(:segment)', 'Admin::update/$1'); // Öğretmen Güncelleme İşlemi
    $routes->get('delete/(:segment)', 'Admin::delete/$1'); // Öğretmen Silme İşlemi
});

// Test ve Dinamik İşlemler
$routes->match(['get', 'post'], 'test/(:any)', 'Home::test/$1'); // Test fonksiyonu 

/**
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
