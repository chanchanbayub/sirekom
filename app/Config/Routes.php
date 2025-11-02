<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/search', 'Home::search');


// $routes->get('/auth/login', 'Auth\LoginController::index');
$routes->group('auth', static function ($routes) {

    $routes->get('login', 'Auth\LoginController::index');
    $routes->post('cek_login', 'Auth\LoginController::cek_login');
    $routes->get('logout', 'Auth\LoginController::logout');
});

$routes->group('operator', static function ($routes) {

    $routes->get('dashboard', 'Operator\DashboardController::index');
    $routes->get('profil_users', 'Operator\ProfilUsersController::index');
    $routes->post('profil_users/insert', 'Operator\ProfilUsersController::insert');
    $routes->post('profil_users/getProfil', 'Operator\ProfilUsersController::getProfil');

    $routes->get('data_base_kendaraan', 'Operator\KendaraanController::index');
    $routes->get('data_base_kendaraan/(:any)', 'Operator\KendaraanController::view/$1');
    $routes->post('getDataKendaraan/(:any)', 'Operator\KendaraanController::getKendaraanDataTable/$1');
    $routes->post('data_base_kendaraan/insert', 'Operator\KendaraanController::insert');
    $routes->post('data_base_kendaraan/getDataKendaraan', 'Operator\KendaraanController::getDataKendaraan');
    $routes->get('data_base_kendaraan/view', 'Operator\KendaraanController::view');
    $routes->post('data_base_kendaraan/update', 'Operator\KendaraanController::update');
    $routes->post('data_base_kendaraan/delete', 'Operator\KendaraanController::delete');

    //Pengajuan Rekomendasi
    $routes->get('pengajuan_rekom', 'Operator\PengajuanRekomendasiController::index');
    $routes->get('pengajuan_rekom/detail/(:any)', 'Operator\PengajuanRekomendasiController::detail/$1');
    $routes->post('pengajuan_rekom/getPengajuanRekom', 'Operator\PengajuanRekomendasiController::getPengajuanRekom');
    $routes->get('form_pengajuan_rekomendasi', 'Operator\PengajuanRekomendasiController::form_pengajuan_rekomendasi');
    $routes->post('form_pengajuan_rekomendasi/getJenisPerizinan', 'Operator\PengajuanRekomendasiController::getJenisPerizinan');
    $routes->post('form_pengajuan_rekomendasi/getUsers', 'Operator\PengajuanRekomendasiController::getUsers');
    $routes->post('form_pengajuan_rekomendasi/insert', 'Operator\PengajuanRekomendasiController::insert');
});

$routes->group('backoffice', static function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');

    $routes->get('role_management', 'Admin\RoleManagementController::index');
    $routes->post('role_management/getRole', 'Admin\RoleManagementController::getRoleManagement');
    $routes->post('role_management/insert', 'Admin\RoleManagementController::insert');
    $routes->get('role_management/edit', 'Admin\RoleManagementController::edit');
    $routes->post('role_management/update', 'Admin\RoleManagementController::update');
    $routes->post('role_management/delete', 'Admin\RoleManagementController::delete');

    $routes->get('status_perizinan', 'Admin\StatusPerizinanController::index');
    $routes->post('status_perizinan/getStatusPerizinan', 'Admin\StatusPerizinanController::getStatusPerizinan');
    $routes->post('status_perizinan/insert', 'Admin\StatusPerizinanController::insert');
    $routes->get('status_perizinan/edit', 'Admin\StatusPerizinanController::edit');
    $routes->post('status_perizinan/update', 'Admin\StatusPerizinanController::update');
    $routes->post('status_perizinan/delete', 'Admin\StatusPerizinanController::delete');

    $routes->get('users_management', 'Admin\UsersManagementController::index');
    $routes->post('users_management/getUsers', 'Admin\UsersManagementController::getUsersManagement');
    $routes->post('users_management/insert', 'Admin\UsersManagementController::insert');
    $routes->get('users_management/edit', 'Admin\UsersManagementController::edit');
    $routes->post('users_management/update', 'Admin\UsersManagementController::update');
    $routes->post('users_management/delete', 'Admin\UsersManagementController::delete');

    $routes->get('profil_users', 'Admin\ProfilUsersController::index');
    $routes->post('profil_users/getProfil', 'Admin\ProfilUsersController::getProfil');
    $routes->post('profil_users/insert', 'Admin\ProfilUsersController::insert');
    $routes->get('profil_users/edit', 'Admin\ProfilUsersController::edit');
    $routes->post('profil_users/update', 'Admin\ProfilUsersController::update');
    $routes->post('profil_users/delete', 'Admin\ProfilUsersController::delete');

    $routes->get('jenis_kendaraan', 'Admin\JenisKendaraanController::index');
    $routes->post('jenis_kendaraan/getJenisKendaraan', 'Admin\JenisKendaraanController::getJenisKendaraan');
    $routes->post('jenis_kendaraan/insert', 'Admin\JenisKendaraanController::insert');
    $routes->get('jenis_kendaraan/edit', 'Admin\JenisKendaraanController::edit');
    $routes->post('jenis_kendaraan/update', 'Admin\JenisKendaraanController::update');
    $routes->post('jenis_kendaraan/delete', 'Admin\JenisKendaraanController::delete');

    $routes->get('jenis_perizinan', 'Admin\JenisPerizinanController::index');
    $routes->post('jenis_perizinan/getJenisPerizinan', 'Admin\JenisPerizinanController::getJenisPerizinan');
    $routes->post('jenis_perizinan/insert', 'Admin\JenisPerizinanController::insert');
    $routes->get('jenis_perizinan/edit', 'Admin\JenisPerizinanController::edit');
    $routes->post('jenis_perizinan/update', 'Admin\JenisPerizinanController::update');
    $routes->post('jenis_perizinan/delete', 'Admin\JenisPerizinanController::delete');

    $routes->get('surat_pengantar', 'Admin\PengantarPerizinanController::index');
    $routes->post('surat_pengantar/getPengantarPerizinan', 'Admin\PengantarPerizinanController::getPengantarPerizinan');
    $routes->post('surat_pengantar/insert', 'Admin\PengantarPerizinanController::insert');
    $routes->get('surat_pengantar/edit', 'Admin\PengantarPerizinanController::edit');
    $routes->post('surat_pengantar/update', 'Admin\PengantarPerizinanController::update');
    $routes->post('surat_pengantar/delete', 'Admin\PengantarPerizinanController::delete');

    $routes->get('kode_kendaraan', 'Admin\KodeKendaraanController::index');
    $routes->post('kode_kendaraan/getKodeKendaraan', 'Admin\KodeKendaraanController::getKodeKendaraan');
    $routes->post('kode_kendaraan/insert', 'Admin\KodeKendaraanController::insert');
    $routes->get('kode_kendaraan/edit', 'Admin\KodeKendaraanController::edit');
    $routes->post('kode_kendaraan/update', 'Admin\KodeKendaraanController::update');
    $routes->post('kode_kendaraan/delete', 'Admin\KodeKendaraanController::delete');

    // 
    $routes->get('data_base_kendaraan', 'Admin\KendaraanController::index');
    $routes->get('data_base_kendaraan/(:any)', 'Admin\KendaraanController::view/$1');
    $routes->post('getDataKendaraan/(:any)', 'Admin\KendaraanController::getKendaraanDataTable/$1');
    $routes->post('data_base_kendaraan/insert', 'Admin\KendaraanController::insert');
    $routes->post('data_base_kendaraan/getDataKendaraan', 'Admin\KendaraanController::getDataKendaraan');
    $routes->get('data_base_kendaraan/view', 'Admin\KendaraanController::view');
    $routes->post('data_base_kendaraan/update', 'Admin\KendaraanController::update');
    $routes->post('data_base_kendaraan/delete', 'Admin\KendaraanController::delete');

    // 
    $routes->get('database_kendaraan_terintegrasi', 'Admin\DatabaseTerintegrasiController::index');
    $routes->get('database_kendaraan_terintegrasi/(:any)', 'Admin\DatabaseTerintegrasiController::view/$1');
    $routes->post('getDataKendaraanTerintegrasi/(:any)', 'Admin\DatabaseTerintegrasiController::getKendaraanDataTable/$1');
    $routes->post('database_kendaraan_terintegrasi/insert', 'Admin\DatabaseTerintegrasiController::insert');
    $routes->post('database_kendaraan_terintegrasi/getDataKendaraan', 'Admin\DatabaseTerintegrasiController::getDataKendaraan');
    $routes->get('database_kendaraan_terintegrasi/view', 'Admin\DatabaseTerintegrasiController::view');
    $routes->post('database_kendaraan_terintegrasi/update', 'Admin\DatabaseTerintegrasiController::update');
    $routes->post('database_kendaraan_terintegrasi/delete', 'Admin\DatabaseTerintegrasiController::delete');

    $routes->get('database_kendaraan_data', 'Admin\DataBaseKendaraanController::index');
    $routes->get('database_kendaraan_data/(:any)', 'Admin\DataBaseKendaraanController::view/$1');
    $routes->post('getDataKendaraan2014/(:any)', 'Admin\DataBaseKendaraanController::getKendaraanDataTable/$1');
    $routes->post('database_kendaraan_data/insert', 'Admin\DataBaseKendaraanController::insert');
    $routes->post('database_kendaraan_data/getDataKendaraan', 'Admin\DataBaseKendaraanController::getDataKendaraan');
    $routes->get('database_kendaraan_data/view', 'Admin\DataBaseKendaraanController::view');
    $routes->post('database_kendaraan_data/update', 'Admin\DataBaseKendaraanController::update');
    $routes->post('database_kendaraan_data/delete', 'Admin\DataBaseKendaraanController::delete');

    //Pengajuan Rekomendasi
    $routes->get('pengajuan_rekom', 'Admin\PengajuanRekomendasiController::index');
    $routes->get('pengajuan_rekom/detail/(:any)', 'Admin\PengajuanRekomendasiController::detail/$1');
    $routes->post('pengajuan_rekom/getPengajuanRekom', 'Admin\PengajuanRekomendasiController::getPengajuanRekom');
    $routes->get('form_pengajuan_rekomendasi', 'Admin\PengajuanRekomendasiController::form_pengajuan_rekomendasi');
    $routes->post('form_pengajuan_rekomendasi/getJenisPerizinan', 'Admin\PengajuanRekomendasiController::getJenisPerizinan');
    $routes->post('form_pengajuan_rekomendasi/getUsers', 'Admin\PengajuanRekomendasiController::getUsers');
    $routes->post('form_pengajuan_rekomendasi/insert', 'Admin\PengajuanRekomendasiController::insert');

    $routes->get('pengajuan_rekom/edit', 'Admin\PengajuanRekomendasiController::edit');
    $routes->post('pengajuan_rekom/update', 'Admin\PengajuanRekomendasiController::update');
    $routes->post('pengajuan_rekom/delete', 'Admin\PengajuanRekomendasiController::delete');

    //Pengajuan Rekomendasi
    $routes->get('validasi_rekom', 'Admin\ValidasiRekomController::index');
    $routes->post('validasi_rekom/update_status_rekom', 'Admin\ValidasiRekomController::update_status_rekom');
    $routes->post('validasi_rekom/insert', 'Admin\ValidasiRekomController::insert');
    $routes->get('validasi_rekom/edit', 'Admin\ValidasiRekomController::edit');
    $routes->get('validasi_rekom/edit_disabled_data', 'Admin\ValidasiRekomController::edit_disabled');
    $routes->post('validasi_rekom/post', 'Admin\ValidasiRekomController::post');

    $routes->get('export_word', 'Word\WordController::index');

    $routes->get('surat_rekomendasi', 'Admin\SuratRekomendasiController::index');
    $routes->post('surat_rekomendasi/insert', 'Admin\SuratRekomendasiController::insert');
    $routes->get('surat_rekomendasi/edit', 'Admin\SuratRekomendasiController::edit');
    $routes->post('surat_rekomendasi/getSurat', 'Admin\SuratRekomendasiController::getSurat');
    // $routes->get('surat_rekomendasi/(:any)', 'Admin\SuratRekomendasiController::view/$1');


    // $routes->get('surat_rekomendasi/view', 'Admin\SuratRekomendasiController::view');
    $routes->post('surat_rekomendasi/update', 'Admin\SuratRekomendasiController::update');
    $routes->post('surat_rekomendasi/delete', 'Admin\SuratRekomendasiController::delete');
});
