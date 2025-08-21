<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setAutoRoute(true);
// Public
$routes->get('/', 'Home::index');
$routes->get('/produk', 'Home::product');
$routes->get('/produk/(:segment)', 'Home::detail/$1');
$routes->get('/produks/Kering', 'Home::kuekering');
$routes->get('/produks/Kering/Reguler', 'Home::kueKeringReguler');
$routes->get('/produks/Kering/JAR', 'Home::kueKeringJAR');
$routes->get('/produks/Kering/Kotak', 'Home::kueKeringKotak');
$routes->get('/produks/Basah', 'Home::kueBasah');
$routes->get('/produks/Basah/BoxPlastik', 'Home::kueBasahReguler');
$routes->get('/produks/Basah/Mini', 'Home::kueBasahMini');
$routes->get('/konsumen/profil', 'Konsumen::viewProfil', ['filter' => 'auth']);
$routes->post('/konsumen/profil/update', 'Konsumen::updateProfile', ['filter' => 'auth']);
$routes->post('/konsumen/profil/changeUsername', 'Konsumen::changeUsername', ['filter' => 'auth']);
$routes->post('/konsumen/profil/changePassword', 'Konsumen::changePassword', ['filter' => 'auth']);
// Footer
$routes->get('/kontak', 'Footer::contact');
$routes->get('/about', 'Footer::about');
$routes->get('/syarat', 'Footer::syarat');
$routes->get('/carabelanja', 'Footer::caraBelanja');
$routes->get('/pembayaran', 'Footer::Kpembayaran');
$routes->get('/infopengiriman', 'Footer::Ipengiriman');
$routes->get('/policy', 'Footer::policy');
// keranjang
$routes->post('/cart/add', 'Cart::addToCart', ['filter' => 'auth']);
$routes->get('/cart/view', 'Cart::viewCart', ['filter' => 'auth']);
$routes->get('/cart/remove/(:num)', 'Cart::removeFromCart/$1', ['filter' => 'auth']);
$routes->post('/cart/edit/(:num)', 'Cart::editCart/$1', ['filter' => 'auth']);
// Payment
$routes->get('/payment', 'Payment::pay', ['filter' => 'auth']);
$routes->get('/pesanan', 'Payment::pesanan', ['filter' => 'auth']);
$routes->post('/order', 'Payment::createOrder', ['filter' => 'auth']);
$routes->post('/uploadBukti', 'Payment::uploadBukti', ['filter' => 'auth']);
$routes->post('/uploadBukti/editBukti', 'Payment::editBukti', ['filter' => 'auth']);
$routes->get('/uploadBukti/download/(:num)', 'Payment::download/$1', ['filter' => 'auth']);
$routes->get('/uploadBukti/cancel/(:num)', 'Payment::cancel/$1', ['filter' => 'auth']);
$routes->get('/uploadBukti/delete/(:num)', 'Payment::delete/$1', ['filter' => 'auth']);
// Register
$routes->post('konsumen/register', 'Konsumen::register');
// Login
$routes->post('auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');
// Admin
$routes->get('/admin/dashboard', 'Admin::Dashboard', ['filter' => 'authadmin']);
$routes->get('/admin/ProdukKue', 'Admin::DataKue', ['filter' => 'authadmin']);
$routes->get('/admin/MTransaksi', 'Admin::MetodeTransaksi', ['filter' => 'authadmin']);
$routes->get('/admin/orders', 'Admin::orders', ['filter' => 'authadmin']);
$routes->get('/admin/MT', 'Admin::StatusMT', ['filter' => 'authadmin']);
$routes->get('/admin/MK', 'Admin::StatusMK', ['filter' => 'authadmin']);
$routes->get('/admin/DD', 'Admin::StatusDD', ['filter' => 'authadmin']);
$routes->get('/admin/Arrived', 'Admin::StatusArrived', ['filter' => 'authadmin']);
$routes->get('/admin/Dibatalkan', 'Admin::StatusCancel', ['filter' => 'authadmin']);
$routes->get('/admin/UKonsumen', 'UserKonsumen::konsumen', ['filter' => 'authadmin']);
$routes->get('/admin/UAdmin', 'UserAdmin::admin', ['filter' => 'authadmin']);
$routes->get('/admin/Profil', 'UserAdmin::profil', ['filter' => 'authadmin']);
$routes->post('/admin/Profil/update/(:num)', 'UserAdmin::updateProfile/$1', ['filter' => 'authadmin']);
$routes->post('/admin/Profil/updateUsername', 'UserAdmin::updateUsername');
$routes->post('admin/Profil/updatePassword', 'UserAdmin::updatePassword');
$routes->get('/admin/Chart', 'Admin::Chart');
// Kue
$routes->post('/admin/kue/insert', 'Kue::insertKue', ['filter' => 'authadmin']);
$routes->post('/admin/kue/update/(:num)', 'Kue::updateKue/$1', ['filter' => 'authadmin']);
$routes->post('/admin/kue/change/(:num)', 'Kue::changeFotoKue/$1', ['filter' => 'authadmin']);
$routes->post('/admin/kue/addPicture/(:num)', 'Kue::addPictureImage/$1', ['filter' => 'authadmin']);
$routes->post('/admin/kue/changePicture/(:num)', 'Kue::ChangePicture/$1', ['filter' => 'authadmin']);
$routes->get('/admin/kue/deletePicture/(:num)', 'Kue::deletePicture/$1', ['filter' => 'authadmin']);
$routes->get('/admin/kue/deleteKue/(:num)', 'Kue::deleteKue/$1', ['filter' => 'authadmin']);
// Metode Transaksi
$routes->post('/admin/MTrans/insert', 'MetodeTransaksi::insertMTrans', ['filter' => 'authadmin']);
$routes->post('/admin/MTrans/update/(:num)', 'MetodeTransaksi::updateMTrans/$1', ['filter' => 'authadmin']);
$routes->get('/admin/MTrans/delete/(:num)', 'MetodeTransaksi::deleteMTrans/$1', ['filter' => 'authadmin']);
// Status
$routes->get('/admin/status/MT/(:num)', 'Pesan::EditMT/$1', ['filter' => 'authadmin']);
$routes->get('/admin/status/MK/(:num)', 'Pesan::EditMK/$1', ['filter' => 'authadmin']);
$routes->get('/admin/status/DD/(:num)', 'Pesan::EditDD/$1', ['filter' => 'authadmin']);
$routes->get('/admin/status/Arrived/(:num)', 'Pesan::EditArrived/$1', ['filter' => 'authadmin']);
$routes->get('/admin/status/cancel/(:num)', 'Pesan::EditCancel/$1', ['filter' => 'authadmin']);
$routes->get('download/(:segment)', 'Pesan::download/$1');
$routes->get('/admin/status/hapus/(:num)', 'Pesan::EditDelete/$1', ['filter' => 'authadmin']);
// User Konsumen
$routes->get('/admin/UKonsumen/hapus/(:num)', 'UserKonsumen::Delete/$1', ['filter' => 'authadmin']);
$routes->post('/admin/UKonsumen/resetPassword/(:num)', 'UserKonsumen::resetPassword/$1', ['filter' => 'authadmin']);
// User Admin
$routes->post('/admin/UAdmin/insert', 'UserAdmin::insert', ['filter' => 'authadmin']);
$routes->post('/admin/UAdmin/resetPassword/(:num)', 'UserAdmin::resetPassword/$1', ['filter' => 'authadmin']);
$routes->get('/admin/UAdmin/hapus/(:num)', 'UserAdmin::Delete/$1', ['filter' => 'authadmin']);
$routes->get('/admin/UAdmin/hapus/(:num)', 'UserAdmin::Delete/$1', ['filter' => 'authadmin']);
// Download File
$routes->get('/admin/exportToExcel', 'Admin::exportToExcel');
$routes->get('/admin/downloadStrukPDF/(:num)', 'Pesan::downloadStrukPDF/$1');
