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

use App\Http\Controllers\UtilController;

Route::get('/', function () {
    return view('welcome');
});

// route blog
Route::get('/blog', 'BlogController@home');
Route::get('/blog/tentang', 'BlogController@tentang');
Route::get('/blog/kontak', 'BlogController@kontak');

// route CRUD
Route::get('/pegawai', 'PegawaiController@index');
Route::get('/pegawai/tambah', 'PegawaiController@tambah');
Route::post('/pegawai/store','PegawaiController@store');
Route::get('/pegawai/edit/{id}','PegawaiController@edit');
Route::put('/pegawai/update/{id}','PegawaiController@update');
Route::get('/pegawai/hapus/{id}','PegawaiController@hapus');
Route::get('/pegawai/cari','PegawaiController@cari');


Route::get('/guru', 'GuruController@index');
Route::get('/guru/hapus/{id}', 'GuruController@hapus');
Route::get('/guru/trash', 'GuruController@trash');
Route::get('/guru/kembalikan/{id}', 'GuruController@kembalikan');
Route::get('/guru/kembalikan_semua', 'GuruController@kembalikan_semua');
Route::get('/guru/hapus_permanen/{id}', 'GuruController@hapus_permanen');
Route::get('/guru/hapus_permanen_semua', 'GuruController@hapus_permanen_semua');

Route::get('/pengguna', 'PenggunaController@index');

Route::get('/article', 'WebController@index');

Route::get('/anggota', 'AnggotaController@index');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/enkripsi', 'UtilController@enkripsi');
Route::get('/data', 'UtilController@data');
Route::get('/data/{data_rahasia}', 'UtilController@data_proses');

Route::get('/hash', 'UtilController@hash');

Route::get('/upload', 'UtilController@upload');
Route::post('/upload/proses', 'UtilController@proses_upload');
Route::get('/upload/hapus/{id}', 'UtilController@hapus');

Route::get('/session/tampil', 'UtilController@tampilkanSession');
Route::get('/session/buat', 'UtilController@buatSession');
Route::get('/session/hapus', 'UtilController@hapusSession');

Route::get('/pesan','NotifController@index');
Route::get('/pesan/sukses','NotifController@sukses');
Route::get('/pesan/peringatan','NotifController@peringatan');
Route::get('/pesan/gagal','NotifController@gagal');

Route::get('/malasngoding/{nama}','MalasngodingController@index');

Route::get('/kirimemail', 'MalasngodingController@kirimEmail');

Route::get('/pegawai/cetak_pdf', 'PegawaiController@cetak_pdf');
Route::get('/pegawai/export_excel', 'PegawaiController@export_excel');
Route::post('/pegawai/import_excel', 'PegawaiController@import_excel');