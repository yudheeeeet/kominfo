<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;

Route::get('/login', 'Auth\LoginController@login');

Route::get('/', function () {
    return view('admin');
})->name('/');
Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'AdminController@admin')->name('admin');
    Route::get('/akun', 'AdminController@akun')->name('akun');
    Route::post('/tambah-data-user', 'AdminController@tambah_data_user');
    Route::get('/editAkun/{id}', 'AdminController@edit_akun');
    Route::put('update-user/{id}', 'AdminController@updateUser');
    Route::post('hapus-user/{id}', 'AdminController@hapusUser');
    Route::get('/rekap', 'AdminController@rekap')->name('rekap');
    Route::get('/room', 'AdminController@room')->name('room');
    Route::post('/tambah-data-room', 'AdminController@tambah_data_room');
    Route::get('/editRoom/{id}', 'AdminController@edit_room');
    Route::put('update-room/{id}', 'AdminController@updateRoom');    
    Route::post('hapus-room/{id}', 'AdminController@hapusRoom');
    Route::get('/pengajuan', 'PengajuanController@pengajuan')->name('pengajuan');
    Route::get('detailPengajuan/{id}', 'PengajuanController@detail_pengajuan');
    Route::get('/pengajuan/download/{lampiran}', 'PengajuanController@download');
    Route::get('/diterima{id}', 'PengajuanController@diterima');
    Route::get('/ditolak{id}', 'PengajuanController@ditolak');
    Route::put('update-pengajuan/{id}', 'PengajuanController@updatePengajuan');
    Route::post('/tambah-feedback/{id}', 'PengajuanController@tambah_feedback');
    Route::get('/rekap', 'AdminController@rekap_dinas');
    Route::get('/recap', 'AdminController@rekap_meet');
    
    Route::get('/user', 'UserController@user')->name('user');
    Route::get('/permohonan', 'UserController@permohonan')->name('permohonan');
    Route::get('/SemuaPermohonan', 'UserController@SemuaPermohonan')->name('SemuaPermohonan');
    Route::post('/tambah-data-permohonan','UserController@tambah_data_permohonan');
    Route::get('/detailPermohonan/{id}', 'UserController@detail_permohonan');
    Route::put('update-permohonan/{id}', 'UserController@updatePermohonan');
    Route::get('/detailFeedback/{id}', 'UserController@detail_feedback');
});
