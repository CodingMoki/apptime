<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'auth'], function () {
    Auth::routes();
});

Route::group(['prefix' => 'excel', 'as' => 'excel.p5m.', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'p5m'], function () {
        // Route::get('/export', 'Commodities\CommodityExportImportController@export')->name('export');
        Route::get('/export', 'P5ms\P5mExportImportController@export')->name('export');
        Route::post('/import', 'P5ms\P5mExportImportController@import')->name('import');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('shift', 'ShiftController@index')->name('shift.index');
    Route::post('shift', 'ShiftController@store')->name('shift.store');
    Route::delete('shift-delete', 'ShiftController@delete')->name('shift.delete');
    Route::put('shift-update', 'ShiftController@update')->name('shift.update');

    Route::get('lokasi', 'LocationController@index')->name('lokasi.index');
    Route::post('lokasi', 'LocationController@store')->name('lokasi.store');
    Route::put('lokasi-update', 'LocationController@update')->name('lokasi.update');
    Route::delete('lokasi-delete', 'LocationController@delete')->name('lokasi.delete');

    Route::get('jabatan', 'JabatanController@index')->name('jabatan.index');
    Route::post('jabatan', 'JabatanController@store')->name('jabatan.store');
    Route::put('jabatan-update', 'JabatanController@update')->name('jabatan.update');
    Route::delete('jabatan-delete', 'JabatanController@delete')->name('jabatan.delete');

    Route::get('pegawai', 'PegawaiController@index')->name('pegawai.index');
    Route::post('pegawai', 'PegawaiController@store')->name('pegawai.store');
    Route::put('pegawai-update', 'PegawaiController@update')->name('pegawai.update');
    Route::delete('pegawai-delete', 'PegawaiController@delete')->name('pegawai.delete');

    Route::get('/settings', "SettingController@index")->name('settings');
    Route::post('/settings', "SettingController@simpan")->name('settings.simpan');

    Route::group(['prefix' => 'p5m', 'as' => 'p5m.'], function () {
        Route::get('/print', 'P5ms\PdfController@generatePdf')->name('print');
        Route::get('/print/{id}', "P5ms\PdfController@generatePdfOne")->name('print.one');
    });

    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('/barang', 'Commodities\CommodityController');
    Route::resource('/p5m', 'P5ms\P5mController');
    Route::resource('/bantuan-dana-operasional', 'SchoolOperationalAssistances\SchoolOperationalAssistance');
    Route::resource('/ruang', 'CommodityLocations\CommodityLocationController');
    Route::resource('/inspeksi', 'Inspeksis\InspeksiController');

    Route::resource('/p5ms/json', 'P5ms\Ajax\P5mAjaxController');
    Route::resource('/pegawais/json', 'Pegawais\Ajax\PegawaiAjaxController');
    Route::resource('/commodities/json', 'Commodities\Ajax\CommodityAjaxController');
    Route::resource('/school-operational/json', 'SchoolOperationalAssistances\Ajax\SchoolOperationalAssistanceAjaxController');
    Route::resource('/commodity-locations/json', 'CommodityLocations\Ajax\CommodityLocationAjaxController');
});
